<?php
// Condition Register
if (isset($_POST['action']) && !empty($_POST['nameRegister'])  && !empty($_POST['nicknameRegister']) && !empty($_POST['pswdRegister']) && !empty($_POST['emailRegister']) && !empty($_POST['bioRegister']) && $_POST['action'] == "CRÉER MON COMPTE") {
  $reg = new User();
  $reg->register();
}
// Condition login
if (isset($_POST['action']) && !empty($_POST['login'])  && !empty($_POST['password']) && $_POST['action'] == "SE CONNECTER") {
  $log = new User();
  $log->login();
}
// Condition Logout
if (isset($_POST['action']) && !empty($_SESSION['nickname_user']) && $_POST['action'] == "Se déconnecter") {
  $log = new User();
  $log->Logout();
}