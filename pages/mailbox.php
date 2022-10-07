<?php include('header.php'); ?>
<main class="flex flex-col w-5/6">
  <h2 class="font-bungee">Messagerie</h2>

  <!-- à changer lors de la génération ( il s'agit d'un template ) : chemin de l'image , nom du demandeur, si il s'agit d'une demande ou d'une validation de réservation de trajet , le départ , l'arrivée et la date -->

  <div class="flex justify-start items-center relative w-full h-10vh">
    <div class="flex justify-start items-start w-1/6 h-full">
      <img src="../assets/img/humanLogo.png" alt="img du conducteur" class="img-cardSearch">
    </div>
    <div class="flex flex-col w-5/6 font-epilogue text-lightGrey text-xs justify-around h-full">
      <p>Alain</p>
      <p><span class="text-redOnline font-bold italic">Demande</span> de réservation pour le trajet</p>
      <p class="italic">Dole Lons-le-Saunier du 05 Septembre 2022</p>
    </div>

    <!-- ne générer que cette partie en cas de Delande de validation , en remplissant la value de l'input caché par l'id de la réservation  -->

    <form action="validation.php" class="flex w-full h-full absolute top-0 left-0 opacity-0" method="get">
      <input type="hidden" name="idToTransfert" value="1">
      <input type="submit" name="action" value="validation réservation" class="w-full">
    </form>
  </div>
</main>
<?php include('footer.php'); ?>