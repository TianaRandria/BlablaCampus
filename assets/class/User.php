<?php

include("../assets/class/Database.php");

class User extends Database
{
  public function login()
  {
    $nickname = $_POST['login'];
    $connection = $this->connect()->prepare("SELECT * FROM user WHERE nickname_user = :nickname");
    $connection->bindParam(':nickname_user', $nickname, PDO::PARAM_STR);
    $connection->execute();
    $user = $connection->fetch();
    if ($user && password_verify($_POST['password'], $user['password_user'])) {
      $_SESSION['name_user'] = $nickname;
      echo $_SESSION['name_user'];
    } else {
      echo 'Invalid nickname or password';
      echo $_SESSION['name_user'];
    }
  }

  public function register()
  {
    $name = $_POST['nameRegister'];
    $nickname = $_POST['nicknameRegister'];
    $password = password_hash($_POST['pswdRegister'],  PASSWORD_DEFAULT);
    $email = $_POST['emailRegister'];
    $bio = $_POST['bioRegister'];
    $img = file_get_contents($_FILES['profilePictureRegister']);
    $connection = $this->connect()->prepare("SELECT * FROM compte WHERE nickname_user, email_user = :nickname_user, :email_user");
    $connection->bindParam(':nickname_user', $nickname, PDO::PARAM_STR);
    $connection->bindParam(':email_user', $email, PDO::PARAM_STR);
    $connection->execute();
    $exist = $connection->fetch();
    if ($exist != false) {
      // echo "desolé cet identifiant existe déja";
      header('Location: ./register.php');
    } else {
      $register = $this->connect()->prepare("INSERT INTO compte (name_user, nickname_user, password_user, email_user, bio_user, img_user) VALUES (:name_user, :nickname_user, :password_user, :email_user, :bio_user, :img_user)");
      $register->bindParam(':name_user', $name, PDO::PARAM_STR);
      $register->bindParam(':nickname_user', $nickname, PDO::PARAM_STR);
      $register->bindParam(':password_user', $password, PDO::PARAM_STR);
      $register->bindParam(':email_user', $email, PDO::PARAM_STR);
      $register->bindParam(':bio_user', $bio, PDO::PARAM_STR);
      $register->bindParam(':img_user', $img, PDO::PARAM_STR);
      $register->execute();
      $_SESSION['name_user'] = $nickname;
    }
  }

  public function logout()
  {
    session_destroy();
    header('Location: ./index.php');
  }
  public function pswdReset()
  {
    if (isset($_POST['email'])) {
      $password = uniqid();
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      $subject = 'Mot de passe oublié';
      $message = "Bonjour, voici votre nouveau mot de passe : $password";
      $headers = 'Content-Type: text/plain; charset="UTF-8"';

      if (mail($_POST['email'], $subject, $message, $headers)) {
        $stmt = $this->connect()->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->execute([$hashedPassword, $_POST['email']]);
        echo "E-mail envoyé";
      } else {
        echo "Une erreur est survenue";
      }
    }
  }
}
