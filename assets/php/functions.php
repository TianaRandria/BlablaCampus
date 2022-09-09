<?php
session_start();
function connect()
{
  try {
    $db = new PDO('mysql:host=localhost;dbname=blablacampus', 'root', '');
    return $db;
  } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
  }
}

function register()
{
  $name = $_POST['nameRegister'];
  $nickname = $_POST['nicknameRegister'];
  $password = password_hash($_POST['pswdRegister'],  PASSWORD_DEFAULT);
  $email = $_POST['emailRegister'];
  $bio = $_POST['bioRegister'];
  $register = connect()->prepare('INSERT INTO compte (name_user, nickname_user, password_user, email_user, bio_user) VALUES  (:name_user, :nickname_user, :password_user, :email_user, :bio_user)');
  $register = connect()->prepare('INSERT INTO stu_information (stu_photograph) VALUES(LOAD_FILE('/image_path/image_fileName.png'))');
  $register->bindParam(':name_user', $name, PDO::PARAM_STR);
  $register->bindParam(':nickname_user', $nickname, PDO::PARAM_STR);
  $register->bindParam(':password_user', $password, PDO::PARAM_STR);
  $register->bindParam(':email_user', $email, PDO::PARAM_STR);
  $register->bindParam(':bio_user', $bio, PDO::PARAM_STR);
  $register->execute();
}

function login()
{
  $findUser = connect()->prepare('SELECT * FROM user WHERE login_user = :login_user');
  $findUser->bindParam(':login_user', $_POST['username'], PDO::PARAM_STR);
  $findUser->execute();
  $user = $findUser->fetch();
  if ($user && password_verify($_POST['password'], $user['password_user'])) {
    $_SESSION['nom_user'] = $user['name_user'];
    header('Location: ./index.php');
  } else {
    echo 'Invalid username or password';
  }
}

if (isset($_POST['action']) && !empty($_POST['nameRegister'])  && !empty($_POST['nicknameRegister']) && !empty($_POST['pswdRegister']) && !empty($_POST['emailRegister']) && !empty($_POST['bioRegister']) && $_POST['action'] == "CRÉER MON COMPTE") {
  register();
}

if (isset($_POST['action']) && !empty($_POST['username'])  && !empty($_POST['password'])  && $_POST['action'] == "login") {
  login();
}
