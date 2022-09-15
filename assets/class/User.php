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
    $img = $_FILES['profilePictureRegister']['name'];

    $connection = $this->connect()->prepare("SELECT * FROM compte WHERE nickname_user = :nickname_user");
    $connection->bindParam(':nickname_user', $nickname, PDO::PARAM_STR);
    $connection->execute();
    $exist = $connection->fetch();

    if (empty($_FILES)) {
      echo "Votre fichier n'est pas une image, seul les extensions Jpg, png et gif sont acceptées";
    } else {
      if ($exist == true) {
        echo "desolé cet identifiant existe déja";
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
  }

  public function logout()
  {
    session_destroy();
    header('Location: ./index.php');
  }
}
