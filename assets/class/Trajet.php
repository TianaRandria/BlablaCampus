<?php
include("User.php");

class Trajet extends User
{
  public function propose()
  {
    $start = $_POST['createItineraryDepart'];
    $end = $_POST['itineraryFinalCreate'];
    $dateCreate = $_POST['dateDepart'];
    $hour = $_POST['departureTime'];
    $numPlace = $_POST['placesNumber'];
    $type = $_POST['typeTrajetTest'];
    $step1 = $_POST['step1Adding'];
    $step2 = $_POST['step2Adding'];
    $step3 = $_POST['step3Adding'];
    $addReq = array();
    if (!empty($_POST['step1Adding'])) {
      array_push($addReq, ':point1_traject');
    }
    if (!empty($_POST['step2Adding'])) {
      array_push($addReq, ':point2_traject');
    }
    if (!empty($_POST['step3Adding'])) {
      array_push($addReq, ':point3_traject');
    }
    $addRequest = implode(" ,", $addReq);
    $registertraj = $this->connect()->prepare("INSERT INTO traject (start_traject, end_traject, date_traject, hour_traject, numberplace_traject, type_traject, point1_traject, point2_traject, point3_traject) VALUES (:start_traject, :end_traject, :date_traject, :hour_traject, :numberplace_traject, :type_traject,  $addRequest )");
    $registertraj->bindParam(':start_traject', $start, PDO::PARAM_STR);
    $registertraj->bindParam(':end_traject', $end, PDO::PARAM_STR);
    $registertraj->bindParam(':date_traject', $dateCreate, PDO::PARAM_STR);
    $registertraj->bindParam(':hour_traject', $hour, PDO::PARAM_STR);
    $registertraj->bindParam(':numberplace_traject', $numPlace, PDO::PARAM_STR);
    $registertraj->bindParam(':type_traject', $type, PDO::PARAM_STR);
    $registertraj->bindParam(':point1_traject', $step1, PDO::PARAM_STR);
    $registertraj->bindParam(':point2_traject', $step2, PDO::PARAM_STR);
    $registertraj->bindParam(':point3_traject', $step3, PDO::PARAM_STR);
    // $registertraj->execute();
    $registertraj->debugDumpParams();
    // header('Location: ../pages/searchItinerary.php');
  }

  public function filter()
  {
    $req = array();
    $value = array();

    if (!empty($_POST['startingPointSearch'])) {
      array_push($req, 'AND start_traject = ""?""');
      array_push($value, $_POST['startingPointSearch']);
    }

    if (!empty($_GET['arrivalPointSearch'])) {
      array_push($req, 'AND end_traject = ""?""');
      array_push($value, $_GET['arrivalPointSearch']);
    }

    if (!empty($_GET['dateSearch'])) {
      array_push($req, 'AND date_traject = ""?""');
      array_push($value, $_GET['dateSearch']);
    }

    $request = implode(" ", $req);
    $search = $this->connect()->prepare('SELECT * FROM traject WHERE 1  ' . $request . '');
    $search->execute($value);
    //$search->debugDumpParams();
    $resultSearch = $search->fetchAll();
    return $resultSearch;
  }
}
