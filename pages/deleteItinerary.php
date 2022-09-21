<?php include('header.php') ?>
<main class="flex flex-col w-5/6 justify-start items-start py-2 gap-10">
    <h2 class="font-bungee">Supprimer</h2>
    <p class="font-epilogue text-lightGrey text-sm font-medium">Etes vous sur de vouloir supprimer ce trajet?</p>
    <form action="confirmation.php" class="w-full flex flex-col items-center p-4" method="post">
        <input type="hidden" name="idToDelete" value="<?php echo($_POST['idToTransfer']) ?>">
        <input type="submit" name="confirmation" value="Supprimer" class="w-full bg-redOnline rounded-lg text-white font-workSans tracking-5px text-sm p-4 uppercase font-normal">
        <a href="myItinerary.php" class="w-full rounded-lg text-redOnline font-workSans tracking-5px text-sm p-4 uppercase font-normal text-center">Retour</a>
    </form>
</main>
<?php include('footer.php') ?>