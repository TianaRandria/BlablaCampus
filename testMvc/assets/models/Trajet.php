<?php

include("User.php");
class Trajet extends User
{
  public function newItinerary(){
    $start = $_POST['createItineraryDepart'];
    $end = $_POST['itineraryFinalCreate'];
    $dateCreate = $_POST['dateDepart'];
    $hour = $_POST['departureTime'];
    $numPlace = $_POST['placesNumber'];
    $type = $_POST['typeTrajetTest'];
    $ttt = $_POST['timeToTravel'];
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
    $registertraj = $this->connect()->prepare('INSERT INTO traject (start_traject, end_traject, date_traject, hour_traject, numberplace_traject, type_traject' . $addSelections . ', timeToTravel) VALUES (:start_traject, :end_traject, :date_traject, :hour_traject, :numberplace_traject, :type_traject' . $addRequest . ', :ttt )');
    $registertraj->bindParam(':start_traject', $start);
    $registertraj->bindParam(':end_traject', $end);
    $registertraj->bindParam(':date_traject', $dateCreate);
    $registertraj->bindParam(':hour_traject', $hour);
    $registertraj->bindParam(':numberplace_traject', $numPlace);
    $registertraj->bindParam(':type_traject', $type);
    if (isset($_POST['step1Adding']) && !empty($_POST['step1Adding'])) {
      $registertraj->bindParam(':point1_traject', $step1);
    }
    if (isset($_POST['step2Adding']) && !empty($_POST['step2Adding'])) {
      $registertraj->bindParam(':point2_traject', $step2);
    }
    if (isset($_POST['step3Adding']) && !empty($_POST['step3Adding'])) {
      $registertraj->bindParam(':point3_traject', $step3);
    }
    $registertraj->bindParam(':ttt', $ttt);
    $registertraj->execute();
  }
  public function editItinerary(){
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
    $registertraj = $this->connect()->prepare("INSERT INTO traject (start_traject, end_traject, date_traject, hour_traject, numberplace_traject, type_traject, point1_traject, point2_traject, point3_traject) VALUES (:start_traject, :end_traject, :date_traject, :hour_traject, :numberplace_traject, :type_traject $addRequest )");
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
  public function filter(){
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
  // public function deleteTraject()
  // {
  //   $delete = $this->connect()->prepare("DELETE FROM traject WHERE id_traject = :id_traject");
  //   $delete->bindValue(':id_trajet', $idTraject);
  //   $delete->execute();
  //   header('Location: ./confirmation.php');
  // }

  //   public function month() {
  //     if($month == '01') {
  //         return 'JANV';
  //     } else if($month == '02') {
  //         return 'FEVR';
  //     }else if($month == '03') {
  //         return 'MARS';
  //     }else if($month == '04') {
  //         return 'AVR';
  //     }else if($month == '05') {
  //         return 'MAI';
  //     }else if($month == '06') {
  //         return 'JUIN';
  //     }else if($month == '07') {
  //         return 'JUIL';
  //     }else if($month == '08') {
  //         return 'AOUT';
  //     }else if($month == '09') {
  //         return 'SEPT';
  //     }else if($month == '10') {
  //         return 'OCT';
  //     }else if($month == '11') {
  //         return 'NOV';
  //     }else if($month == '12') {
  //         return 'DEC';
  //     }
  // }
}
