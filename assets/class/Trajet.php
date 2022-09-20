<?php
require_once("../assets/class/User.php");

class Trajet extends User
{
  public function propose()
  {
    $start = $_POST['createItineraryDepart'];
    $end = $_POST['itineraryFinalCreate'];
    $step1 = $_POST['step1Adding'];
    $step2 = $_POST['step2Adding'];
    $step3 = $_POST['step3Adding'];
    $dateCreate = $_POST['dateDepart'];
    $hour = $_POST['departureTime'];
    $numPlace = $_POST['placesNumber'];
    $type = $_POST['typeTrajetTest'];
    if (isset($_POST['action']) && !empty($step1))
      $register = $this->connect()->prepare("INSERT INTO traject (start_traject, end_traject, point1_traject, point2_traject, point3_traject, date_traject, hour_traject, numberplace_traject, type_traject) VALUES (:start_traject, :end_traject, :point1_traject, :point2_traject, :point3_traject, :date_traject, :hour_traject, :numberplace_traject, :type_traject)");
    $register->bindParam(':start_traject', $start, PDO::PARAM_STR);
    $register->bindParam(':end_traject', $end, PDO::PARAM_STR);
    $register->bindParam(':point1_traject', $step1, PDO::PARAM_STR);
    $register->bindParam(':point2_traject', $step2, PDO::PARAM_STR);
    $register->bindParam(':point3_traject', $step3, PDO::PARAM_STR);
    $register->bindParam(':date_traject', $dateCreate, PDO::PARAM_STR);
    $register->bindParam(':hour_traject', $hour, PDO::PARAM_STR);
    $register->bindParam(':numberplace_traject', $numPlace, PDO::PARAM_STR);
    $register->bindParam(':type_traject', $type, PDO::PARAM_STR);
    var_dump($start);
    var_dump($end);
    var_dump($step1);
    var_dump($step2);
    var_dump($step3);
    var_dump($dateCreate);
    var_dump($hour);
    var_dump($numPlace);
    var_dump($type);
    $register->execute();
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
