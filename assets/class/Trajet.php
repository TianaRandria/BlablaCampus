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
    $registertraj->debugDumpParams();
    // header('Location: ../pages/searchItinerary.php');
  }

  public function searchItinerary()
  {
    $req = array();
    $value = array();

    if (!empty($_POST['startingPointSearch'])) {
      array_push($req, 'AND start_traject = ""?""');
      array_push($value, $_POST['startingPointSearch']);
    }

    if (!empty($_POST['arrivalPointSearch'])) {
      array_push($req, 'AND end_traject = ""?""');
      array_push($value, $_POST['arrivalPointSearch']);
    }

    if (!empty($_POST['dateSearch'])) {
      array_push($req, 'AND date_traject = ""?""');
      array_push($value, $_POST['dateSearch']);
    }

    $request = implode(" ", $req);
    $search = $this->connect()->prepare('SELECT * FROM trajects WHERE 1  ' . $request . '');
    $search->execute($value);
    //$search->debugDumpParams();
    $resultSearch = $search->fetchAll();
    return $resultSearch;
    header('Location: ../pages/searchItinerary.php');
  }

  function getMyTrajects()
  {
    $myItinerary = $this->connect()->query('SELECT * FROM trajects WHERE id_user = ' . $_SESSION['id_user'] . '');
    return $myItinerary->fetchAll();
  }
  function getIdTrajects()
  {
    $idItinerary = $this->connect()->query('SELECT * FROM trajects WHERE id_traject = ' . $_GET['id_traject'] . '');
    return $idItinerary->fetch();
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
