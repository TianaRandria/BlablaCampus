<!-- de manière général ça seras surtout des appels sur une variable au début probablement afin de se servir de celle ci pour  pouvoir réécrire les données nécessaires -->
<?php include('header.php'); ?>
<main class="w-5/6 flex flex-col gap-10">

  <!-- récupérer les données du trajets cliqué ( probablement un select , je ferais passé l'id discrétement), pour modfifier les infos du jour , du mois , du départ et de l'arrivé ainsi que  le nom du conducteur-->
  <h2 class="font-bungee text-lg">Réserver une place</h2>
  <div class="flex w-full justify-between items-center rounded-lg bg-xtraLightGrey p-3 h-24">
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
  </div>

  <div class="flex flex-col justify-start items-start gap-10 font-epilogue">
    <p class="font-epilogue text-lightGrey font-medium">Bonjour <span class="text-redOnline font-bold">Pauline</span></p>
    <p class="font-epilogue text-lightGrey font-medium">Je souhaiterai réserver une place dans ta voiture pour le trajet <span class="text-redOnline font-bold">Dole - Lons le Saunier</span></p>
    <p class="font-epilogue text-lightGrey font-medium">En te remerciant.</p>
  </div>
  <!-- modifier la valeur des inputs caché avec l'id de l'utilisateur qui envoit le message ( celui qui réserve donc ) et l'id du trajet  -->
  <form action="confirmation.php" method="post" class="flex justify-center items-center">
    <input type="hidden" name="idUserForLinkMessage" value="">
    <input type="hidden" name="idItineraryForMessage" value="">
    <input type="submit" value="Envoyer ma demande" class="font-workSans text-sm p-5 tracking-5px bg-redOnline text-white rounded-lg uppercase">
  </form>
</main>
<?php include('footer.php'); ?>