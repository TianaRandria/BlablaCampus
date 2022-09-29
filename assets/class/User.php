<?php
include("Database.php");

class User extends Database
{

  public function login()
  {
    $nickname = $_POST['login'];
    $connection = $this->connect()->prepare("SELECT * FROM compte WHERE nickname_user = :nickname_user");
    $connection->bindParam(':nickname_user', $nickname, PDO::PARAM_STR);
    $connection->execute();
    $user = $connection->fetch();
    if ($user && password_verify($_POST['password'], $user['password_user'])) {
      session_start();
      $_SESSION['id_user'] = $user['id_user'];
      $_SESSION['name_user'] = $user['name_user'];
      $_SESSION['nickname_user'] = $user['nickname_user'];
      $_SESSION['bio_user'] = $user['bio_user'];
      $_SESSION['email_user'] = $user['email_user'];
      $_SESSION['img_user'] = $user['img_user'];
      header('Location: ../../pages/confirmation.php');
    } else {
      // echo 'Invalid nickname or password';
      header('Location: ../../pages/login.php');
    }
  }

  public function register()
  {
    $name = $_POST['nameRegister'];
    $nickname = $_POST['nicknameRegister'];
    $password = password_hash($_POST['pswdRegister'],  PASSWORD_DEFAULT);
    $email = $_POST['emailRegister'];
    $bio = $_POST['bioRegister'];
    $newImg = 'cc';
    $existName = $this->connect()->prepare("SELECT * FROM compte WHERE nickname_user = :nickname_user");
    $existName->bindValue(':nickname_user', $nickname, PDO::PARAM_STR);
    $existName->execute();
    $existEmail = $this->connect()->prepare("SELECT * FROM compte WHERE email_user = :email_user");
    $existEmail->bindValue(':email_user', $email, PDO::PARAM_STR);
    $existEmail->execute();
    $nicknameExist = $existName->fetch();
    $emailExist = $existEmail->fetch();
    if ($nicknameExist != false) {
      header('Location: ../../pages/register.php');
      session_destroy();
    } else if ($emailExist != false) {
      header('Location: ../../pages/register.php');
      session_destroy();
    } else {
      $register = $this->connect()->prepare("INSERT INTO compte (name_user, nickname_user, password_user, email_user, bio_user, img_user) VALUES (:name_user, :nickname_user, :password_user, :email_user, :bio_user, :img_user )");
      $register->bindParam(':name_user', $name, PDO::PARAM_STR);
      $register->bindParam(':nickname_user', $nickname, PDO::PARAM_STR);
      $register->bindParam(':password_user', $password, PDO::PARAM_STR);
      $register->bindParam(':email_user', $email, PDO::PARAM_STR);
      $register->bindParam(':bio_user', $bio, PDO::PARAM_STR);
      $register->bindParam(':img_user', $newImg, PDO::PARAM_STR);
      $register->execute();
      session_start();
      $_SESSION['name_user'] = $name;
      $_SESSION['nickname_user'] = $nickname;
      $_SESSION['bio_user'] = $bio;
      $_SESSION['email_user'] = $email;
      $_SESSION['img_user'] = $newImg;
      header('Location: ../../pages/confirmation.php');
    }
  }

  public function logout()
  {
    session_start();
    session_destroy();
    header('Location: ../../index.php');
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

  public function editAccount()
  {
    $name = $_POST['nameEdit'];
    $nickname = $_POST['nicknameEdit'];
    $password = password_hash($_POST['pswdEdit'],  PASSWORD_DEFAULT);
    $email = $_POST['emailEdit'];
    $bio = $_POST['bioEdit'];
    $existName = $this->connect()->prepare("SELECT * FROM compte WHERE nickname_user = :nickname_user");
    $existName->bindValue(':nickname_user', $nickname, PDO::PARAM_STR);
    $existName->execute();
    $existEmail = $this->connect()->prepare("SELECT * FROM compte WHERE email_user = :email_user");
    $existEmail->bindValue(':email_user', $email, PDO::PARAM_STR);
    $existEmail->execute();
    $nicknameExist = $existName->fetch();
    $emailExist = $existEmail->fetch();
    if ($nicknameExist != false) {
      header('Location: ../../pages/register.php');
      session_destroy();
    } else if ($emailExist != false) {
      header('Location: ../../pages/register.php');
      session_destroy();
    } else {
      $Edit = $this->connect()->prepare("UPDATE compte SET nickname_user = :nickname_user , email_user = :email_user , bio_user = :bio_user , img_user = :img_user WHERE id_user = :id");
      $Edit->bindParam(':name_user', $name, PDO::PARAM_STR);
      $Edit->bindParam(':nickname_user', $nickname, PDO::PARAM_STR);
      $Edit->bindParam(':password_user', $password, PDO::PARAM_STR);
      $Edit->bindParam(':email_user', $email, PDO::PARAM_STR);
      $Edit->bindParam(':bio_user', $bio, PDO::PARAM_STR);
      $Edit->bindParam(':img_user', $img, PDO::PARAM_STR);
      $Edit->execute();
      session_start();
      $_SESSION['nickname_user'] = $nickname;
      $_SESSION['bio_user'] = $bio;
      $_SESSION['img_user'] = $img;
      header('Location: ../../pages/confirmation.php');
    }
  }
}
