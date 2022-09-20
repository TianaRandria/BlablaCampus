<?php

include("./assets/class/Database.php");

class Trajet extends Database
{
  public function propose()
  {
    $start = $_POST['createItineraryDepart'];
    $end = $_POST['itineraryFinalCreate'];
    $step1 = $_POST['step1Adding'];
    $step2 = $_POST['step2Adding'];
    $step3 = $_POST['step3Adding'];
    $date = $_POST['dateDepart'];
    $hour = $_POST['departureTime'];
    $numPlace = $_POST['placesNumber'];
    $type = $_POST['typeTrajetTest'];
    $register = $this->connect()->prepare("INSERT INTO traject (start_traject, end_traject, point1_traject, point2_traject, point3_traject, date_traject, hour_traject, numberplace_traject, type_traject) VALUES (:start_traject, :end_traject, :point1_traject, :point2_traject, :point3_traject, :date_traject, :hour_traject, :numberplace_traject, :type_traject)");
    $register->bindParam(':start_traject', $start, PDO::PARAM_STR);
    $register->bindParam(':end_traject', $end, PDO::PARAM_STR);
    $register->bindParam(':point1_traject', $step1, PDO::PARAM_STR);
    $register->bindParam(':point2_traject', $step2, PDO::PARAM_STR);
    $register->bindParam(':point3_traject', $step3, PDO::PARAM_STR);
    $register->bindParam(':date_traject', $date, PDO::PARAM_STR);
    $register->bindParam(':hour_traject', $hour, PDO::PARAM_STR);
    $register->bindParam(':numberplace_traject', $numPlace, PDO::PARAM_STR);
    $register->bindParam(':type_traject', $type, PDO::PARAM_STR);
    $register->execute();
  }
}
