<?php
include("User.php");

class Trajet extends User
{
  public function newItinerary()
  {
    session_start();
    $start = $_POST['createItineraryDepart'];
    $end = $_POST['itineraryFinalCreate'];
    $dateCreate = $_POST['dateDepart'];
    $hour = $_POST['departureTime'];
    $numPlace = $_POST['placesNumber'];
    $type = $_POST['typeTrajetTest'];
    $idUser = $_SESSION['id_user'];
    $addReq = array();
    $addSelect = array();
    if (isset($_POST['step1Adding']) && !empty($_POST['step1Adding'])) {
      $step1 = $_POST['step1Adding'];
      array_push($addSelect, ', point1_traject');
      array_push($addReq, ', :point1_traject');
    }
    if (isset($_POST['step2Adding']) && !empty($_POST['step2Adding'])) {
      $step2 = $_POST['step2Adding'];
      array_push($addSelect, 'point2_traject');
      array_push($addReq, ':point2_traject');
    }
    if (isset($_POST['step3Adding']) && !empty($_POST['step3Adding'])) {
      $step3 = $_POST['step3Adding'];
      array_push($addSelect, 'point3_traject');
      array_push($addReq, ':point3_traject');
    }
    $addRequest = implode(", ", $addReq);
    $addSelections = implode(", ", $addSelect);
    $registertraj = $this->connect()->prepare('INSERT INTO trajects (start_traject, end_traject, date_traject, hour_traject, numplace_traject, placerest_traject, type_traject, id_user' . $addSelections . ') VALUES (:start_traject, :end_traject, :date_traject, :hour_traject, :numplace_traject, :placerest_traject, :type_traject, :id_user' . $addRequest . ' )');
    $registertraj->bindParam(':start_traject', $start);
    $registertraj->bindParam(':end_traject', $end);
    $registertraj->bindParam(':date_traject', $dateCreate);
    $registertraj->bindParam(':hour_traject', $hour);
    $registertraj->bindParam(':numplace_traject', $numPlace);
    $registertraj->bindParam(':placerest_traject', $numPlace);
    $registertraj->bindParam(':type_traject', $type);
    $registertraj->bindParam(':id_user', $idUser);
    if (isset($_POST['step1Adding']) && !empty($_POST['step1Adding'])) {
      $registertraj->bindParam(':point1_traject', $step1);
      var_dump($step1);
    }
    if (isset($_POST['step2Adding']) && !empty($_POST['step2Adding'])) {
      $registertraj->bindParam(':point2_traject', $step2);
      var_dump($step2);
    }
    if (isset($_POST['step3Adding']) && !empty($_POST['step3Adding'])) {
      $registertraj->bindParam(':point3_traject', $step3);
      var_dump($step3);
    }
    $registertraj->execute();
    // $registertraj->debugDumpParams();
    // var_dump($start);
    // var_dump($end);
    // var_dump($dateCreate);
    // var_dump($hour);
    // var_dump($numPlace);
    // var_dump($type);
    // var_dump($idUser);
    header('Location: ../../pages/searchItinerary.php');
  }
  public function editItinerary()
  {
    $idT = $_GET['id_traject'];
    $start = $_POST['modifyItineraryDepart'];
    $end = $_POST['itineraryFinalCreate'];
    $dateCreate = $_POST['dateDepart'];
    $hour = $_POST['departureTime'];
    $numPlace = $_POST['placesNumber'];
    $type = $_POST['typeTrajetTest'];
    $addReq = array();
    $addSelect = array();
    if (isset($_POST['step1Adding']) && !empty($_POST['step1Adding'])) {
      $step1 = $_POST['step1Adding'];
      array_push($addSelect, ', point1_traject = ');
      array_push($addReq, ':point1_traject ');
    }
    if (isset($_POST['step2Adding']) && !empty($_POST['step2Adding'])) {
      $step2 = $_POST['step2Adding'];
      array_push($addSelect, ', point2_traject = ');
      array_push($addReq, ':point2_traject ');
    }
    if (isset($_POST['step3Adding']) && !empty($_POST['step3Adding'])) {
      $step3 = $_POST['step3Adding'];
      array_push($addSelect, ', point3_traject = ');
      array_push($addReq, ':point3_traject');
    }
    $addRequest = implode(" ", $addReq);
    $addSelections = implode(" ", $addSelect);
    $registertraj = $this->connect()->prepare('UPDATE trajects SET start_traject = :start_traject , end_traject = :end_traject , date_traject = :date_traject , hour_traject = :hour_traject , numplace_traject = :numplace_traject , placerest_traject = :placerest_traject , type_traject = :type_traject ' . $addSelections . '' . $addRequest . ' WHERE id_traject = :id_traject');
    $registertraj->bindParam(':id_traject', $idT);
    $registertraj->bindParam(':start_traject', $start);
    $registertraj->bindParam(':end_traject', $end);
    $registertraj->bindParam(':date_traject', $dateCreate);
    $registertraj->bindParam(':hour_traject', $hour);
    $registertraj->bindParam(':numplace_traject', $numPlace);
    $registertraj->bindParam(':placerest_traject', $numPlace);
    $registertraj->bindParam(':type_traject', $type);
    if (isset($_POST['step1Adding']) && !empty($_POST['step1Adding'])) {
      $registertraj->bindParam(':point1_traject', $step1);
      var_dump($step1);
    }
    if (isset($_POST['step2Adding']) && !empty($_POST['step2Adding'])) {
      $registertraj->bindParam(':point2_traject', $step2);
      var_dump($step2);
    }
    if (isset($_POST['step3Adding']) && !empty($_POST['step3Adding'])) {
      $registertraj->bindParam(':point3_traject', $step3);
      var_dump($step3);
    }
    $registertraj->execute();
    // $registertraj->debugDumpParams();
    // var_dump($start);
    // var_dump($end);
    // var_dump($dateCreate);
    // var_dump($hour);
    // var_dump($numPlace);
    // var_dump($type);
    // var_dump($idT);
    header('Location: ../../pages/searchItinerary.php');
  }
  public function deletItinerary()
  {
    $idT = $_GET['id_traject'];
    $deletItinerary = $this->connect()->prepare("DELETE FROM trajects WHERE id_traject = :id_traject");
    $deletItinerary->bindValue(':id_traject', $idT);
    $deletItinerary->execute();
    // $deletItinerary->debugDumpParams();
    header('Location: ../../pages/searchItinerary.php');
  }
  public function searchItinerary()
  {
    $req = array();
    $value = array();

    if (isset($_POST['startingPointSearch']) && !empty($_POST['startingPointSearch'])) {
      array_push($req, 'AND start_traject = ?');
      array_push($value, $_POST['startingPointSearch']);
    }

    if (isset($_POST['arrivalPointSearch']) && !empty($_POST['arrivalPointSearch'])) {
      array_push($req, 'AND end_traject = ?');
      array_push($value, $_POST['arrivalPointSearch']);
    }

    if (isset($_POST['dateSearch']) && !empty($_POST['dateSearch'])) {
      array_push($req, 'AND date_traject = ?');
      array_push($value, $_POST['dateSearch']);
    }

    $request = implode(" ", $req);
    $search = $this->connect()->prepare('SELECT * FROM trajects INNER JOIN users ON trajects.id_user = users.id_user WHERE 1 = 1 AND placerest_traject > 0 ' . $request . '');

    $search->execute($value);
    $search->debugDumpParams();
    return $search->fetchAll();
  }
  // function for my traj page myItinerary.php
  public function getMyTrajects()
  {
    $myItinerary = $this->connect()->query('SELECT * FROM trajects WHERE id_user = ' . $_SESSION['id_user'] . '');
    return $myItinerary->fetchAll();
  }
  // function for all traj page modifyItinerary.php , deletItinerary.php , reservation.php
  public function getIdTrajects()
  {
    $idItinerary = $this->connect()->query('SELECT * FROM trajects INNER JOIN users ON trajects.id_user = users.id_user WHERE id_traject = ' . $_GET['id_traject'] . '');
    return $idItinerary->fetch();
  }
  // function for my traj page reservation.php
  public function getIdUsers()
  {
    $idItinerary = $this->connect()->query('SELECT * FROM users INNER JOIN trajects ON users.id_user = trajects.id_user WHERE id_traject = ' . $_GET['id_traject'] . '');
    return $idItinerary->fetch();
  }
  // function for my traj page reservation.php
  public function getReservId()
  {
    $allItinerary = $this->connect()->query('SELECT * FROM trajects WHERE id_traject = ' . $_GET['id_traject'] . '');
    return $allItinerary->fetch();
  }
  // function for all traj page resultSearch.php
  public function getAllTrajects()
  {
    $monthItinerary = $this->connect()->query('SELECT * FROM trajects INNER JOIN users ON trajects.id_user = users.id_user WHERE 1 = 1 AND placerest_traject > 0');
    return $monthItinerary->fetchAll();
  }

  // ================================================================================================
  // ====
  // ====                           Réservation / Message
  // ====
  // ================================================================================================

  // 0-demande    1-validé
  public function reservations()
  {
    session_start();
    $idUser = $_SESSION['id_user'];
    $idTraject = $_GET['id_traject'];
    $reserverM = $this->connect()->prepare("INSERT INTO mailbox (type_message) VALUES ('0')");
    $reserverM->execute();
    $userGetId = $this->connect()->query('SELECT * FROM mailbox');
    $user = $userGetId->fetch();
    $idMess = $user['id_message'];
    $reserver = $this->connect()->prepare("INSERT INTO reserver (id_user, id_traject, id_message) VALUES (:id_user, :id_traject, :id_message)");
    $reserver->bindParam(':id_user', $idUser);
    $reserver->bindParam(':id_traject', $idTraject);
    $reserver->bindParam(':id_message', $idMess);
    $reserver->execute();
    $reserver->debugDumpParams();
    header('Location: ../../pages/myReservations.php');
  }
  public function cancelReservations()
  {
    $idT = $_GET['id_traject'];
    $deletItinerary = $this->connect()->prepare("DELETE FROM trajects WHERE id_traject = :id_traject");
    $deletItinerary->bindValue(':id_traject', $idT);
    $deletItinerary->execute();
    // $deletItinerary->debugDumpParams();
    header('Location: ../../pages/searchItinerary.php');
  }
  public function getMyReservations()
  {
    $myReservations = $this->connect()->query('SELECT * FROM reserver INNER JOIN trajects ON trajects.id_traject = reserver.id_traject INNER JOIN users ON users.id_user = reserver.id_user WHERE reserver.id_user = ' . $_SESSION['id_user'] . '');
    return $myReservations->fetchAll();
  }
  public function getMyMessage()
  {
    $myReservations = $this->connect()->query('SELECT * FROM mailbox INNER JOIN trajects ON trajects.id_traject = mailbox.id_traject INNER JOIN users ON users.id_user = mailbox.id_user WHERE user.id_user = ' . $_SESSION['id_user'] . '');
    return $myReservations->fetchAll();
  }

  //RECUPERE LES RESERVATIONS DE L'UTILISATEUR
  // public function getReservations()
  // {
  //   $reservationdata = $this->connect()->prepare("SELECT reservation.id_reservation, trajets.id_user, reservation.id_user, trajets.depart, trajets.destination, trajets.jour_voyage FROM `reservation` INNER JOIN trajets ON reservation.id_trajet = trajets.id_trajet WHERE trajets.id_user = :id_user;");
  //   $reservationdata->bindValue(':id_user', $idUser);
  //   $reservationdata->execute();
  //   $data = $reservationdata->fetchAll();
  //   return $data;
  // }


  // public function getDataValidation()
  // {
  //   $validationData = $this->connect()->prepare("SELECT users.username , users.picture , trajets.depart , trajets.destination , trajets.jour_voyage , id_reservation FROM (reservation INNER JOIN trajets ON trajets.id_trajet = reservation.id_trajet) INNER JOIN users ON users.id_user = reservation.id_user WHERE id_reservation = :idReservation ;");
  //   $validationData->bindValue(':idReservation', $idReservation);
  //   $validationData->execute();
  //   $data = $validationData->fetch();
  //   return $data;
  // }
  // // CONFIRMATION DE RESERVATION
  // public function confirmReservation()
  // {
  //   $confirm = $this->connect()->prepare("UPDATE reservation SET `accepted` = '1' WHERE id_reservation = :idReservation");
  //   $confirm->bindValue(':idReservation', $idReservation);
  //   $confirm->execute();
  //   $place = $this->connect()->prepare("SELECT reservation.id_trajet , trajets.nb_voyageurs FROM trajets INNER JOIN reservation ON reservation.id_trajet = trajets.id_trajet WHERE id_reservation = :idReservation");
  //   $place->bindValue(':idReservation', $idReservation);
  //   $place->execute();
  //   $places = $place->fetch();
  //   $idTrajet = $places['id_trajet'];
  //   $placeDispo = $places['nb_voyageurs'] - 1;
  //   $removePlace = $this->connect()->prepare("UPDATE trajets SET nb_voyageurs = :nbVoyageurs WHERE id_trajet = :idTrajet");
  //   $removePlace->bindValue(':idTrajet', $idTrajet);
  //   $removePlace->bindValue(':nbVoyageurs', $placeDispo);
  //   $removePlace->execute();
  //   $_SESSION['confirmMessage'] = 'Votre message a bien été envoyé !';
  //   $this->redirect("./blablacampus/confirmation.php", "0");
  // }

  // public function checkReservations()
  // {
  //   $check = $this->connect()->prepare("SELECT * FROM reservation WHERE id_trajet = :idTrajet AND id_user = :idUser");
  //   $check->bindValue(':idTrajet', $idTrajet);
  //   $check->bindValue(':idUser', $idUser);
  //   $check->execute();
  //   $exist = $check->fetch();
  //   return $exist;
  // }

  // public function getValidReservations()
  // {
  //   $get = $this->connect()->prepare("SELECT trajets.id_trajet , trajets.jour_voyage , trajets.depart , trajets.destination , trajets.aller_retour FROM reservation INNER JOIN trajets ON reservation.id_trajet = trajets.id_trajet WHERE reservation.id_user = :idUser AND reservation.accepted = '1';");
  //   $get->bindValue(':idUser', $idUser);
  //   $get->execute();
  //   $data = $get->fetchAll();
  //   return $data;
  // }

  // public function getValidations()
  // {
  //   $reservationdata = $this->connect()->prepare("SELECT reservation.id_reservation, trajets.id_user, reservation.id_user, trajets.depart, trajets.destination, trajets.jour_voyage FROM `reservation` INNER JOIN trajets ON reservation.id_trajet = trajets.id_trajet WHERE reservation.id_user = :id_user AND accepted = '1' AND cancel = '0'");
  //   $reservationdata->bindValue(':id_user', $idUser);
  //   $reservationdata->execute();
  //   $data = $reservationdata->fetchAll();
  //   return $data;
  // }

  // public function cancelTraject()
  // {
  //   $place = $this->connect()->prepare("SELECT nb_voyageurs FROM trajets WHERE id_trajet = :idTrajet");
  //   $place->bindValue(':idTrajet', $idTrajet);
  //   $place->execute();
  //   $tempPlace = $place->fetch();
  //   $placeDispo = $tempPlace['nb_voyageurs'] + 1;
  //   $addPlace = $this->connect()->prepare("UPDATE trajets SET nb_voyageurs = :nbVoyageurs WHERE id_trajet = :idTrajet");
  //   $addPlace->bindValue(':idTrajet', $idTrajet);
  //   $addPlace->bindValue(':nbVoyageurs', $placeDispo);
  //   $addPlace->execute();
  //   $cancel = $this->connect()->prepare("DELETE FROM reservation WHERE id_trajet = :idTrajet");
  //   $cancel->bindValue(':idTrajet', $idTrajet);
  //   $cancel->execute();
  //   $_SESSION['confirmMessage'] = 'Votre réservation a bien été annulée.';
  //   $this->redirect("./blablacampus/confirmation.php", "0");
  // }

  // public function checkDeletedTraject()
  // {
  //   $getReservation = $this->connect()->prepare("SELECT id_trajet FROM reservation WHERE id_user = :id_user");
  //   $getReservation->bindValue(':id_user', $idUser);
  //   $getReservation->execute();
  //   $reservation = $getReservation->fetchAll();

  //   for ($i = 0; $i < count($reservation); $i++) {
  //     $getTrajets = $this->connect()->prepare("SELECT id_trajet FROM trajets WHERE id_trajet = :id_trajet");
  //     $getTrajets->bindValue(':id_trajet', $reservation[$i]['id_trajet']);
  //     $getTrajets->execute();
  //     $trajet = $getTrajets->fetch();

  //     if ($trajet['id_trajet'] = false) {

  //       $deleted = $this->connect()->prepare("UPDATE reservation SET cancel = '1' WHERE id_trajet = :id_trajet");
  //       $deleted->bindValue(':id_trajet', $reservation[$i]['id_trajet']);
  //       $deleted->execute();
  //     }
  //   }
  // }

  // public function getCanceled()
  // {
  //   $reservationdata = $this->connect()->prepare("SELECT reservation.id_reservation, reservation.id_user, reservation.id_conducteur FROM `reservation` WHERE reservation.id_user = :id_user AND accepted = '1' AND cancel = '1'");
  //   $reservationdata->bindValue(':id_user', $idUser);
  //   $reservationdata->execute();
  //   $data = $reservationdata->fetchAll();
  //   return $data;
  // }
}
