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
    $register = $this->connect()->prepare("INSERT INTO compte (name_user, nickname_user, password_user, email_user, bio_user) VALUES (:name_user, :nickname_user, :password_user, :email_user, :bio_user)");
    $register->bindParam(':name_user', $name, PDO::PARAM_STR);
    $register->bindParam(':nickname_user', $nickname, PDO::PARAM_STR);
    $register->bindParam(':password_user', $password, PDO::PARAM_STR);
    $register->bindParam(':email_user', $email, PDO::PARAM_STR);
    $register->bindParam(':bio_user', $bio, PDO::PARAM_STR);
    $register->execute();
    var_dump($name);
    var_dump($nickname);
    var_dump($password);
    var_dump($email);
    var_dump($bio);
  }

  public function logout()
  {
    session_destroy();
    header('Location: ./index.php');
  }
}
