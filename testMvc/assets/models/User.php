<?php
include("Database.php");
class User extends Database
{
  public function login(){
    $nickname = $_POST['login'];
    $connection = $this->connect()->prepare("SELECT * FROM users WHERE username_user = :nickname_user");
    $connection->bindParam(':nickname_user', $nickname);
    $connection->execute();
    $user = $connection->fetch();
    if ($user && password_verify($_POST['password'], $user['password_user'])) {
      session_start();
      $_SESSION['username_user'] = $nickname;
      $_SESSION['img_user'] = $user['img_user'];
      $_SESSION['bio_user'] = $user['bio_user'];
      $_SESSION['name_user']= $user['name_user'];
      $_SESSION['email_user'] = $user['email_user'];
      $_SESSION['id_user'] = $user['id_user'];
      header('Location: ./confirmation');
    } else {
      // echo 'Invalid nickname or password';
      header('Location: ./login');
    }
  }
  public function register(){
    $name = $_POST['nameRegister'];
    $nickname = $_POST['nicknameRegister'];
    $password = password_hash($_POST['pswdRegister'],  PASSWORD_DEFAULT);
    $email = $_POST['emailRegister'];
    $bio = $_POST['bioRegister'];
    $newImg = $this->newNameImg();
    $existName = $this->connect()->prepare("SELECT * FROM users WHERE nickname_user = :nickname_user");
    $existName->bindValue(':nickname_user', $nickname);
    $existName->execute();
    $existEmail = $this->connect()->prepare("SELECT * FROM users WHERE email_user = :email_user");
    $existEmail->bindValue(':email_user', $email);
    $existEmail->execute();
    $nicknameExist = $existName->fetch();
    $emailExist = $existEmail->fetch();
    if ($nicknameExist != false) {
      header('Location: ./register');
    } else if ($emailExist != false) {
      header('Location: ./register');
    } else {
      $register = $this->connect()->prepare("INSERT INTO users (name_user, username_user, password_user, email_user, bio_user, img_user) VALUES (:name_user, :username_user, :password_user, :email_user, :bio_user, :img_user )");
      $register->bindParam(':name_user', $name);
      $register->bindParam(':username_user', $nickname);
      $register->bindParam(':password_user', $password);
      $register->bindParam(':email_user', $email);
      $register->bindParam(':bio_user', $bio);
      $register->bindParam(':img_user', $newImg);
      $register->execute();
      session_start();
      $_SESSION['username_user'] = $nickname;
      $_SESSION['bio_user'] = $bio;
      $_SESSION['img_user'] = $newImg;
      $_SESSION['name_user']= $nickname;
      $_SESSION['email_user'] = $email;
      move_uploaded_file($_FILES['profilePictureRegister']['tmp_name'], './uploadImg/'.$newImg);
      $fetchID= $this->connect()->prepare("SELECT Id_user FROM users WHERE username_user = :usernameToGrab");
      $fetchID->bindParam(':usernameToGrab', $nickname);
      $fetchID->execute();
      $transfert = $fetchID->fetch();
      $_SESSION['id_user']= $transfert[0];
      header('Location: ./confirmation');
    }
  }
  public function logout(){
    session_start();
    session_destroy();
    header('Location: ./');
  }
  public function pswdReset(){
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
  public function editAccount(){
    $name = $_POST['nameEdit'];
    $nickname = $_POST['nicknameEdit'];
    $password = password_hash($_POST['pswdEdit'],  PASSWORD_DEFAULT);
    $email = $_POST['emailEdit'];
    $bio = $_POST['bioEdit'];
    $existName = $this->connect()->prepare("SELECT * FROM compte WHERE nickname_user = :nickname_user");
    $existName->bindValue(':nickname_user', $nickname);
    $existName->execute();
    $existEmail = $this->connect()->prepare("SELECT * FROM compte WHERE email_user = :email_user");
    $existEmail->bindValue(':email_user', $email);
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
      $Edit->bindParam(':name_user', $name);
      $Edit->bindParam(':nickname_user', $nickname);
      $Edit->bindParam(':password_user', $password);
      $Edit->bindParam(':email_user', $email);
      $Edit->bindParam(':bio_user', $bio);
      $Edit->bindParam(':img_user', $img);
      $Edit->execute();
      session_start();
      $_SESSION['nickname_user'] = $nickname;
      $_SESSION['bio_user'] = $bio;
      $_SESSION['img_user'] = $img;
      header('Location: ../../pages/confirmation.php');
    }
  }
  private function newNameImg(){
    $explodeName = explode('.', $_FILES['profilePictureRegister']['name']);
    $extension = strtolower(end($explodeName));
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    if (in_array($extension, $extensions)) {
      $uniqueName = $this->random_string(10);
      $img_file = $uniqueName.".".$extension;
      $_FILES['profilePictureRegister']['name']=$img_file;
      return $img_file;
    }
  }
  private function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
  }
}
