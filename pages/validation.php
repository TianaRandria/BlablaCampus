<?php include('header.php');
include('../assets/class/Trajet.php');
$myMessageObject = new Trajet();
$myMessage = $myMessageObject->getAcceptMessage();
?>

<main class="flex flex-col w-5/6 justify-start items-start py-2 gap-10">
  <h2 class="font-bungee">VALIDATION DE LA RESERVATION</h2>

  <!-- à changer lors de la génération ( il s'agit d'un template ) : chemin de l'image , nom du demandeur, si il s'agit d'une demande ou d'une validation de réservation de trajet , le départ , l'arrivée et la date -->

  <div class="relative w-full h-10vh">
    <div class="flex justify-start items-center relative w-full h-10vh">
      <div class="flex justify-start items-start w-1/6 h-full">
        <img src="../assets/uploadImg/<?php echo $myMessage['img_user'] ?>.png" alt="img du conducteur" class="img-cardSearch">
      </div>
      <div class="flex flex-col w-5/6 font-epilogue text-lightGrey text-xs justify-around h-full">
        <p><?php echo $myMessage['nickname_user'] ?></p>
        <p><span class="text-redOnline font-bold italic">Demande</span> de réservation pour le trajet</p>
        <p class="italic"><?php echo $myMessage['start_traject'] ?> - <?php echo $myMessage['end_traject'] ?> du <?php echo $myMessage['date_traject'] ?></p>
      </div>
    </div>
    <div class="pt-5 flex flex-col justify-start items-center">
      <div class="p-5">
        <p class="font-epilogue text-lightGrey font-medium p-2">Bonjour <span class="text-redOnline font-bold"><?php echo $myMessage['nickname_user'] ?></span></p>
        <p class="font-epilogue text-lightGrey font-medium p-2">Je souhaiterai réserver une place dans ta voiture pour le trajet <span class="text-redOnline font-bold"><?php echo $myMessage['start_traject'] ?> - <?php echo $myMessage['end_traject'] ?></span></p>
        <p class="font-epilogue text-lightGrey font-medium p-2">En te remerciant.</p>
      </div>
      <!-- modifier la valeur des inputs caché avec l'id de l'utilisateur qui envoit le message ( celui qui réserve donc ) et l'id du trajet  -->
      <form action="../assets/php/conditions.php?id_traject=<?php echo $myMessage['id_traject'] ?>" method="post" class="flex justify-center items-center">
        <input type="submit" name="action" value="Valider la réservation" class="font-workSans text-sm p-5 tracking-5px bg-redOnline text-white rounded-lg uppercase">
      </form>
    </div>
  </div>
</main>
<?php include('footer.php'); ?>