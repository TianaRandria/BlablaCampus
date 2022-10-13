<?php

include("Database.php");

class User extends Database
{
  public function login()
  {
    $nickname = $_POST['login'];
    $connection = $this->connect()->prepare("SELECT * FROM users WHERE nickname_user = :nickname_user");
    $connection->bindParam(':nickname_user', $nickname);
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
      header('Location: ../../pages/login.php');
    }
  }
  public function register()
  {
    session_destroy();
    $name = $_POST['nameRegister'];
    $nickname = $_POST['nicknameRegister'];
    $password = password_hash($_POST['pswdRegister'],  PASSWORD_DEFAULT);
    $email = $_POST['emailRegister'];
    $bio = $_POST['bioRegister'];
    $newImg = 'cc';
    $existNickname = $this->connect()->prepare("SELECT * FROM users WHERE nickname_user = :nickname_user");
    $existNickname->bindParam(':nickname_user', $nickname);
    $existNickname->execute();
    $existEmail = $this->connect()->prepare("SELECT * FROM users WHERE email_user = :email_user");
    $existEmail->bindParam(':email_user', $email);
    $existEmail->execute();
    $nicknameExist = $existNickname->fetch();
    $emailExist = $existEmail->fetch();
    if ($nicknameExist != false) {
      header('Location: ../../pages/register.php');
      session_destroy();
    } else if ($emailExist != false) {
      header('Location: ../../pages/register.php');
      session_destroy();
    } else {
      $register = $this->connect()->prepare("INSERT INTO users (name_user, nickname_user, password_user, email_user, bio_user, img_user) VALUES (:name_user, :nickname_user, :password_user, :email_user, :bio_user, :img_user )");
      $register->bindParam(':name_user', $name);
      $register->bindParam(':nickname_user', $nickname);
      $register->bindParam(':password_user', $password);
      $register->bindParam(':email_user', $email);
      $register->bindParam(':bio_user', $bio);
      $register->bindParam(':img_user', $newImg);
      $register->execute();
      $userGetId = $this->connect()->query('SELECT * FROM users');
      $user = $userGetId->fetch();
      session_start();
      $_SESSION['id_user'] = $user['id_user'];
      $_SESSION['name_user'] = $user['name_user'];
      $_SESSION['nickname_user'] = $user['nickname_user'];
      $_SESSION['bio_user'] = $user['bio_user'];
      $_SESSION['email_user'] = $user['email_user'];
      $_SESSION['img_user'] = $user['img_user'];
      header('Location: ../../pages/login.php');
    }
  }
  public function logout()
  {
    session_start();
    session_destroy();
    header('Location: ../../index.php');
    session_destroy();
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
    session_start();
    $id = $_SESSION['id_user'];
    $addReq = array();
    $addSelect = array();
    if (isset($_POST['nameEdit']) && !empty($_POST['nameEdit'])) {
      $name = $_POST['nameEdit'];
      array_push($addSelect, ', name_user =');
      array_push($addReq, ' :name_user');
    }
    if (isset($_POST['nicknameEdit']) && !empty($_POST['nicknameEdit'])) {
      $nickname = $_POST['nicknameEdit'];
      array_push($addSelect, ', nickname_user =');
      array_push($addReq, ' :nickname_user');
    }
    if (isset($_POST['pswdEdit']) && !empty($_POST['pswdEdit'])) {
      $password = password_hash($_POST['pswdEdit'],  PASSWORD_DEFAULT);
      array_push($addSelect, ', password_user =');
      array_push($addReq, ' :password_user');
    }
    if (isset($_POST['emailEdit']) && !empty($_POST['emailEdit'])) {
      $email = $_POST['emailEdit'];
      array_push($addSelect, ', email_user =');
      array_push($addReq, ' :email_user');
    }
    if (isset($_POST['bioEdit']) && !empty($_POST['bioEdit'])) {
      $bio = $_POST['bioEdit'];
      array_push($addSelect, ', bio_user =');
      array_push($addReq, ' :bio_user');
    }
    if (isset($_POST['profilePictureEdit']) && !empty($_POST['profilePictureEdit'])) {
      $img = 'html';  //$_POST['profilePictureEdit']
      array_push($addSelect, ', img_user =');
      array_push($addReq, ' :img_user');
    }
    $addRequest = implode(" ", $addReq);
    $addSelections = implode(" ", $addSelect);
    $existNickname = $this->connect()->prepare("SELECT * FROM users WHERE nickname_user = :nickname_user");
    $existNickname->bindParam(':nickname_user', $nickname);
    $existNickname->execute();
    $existEmail = $this->connect()->prepare("SELECT * FROM users WHERE email_user = :email_user");
    $existEmail->bindParam(':email_user', $email);
    $existEmail->execute();
    $nicknameExist = $existNickname->fetch();
    $emailExist = $existEmail->fetch();
    if ($nicknameExist != false) {
      header('Location: ../../pages/editAccount.php');
    } else if ($emailExist != false) {
      header('Location: ../../pages/editAccount.php');
    } else {
      $Edit = $this->connect()->prepare('UPDATE users SET id_user = :id_user ' . $addSelections . '' . $addRequest . ' , img_user = "html" WHERE id_user = :id_user');
      $Edit->bindParam(':id_user', $id);
      if (isset($_POST['nameEdit']) && !empty($_POST['nameEdit'])) {
        $Edit->bindParam(':name_user', $name);
        $_SESSION['name_user'] = $name;
      }
      if (isset($_POST['nicknameEdit']) && !empty($_POST['nicknameEdit'])) {
        $Edit->bindParam(':nickname_user', $nickname);
        $_SESSION['nickname_user'] = $nickname;
      }
      if (isset($_POST['pswdEdit']) && !empty($_POST['pswdEdit'])) {
        $Edit->bindParam(':password_user', $password);
      }
      if (isset($_POST['emailEdit']) && !empty($_POST['emailEdit'])) {
        $Edit->bindParam(':email_user', $email);
        $_SESSION['email_user'] = $email;
      }
      if (isset($_POST['bioEdit']) && !empty($_POST['bioEdit'])) {
        $Edit->bindParam(':bio_user', $bio);
        $_SESSION['bio_user'] = $bio;
      }
      if (isset($_POST['profilePictureEdit']) && !empty($_POST['profilePictureEdit'])) {
        $Edit->bindParam(':img_user', $img);
        $_SESSION['img_user'] = $img;
      }
      $Edit->execute();
      header('Location: ../../pages/confirmation.php');
    }
  }
}
