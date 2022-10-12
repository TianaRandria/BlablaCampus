<?php include("header.php");
include('../assets/class/Trajet.php')
?>
<main class="flex flex-col justify-start items-start w-5/6 gap-3 mainMyItinerary">
  <h2 class="font-bungee text-lg">Mes trajets</h2>

  <!-- Template à utiliser pour la généréation des trajets récupéré
    chose à remplacer :
    - l'id de la div principal ( sous la forme d'une concaténation entre le mot "traject" et l'id du trajet , important pour cause d'utilisation dans le css) 
    - date ( jour et mois)
    - départ et arrivée
    - value dans les input caché dans les form de la modal avec l'id du trajet
    ( ! ) Notice: Undefined index: id_traject in C:\wamp64\www\DefiPHP\BlablaCampus\pages\myItinerary.php on line 32 Call Stack #TimeMemoryFunctionLocation 10.0006364088{main}( )...\myItinerary.php:0 " class="w-1/2 h-full bg-redOnline rounded-l-lg flex justify-center items-center" method="post"> 

-->
  <?php
  $myItineraryObject = new Trajet();
  $myItinerary = $myItineraryObject->getMyTrajects();
  for ($i = 0; $i < count($myItinerary); $i++) {
  ?>
    <div class="flex w-full justify-between items-center rounded-lg bg-xtraLightGrey p-3 h-24 relative cardTraject" id="<?php echo $myItinerary[$i]['id_traject'] ?>">
      <div class="flex w-3/5 justify-between items-center h-full">
        <div class="flex flex-col">
          <p class="jourDate font-bungee text-redOnline text-4xl">05</p>
          <p class="moisDate font-bungee text-xl">SEP</p>
        </div>
        <div class="h-full flex flex-col items-start justify-center">
          <p class="startingPoint text-lightGrey font-medium text-sm font-epilogue"><?php echo $myItinerary[$i]['start_traject'] ?></p>
          <p class="endingPoint text-lightGrey font-medium text-sm font-epilogue"><?php echo $myItinerary[$i]['end_traject'] ?></p>
        </div>
      </div>
      <img src="../assets//img/upDown.png" alt="doubles inversés haut et bas" class="fleche">
      <div class="modalTraject h-full w-full absolute flex top-0 left-0 rounded-lg hidden modal1">
        <form action="modifyItinerary.php?id_traject=<?php echo $myItinerary[$i]['id_traject'] ?>" class="w-1/2 h-full bg-redOnline rounded-l-lg flex justify-center items-center" method="post">
          <input type="hidden" name="idToTransfer" value="1">
          <input type="submit" value="editer" name="action" class="font-bungee text-white text-xl">
        </form>
        <form action="deleteItinerary.php?id_traject=<?php echo $myItinerary[$i]['id_traject'] ?>" class="w-1/2 h-full bg-black rounded-r-lg flex justify-center items-center" method="post">
          <input type="hidden" name="idToTransfer" value="1">
          <input type="submit" value="supprimer" name="action" class="font-bungee text-white text-xl">
        </form>
      </div>
    </div>

  <?php
  }
  ?>


  <!-- <div class="flex w-full justify-between items-center rounded-lg bg-xtraLightGrey p-3 h-24 relative cardTraject" id="traject1">
        <div class="flex w-3/5 justify-between items-center h-full">
            <div class="flex flex-col">
                <p class="jourDate font-bungee text-redOnline text-4xl">05</p>
                <p class="moisDate font-bungee text-xl">SEP</p>
            </div>
            <div class="h-full flex flex-col items-start justify-center">
                <p class="startingPoint text-lightGrey font-medium text-sm font-epilogue">Dole</p>
                <p class="endingPoint text-lightGrey font-medium text-sm font-epilogue">Lons le Saunier</p>
            </div>
        </div>
        <img src="../assets//img/upDown.png" alt="doubles inversés haut et bas" class="fleche">
        <div class="modalTraject h-full w-full absolute flex top-0 left-0 rounded-lg hidden modal1">
            <form action="modifyItinerary.php" class="w-1/2 h-full bg-redOnline rounded-l-lg flex justify-center items-center" method="post">
                <input type="hidden" name="idToTransfer" value="1">
                <input type="submit" value="editer" name="action" class="font-bungee text-white text-xl">
            </form>
            <form action="deleteItinerary.php" class="w-1/2 h-full bg-black rounded-r-lg flex justify-center items-center" method="post">
                <input type="hidden" name="idToTransfer" value="1">
                <input type="submit" value="supprimer" name="action" class="font-bungee text-white text-xl">
            </form>
        </div>
        </div> -->
</main>
<?php include("footer.php") ?>