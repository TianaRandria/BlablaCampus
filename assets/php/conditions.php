<?php

include('../class/Trajet.php');
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
if (isset($_GET['action']) && $_GET['action'] == "Se déconnecter") {
  $logou = new User();
  $logou->Logout();
}
// Condition Logout
if (isset($_POST['action']) && $_POST['action'] == "RÉINITIALISER LE MOT DE PASSE") {
  $pswdR = new User();
  $pswdR->pswdReset();
}
// Condition NewItinary
if (isset($_POST['action']) && !empty($_POST['createItineraryDepart'])  && !empty($_POST['itineraryFinalCreate']) && !empty($_POST['dateDepart']) && !empty($_POST['departureTime']) && !empty($_POST['placesNumber']) && !empty($_POST['typeTrajetTest']) && $_POST['action'] == "Proposer un trajet") {
  $newiti = new Trajet();
  $newiti->newItinerary();
}
