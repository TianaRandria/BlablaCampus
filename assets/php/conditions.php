<?php

include('../class/Trajet.php');

// =================== User =======================

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
// Condition editAccount
if (isset($_POST['action']) && $_POST['action'] == "ÉDITER MON COMPTE") {
  $editA = new User();
  $editA->editAccount();
}
// Condition passwordReset
if (isset($_POST['action']) && $_POST['action'] == "RÉINITIALISER LE MOT DE PASSE") {
  $pswdR = new User();
  $pswdR->pswdReset();
}
// Condition
if (isset($_POST['action']) && $_POST['action'] == "") {
  $pswdR = new User();
  $pswdR->pswdReset();
}

// ==================== Trajet =====================

// Condition searchItinerary
if (isset($_POST['action']) && $_POST['action'] == "RESERVE") {
  $reserveI = new Trajet();
  $reserveI->searchItinerary();
}
// Condition searchItinerary
if (isset($_POST['action']) && $_POST['action'] == "RECHERCHER") {
  $searchI = new Trajet();
  $searchI->searchItinerary();
}
// Condition deletItinerary
if (isset($_POST['confirmation']) && $_POST['confirmation'] == "Supprimer") {
  $deletI = new Trajet();
  $deletI->deletItinerary();
}
// Condition newItinerary
if (isset($_POST['action']) && $_POST['action'] == "Proposer un trajet") {
  $newI = new Trajet();
  $newI->newItinerary();
}
// Condition editItinerary
if (isset($_POST['action']) && $_POST['action'] == "Modifié un trajet") {
  $editI = new Trajet();
  $editI->editItinerary();
}

// ================= Réservations ==================

// Condition reserver
if (isset($_POST['action']) && $_POST['action'] == "Envoyer ma demande") {
  $reserverI = new Trajet();
  $reserverI->reservations();
}
// Condition cancel
if (isset($_POST['confirmation']) && $_POST['confirmation'] == "Annuler ma réservation") {
  $cancelI = new Trajet();
  $cancelI->cancelReservations();
}
// Condition valider
if (isset($_POST['confirmation']) && $_POST['confirmation'] == "Annuler ma réservation") {
  $cancelI = new Trajet();
  $cancelI->cancelReservations();
}
// header('Location: ../../pages/searchItinerary.php');
