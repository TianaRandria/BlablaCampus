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
  $password = password_hash($_POST['pswdRegister'],  PASSWORD_DEFAULT);
  $name = $_POST['nameRegister'];
  $nickname = $_POST['nicknameRegister'];
  $email = $_POST['emailRegister'];
  $bio = $_POST['emailRegister'];

  $ajouter = connect()->prepare('INSERT INTO compte (username_user, password_user, name_user, email_user, bio_user ) VALUES (:nickname_user, :password_user, :name_user, :email_user, :bio_user )');
  $ajouter->bindParam(
    ':nickname_user',
    $nickname,
    PDO::PARAM_STR
  );
  $ajouter->bindParam(
    ':password_user',
    $password,
    PDO::PARAM_STR
  );
  $ajouter->bindParam(
    ':name_user',
    $name,
    PDO::PARAM_STR
  );
  $ajouter->bindParam(
    ':email_user',
    $email,
    PDO::PARAM_STR
  );
  $ajouter->bindParam(
    ':bio_user',
    $bio,
    PDO::PARAM_STR
  );
  $estceok = $ajouter->execute();
  $ajouter->debugDumpParams();
  if ($estceok) {
    header('Location: ./searchitinerary.php');
  } else {
    echo 'Error during registration';
  }
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

if (isset($_POST['action']) && !empty($_POST['username'])  && !empty($_POST['password'])  && $_POST['action'] == "register") {
  register();
}

if (isset($_POST['action']) && !empty($_POST['username'])  && !empty($_POST['password'])  && $_POST['action'] == "login") {
  login();
}
