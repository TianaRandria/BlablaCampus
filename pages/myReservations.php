<?php include('header.php'); ?>
<main class="flex flex-col w-5/6 gap-5">
  <h2 class="font-bungee text-lg">Mes réservations</h2>


  <!-- Template pour les cartes des réservations d'un utilisateur, globalement le même système que " mes trajets" à savoir pour remplacer avec du php: 
    - l'id de la div principal ( sous la forme d'une concaténation entre le mot "traject" et l'id du trajet , important pour cause d'utilisation dans le css) 
    - date ( jour et mois)
    - départ et arrivée
    - value dans les input caché dans les form de la modal avec l'id du trajet
-->

  <div class="flex w-full justify-between items-center rounded-lg bg-xtraLightGrey p-3 h-24 relative cardReservation" id="reservation1">
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
    <div class="modalReservations h-full w-full absolute flex top-0 left-0 rounded-lg hidden modal1">
      <form action="reservationCancel.php" class="w-full h-full bg-redOnline rounded-lg flex justify-center items-center" method="post">
        <input type="hidden" name="idToTransfer" value="1">
        <input type="submit" value="Annuler" name="action" class="font-bungee text-white text-xl">
      </form>
    </div>
  </div>

</main>
<?php include('footer.php'); ?>