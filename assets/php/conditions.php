<?php
// Condition Register
if (isset($_POST['action']) && !empty($_POST['nameRegister'])  && !empty($_POST['nicknameRegister']) && !empty($_POST['pswdRegister']) && !empty($_POST['emailRegister']) && !empty($_POST['bioRegister']) && $_POST['action'] == "CRÉER MON COMPTE") {
  $reg = new User();
  $reg->register();
}
if (isset($_POST['action']) && !empty($_POST['login'])  && !empty($_POST['password']) && $_POST['action'] == "SE CONNECTER") {
  $log = new User();
  $log->login();
}
