<?php include('header.php');
include('../assets/class/Trajet.php');
?>
<main class="flex flex-col w-5/6">
  <h2 class="font-bungee">Messagerie</h2>

  <!-- à changer lors de la génération ( il s'agit d'un template ) : chemin de l'image , nom du demandeur, si il s'agit d'une demande ou d'une validation de réservation de trajet , le départ , l'arrivée et la date -->
  <?php
  $myMessageObject = new Trajet();
  $myMessage = $myMessageObject->getMyMessage();
  for ($i = 0; $i < count($myMessage); $i++) {
  ?>
    <div class="flex justify-start items-center relative w-full h-10vh p-5" id="<?php echo $myMessage[$i]['id_message'] ?>">
      <div class="flex justify-start items-start w-1/6 h-full">
        <img src="../assets/uploadImg/<?php echo $myMessage[$i]['img_user'] ?>.png" alt="img du conducteur" class="img-cardSearch">
      </div>
      <div class="flex flex-col w-5/6 font-epilogue text-lightGrey text-xs justify-around h-full">
        <p><?php echo $myMessage[$i]['nickname_user'] ?></p>
        <p><span class="text-redOnline font-bold italic">Demande</span> de réservation pour le trajet</p>
        <p class="italic"><?php echo $myMessage[$i]['start_traject'] ?> - <?php echo $myMessage[$i]['end_traject'] ?> du <?php echo $myMessage[$i]['date_traject'] ?></p>
      </div>

      <!-- ne générer que cette partie en cas de Delande de validation , en remplissant la value de l'input caché par l'id de la réservation  -->

      <form action="validation.php" class="flex w-full h-full absolute top-0 left-0 opacity-0" method="get">
        <input type="submit" name="id_message" value="<?php echo $myMessage[$i]['id_message'] ?>" class="w-full">
      </form>
    </div>
  <?php } ?>
</main>
<?php include('footer.php'); ?>