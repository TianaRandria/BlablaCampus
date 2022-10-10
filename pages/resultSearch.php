<?php include('header.php');
include('../assets/class/Trajet.php');
// $getDateTraj = new Trajet();
// $getDateTrajects = $getDateTraj->month();
$getAllTraj = new Trajet();
$getAllTrajects = $getAllTraj->searchItinerary();

$monthAndDay =  $getAllTrajects['date_traject'];
$monthAndDayArray = explode('-', $monthAndDay);
$day = implode('', array_splice($monthAndDayArray, 2, 2));
$removeday = array_splice($monthAndDayArray, 0, 2);
switch (implode('', array_splice($removeday, 1, 1))) {
  case '01':
    $month = "JANV";
    break;
  case '02':
    $month = "FEVR";
    break;
  case '03':
    $month = "MARS";
    break;
  case '04':
    $month = "AVR";
    break;
  case '05':
    $month = "MAI";
    break;
  case '06':
    $month = "JUIN";
    break;
  case '07':
    $month = "JUILL";
    break;
  case '08':
    $month = "AOUT";
    break;
  case '09':
    $month = "SEPT";
    break;
  case '10':
    $month = "OCT";
    break;
  case '11':
    $month = "NOV";
    break;
  default:
    $month = "DEC";
    break;
}
?>

<main class="flex flex-col justify-start items-center w-screen min-h-screen gap-4">
  <h4 class="w-5/6font-bungee">Trajets Disponibles</h4>

  <!--         structure à utiliser dans le echo de ta fonction de recherche pour écrire les résultats , les seuls trucs à changer dedans seront les contenu des P ansi que la value de l'input hidden         -->

  <?php if (count($transfert) > 0) { ?>
    <div class="flex w-5/6 justify-between items-center rounded-lg bg-xtraLightGrey p-3 h-24">
      <div class="flex w-3/5 justify-between items-center h-full">
        <div class="flex flex-col">
          <p class="jourDate font-bungee text-redOnline text-4xl"><?php echo $day ?></p>
          <p class="moisDate font-bungee text-xl"><?php echo $month ?></p>
        </div>
        <div class="h-full flex flex-col items-start justify-center">
          <p class="startingPoint text-lightGrey font-medium text-sm font-epilogue"><?php echo $getAllTrajects['start_traject'] ?></p>
          <p class="endingPoint text-lightGrey font-medium text-sm font-epilogue"><?php echo $getAllTrajects['end_traject'] ?></p>
        </div>
      </div>
      <img src="../assets//img/upDown.png" alt="doubles inversés haut et bas" class="fleche">
    </div>

    <!--       Seule modif à faire ici pour toi Vincent , c'est dans la span , remplacé par probablement un count du nombre de résultats retourné par ton select -->

    <p class="w-5/6"><span class="text-redOnline">5</span> trajets disponibles</p>

    <!-- texte fixe ou aucune modif n'est nécessaireok -->

    <div class="w-full flex justify-between items-center gap-2">
      <img src="../assets/img/clock.png" alt="Logo d'horloge">
      <p class="font-epilogue font-medium text-xs">Les trajets sont triés chronologiquement par heure de départ.</p>
    </div>
    <?php
    for ($i = 0; $i < count($getAllTrajects); $i++) { ?>
      <form action="reservation.php" class="w-full" id="result<?= $i ?>">
        <div class="card w-full bg-xtraLightGrey rounded-lg flex flex-col p-3 gap-3.5 relative">
          <p class="text-xs font-workSans text-end w-full">places disponibles : <span class="text-redOnline font-bold"><?php $getAllTrajects[$i]['placeRest'] ?></span></p>
          <div class="firstRow w-full flex h-16 gap-2">
            <div class="flex flex-col justify-between h-full">
              <p class="text-redOnline font-bold text-sm" id="departureTime"><?php $getAllTrajects[$i]['hourStart'] ?></p>
              <p class="text-redOnline font-bold text-sm" id="arrivalTime">7H30</p>
            </div>
            <div class="flex flex-col relative justify-between h-full">
              <span class="circleSearchResult"></span>
              <span class="circleSearchResult"></span>
              <span class="blackBar absolute"></span>
            </div>
            <div class="h-full flex flex-col justify-between items-start">
              <p class="colorFakeBlack font-bold font-epilogue text-sm"><?php $getAllTrajects[$i]['starting_point'] ?></p>
              <p class="colorFakeBlack font-bold font-epilogue text-sm"><?php if ($getAllTrajects[0]['end_point'] == "46.6709261,5.5631747") {
                                                                          echo "13b Avenue du Stade Municipal, 39000 Lons-le-Saunier";
                                                                        } else {
                                                                          echo "2 Rte de Montaigu, 39000 Lons-le-Saunier";
                                                                        } ?></p>
            </div>
          </div>
          <div class="secondRow flex gap-3 justify-start items-center">
            <div class="first-col">
              <img src="../assets/img/humanLogo.png" alt="img du conducteur" class="img-cardSearch">
            </div>
            <div class="second-col">
              <p class="epilogue text-sm font-bold"><?= $transfert[$i]['username_user'] ?></p>
              <p class="epilogue font-light text-xs italic"><?= $transfert[$i]['bio_user'] ?></p>
            </div>
          </div>
          <input type="submit" value="" name="action" class="absolute top-0 left-0 w-full h-full rounded-lg text-transparent" value="goToDetails">
        </div>
        <input type="hidden" name="idToTransfer" value="1">
      </form>
    <?php }
  } else { ?><p class="font-epilogue font-bold text-lg">Pas de trajets prévus ce jour là</p><?php } ?>
</main>

<?php include('footer.php') ?>