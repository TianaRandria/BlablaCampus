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
    $monthItinerary = $this->connect()->query('SELECT * FROM trajects INNER JOIN users ON trajects.id_user = users.id_user AND placerest_traject > 0 WHERE users.id_user != ' . $_SESSION['id_user'] . '');
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
    $userGetId = $this->connect()->query('SELECT id_message FROM mailbox');
    $user = $userGetId->fetch();
    $idMess = $user['id_message'];
    $reserver = $this->connect()->prepare("INSERT INTO reserver (id_user, id_traject, id_message) VALUES (:id_user, :id_traject, :id_message)");
    $reserver->bindParam(':id_user', $idUser);
    $reserver->bindParam(':id_traject', $idTraject);
    $reserver->bindParam(':id_message', $idMess);
    $reserver->execute();
    // $reserver->debugDumpParams();
  }
  public function cancelReservations()
  {
    $idR = $_GET['id_reservation'];
    $cancelReservation = $this->connect()->prepare("DELETE FROM reserver WHERE id_reservation = :id_reservation");
    $cancelReservation->bindValue(':id_reservation', $idR);
    $cancelReservation->execute();
    // $deletItinerary->debugDumpParams();
    header('Location: ../../pages/searchItinerary.php');
  }
  // function for my traj page myReservations.php
  public function getMyReservations()
  {
    $myReservations = $this->connect()->query('SELECT * FROM reserver INNER JOIN trajects ON trajects.id_traject = reserver.id_traject INNER JOIN users ON users.id_user = reserver.id_user WHERE reserver.id_user = ' . $_SESSION['id_user'] . '');
    return $myReservations->fetchAll();
  }

  // function for my traj page reservationCancel.php
  public function getCancelReservId()
  {
    $cancelReservation = $this->connect()->query('SELECT * FROM reserver WHERE id_reservation = ' . $_GET['id_reservation'] . '');
    return $cancelReservation->fetch();
  }
  public function getMyMessage()
  {
    $myMessage = $this->connect()->query('SELECT * FROM reserver INNER JOIN mailbox ON mailbox.id_message = reserver.id_message INNER JOIN trajects ON trajects.id_traject = reserver.id_traject INNER JOIN users ON users.id_user = reserver.id_user WHERE trajects.id_user = reserver.id_user');
    return $myMessage->fetchAll();
  }
  public function getAcceptMessage()
  {
    $acceptMessage = $this->connect()->query('SELECT * FROM reserver INNER JOIN mailbox ON mailbox.id_message = reserver.id_message INNER JOIN trajects ON trajects.id_traject = reserver.id_traject INNER JOIN users ON users.id_user = reserver.id_user WHERE mailbox.id_message = ' . $_GET['id_message'] . '');
    return $acceptMessage->fetch();
  }
}
