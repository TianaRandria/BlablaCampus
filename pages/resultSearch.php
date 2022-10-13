<?php include('header.php');
include('../assets/class/Trajet.php');

?>

<main class="flex flex-col justify-start items-center w-screen min-h-screen gap-4 w-4/5">
  <h4 class="w-5/6font-bungee">Trajets Disponibles</h4>
  <?php
  $allItineraryObject = new Trajet();
  $allItinerary = $allItineraryObject->getAllTrajects();
  for ($i = 0; $i < count($allItinerary); $i++) {
  ?>
    <form action="reservation.php" class="w-full" id="result <?php echo $allItinerary[$i]['id_traject'] ?>">
      <div class="card w-full bg-xtraLightGrey rounded-lg flex flex-col p-3 gap-3.5 relative w-4/5">
        <p class="text-xs font-workSans text-end w-full">places disponibles : <span class="text-redOnline font-bold"><?php echo $allItinerary[$i]['placerest_traject'] ?></span></p>
        <div class="firstRow w-full flex h-16 gap-2">
          <div class="flex flex-col justify-between h-full">
            <p class="text-redOnline font-bold text-sm" id="departureTime"><?php echo $allItinerary[$i]['hour_traject'] ?></p>
            <p class="text-redOnline font-bold text-sm" id="arrivalTime">7H30</p>
          </div>
          <div class="flex flex-col relative justify-between h-full">
            <span class="circleSearchResult"></span>
            <span class="circleSearchResult"></span>
            <span class="blackBar absolute"></span>
          </div>
          <div class="h-full flex flex-col justify-between items-start">
            <p class="colorFakeBlack font-bold font-epilogue text-sm"><?php echo $allItinerary[$i]['start_traject'] ?></p>
            <p class="colorFakeBlack font-bold font-epilogue text-sm"><?php echo $allItinerary[$i]['end_traject'] ?></p>
          </div>
        </div>
        <div class="secondRow flex gap-3 justify-start items-center">
          <div class="first-col">
            <img src="../assets/uploadImg/<?php echo $allItinerary[$i]['img_user'] ?>.png" alt="img du conducteur" class="img-cardSearch">
          </div>
          <div class="second-col">
            <p class="epilogue text-sm font-bold"><?php echo $allItinerary[$i]['nickname_user'] ?></p>
            <p class="epilogue font-light text-xs italic"><?php echo $allItinerary[$i]['bio_user'] ?></p>
          </div>
        </div>
        <input type="submit" name="id_traject" class="absolute top-0 left-0 w-full h-full rounded-lg text-transparent" value="<?php echo $allItinerary[$i]['id_traject'] ?>">
      </div>
    </form>
  <?php } ?>
</main>

<?php include('footer.php') ?>