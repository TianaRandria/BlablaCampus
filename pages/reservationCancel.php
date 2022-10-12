<?php include('header.php');
include('../assets/class/Trajet.php');
$idReservationObjectCancel = new Trajet();
$idItineraryCancel = $idReservationObjectCancel->getCancelReservId();
?>
<!-- récupérer l'id de l'input caché de la page précédente pour le mettre dans l'input caché ici , afin de savoir quel réservation annulé -->
<main class="flex flex-col w-5/6 justify-start items-start py-2 gap-10">
  <h2 class="font-bungee">Annulation</h2>
  <p class="font-epilogue text-lightGrey text-xs font-medium">Etes vous sur de vouloir annuler cette réservation?</p>
  <form action="../assets/php/conditions.php?id_reservation=<?php echo $idItineraryCancel['id_reservation'] ?>" class="w-full flex flex-col items-center p-2" method="post">
    <input type="submit" name="confirmation" value="Annuler ma réservation" class="w-full bg-redOnline rounded-lg text-white font-workSans tracking-5px text-xs p-4 uppercase font-normal">
    <a href="myReservations.php" class="w-full rounded-lg text-redOnline font-workSans tracking-5px text-sm p-4 uppercase font-normal text-center">Retour</a>
  </form>
</main>
<?php include('footer.php') ?>