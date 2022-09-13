<?php

include ("../assets/class/Database.php");

class Trajet extends Database{
    public function propose()
    {
      $name = $_POST['nameRegister'];
      $nickname = $_POST['nicknameRegister'];
      $password = password_hash($_POST['pswdRegister'],  PASSWORD_DEFAULT);
      $email = $_POST['emailRegister'];
      $bio = $_POST['bioRegister'];
      $register = $this->connect()->prepare("INSERT INTO compte (name_user, nickname_user, password_user, email_user, bio_user) VALUES  (:name_user, :nickname_user, :password_user, :email_user, :bio_user), INSERT INTO stu_information ( stu_photograph ) VALUES (LOAD_FILE('/image_path/image_fileName.png'))");
      $register->bindParam(':name_user', $name, PDO::PARAM_STR);
      $register->bindParam(':nickname_user', $nickname, PDO::PARAM_STR);
      $register->bindParam(':password_user', $password, PDO::PARAM_STR);
      $register->bindParam(':email_user', $email, PDO::PARAM_STR);
      $register->bindParam(':bio_user', $bio, PDO::PARAM_STR);
      $register->execute();
    }
}