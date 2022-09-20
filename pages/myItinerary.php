<?php include("header.php")?>
<main class="flex flex-col justify-start items-start w-5/6 gap-3">
    <h2 class="font-bungee text-lg">Mes trajets</h2>

    <!-- Template à utiliser pour la généréation des trajets récupéré 
    chose à remplacer :
    - l'id de la div principal ( sous la forme d'une concaténation entre le mot "traject" et l'id du trajet , important pour cause d'utilisation dans le css) 
    - date ( jour et mois)
    - départ et arrivée
    - value dans les input caché dans les form de la modal avec l'id du trajet
-->

    <div class="flex w-full justify-between items-center rounded-lg BGColorLightGrey p-3 h-24 relative cardTraject hidden" id="traject1">
        <div class="flex w-3/5 justify-between items-center h-full">
            <div class="flex flex-col">
                <p class="jourDate font-bungee colorRedOnline text-4xl">05</p>
                <p class="moisDate font-bungee text-xl">SEP</p>
            </div>
            <div class="h-full flex flex-col items-start justify-center">
                <p class="startingPoint colorGrey font-medium text-sm font-epilogue">Dole</p>
                <p class="endingPoint colorGrey font-medium text-sm font-epilogue">Lons le Saunier</p>
            </div>
        </div>
        <img src="../assets//img/upDown.png" alt="doubles inversés haut et bas" class="fleche">
        <div class="modal h-full w-full absolute flex top-0 left-0 rounded-lg">
            <form action="" class="w-1/2 h-full BGColorRedOnline rounded-l-lg flex justify-center items-center" method="get">
                <input type="hidden" name="idToTransfer" value="1">
                <input type="submit" value="editer" name="action" class="font-bungee text-white text-xl">
            </form>
            <form action="" class="w-1/2 h-full bg-black rounded-r-lg flex justify-center items-center" method="get">
                <input type="hidden" name="idToTransfer" value="1">
                <input type="submit" value="supprimer" name="action" class="font-bungee text-white text-xl">
            </form>
        </div>
    </div>


    <div class="flex w-full justify-between items-center rounded-lg BGColorLightGrey p-3 h-24 relative cardTraject hidden" id="traject2">
        <div class="flex w-3/5 justify-between items-center h-full">
            <div class="flex flex-col">
                <p class="jourDate font-bungee colorRedOnline text-4xl">05</p>
                <p class="moisDate font-bungee text-xl">SEP</p>
            </div>
            <div class="h-full flex flex-col items-start justify-center">
                <p class="startingPoint colorGrey font-medium text-sm font-epilogue">Dole</p>
                <p class="endingPoint colorGrey font-medium text-sm font-epilogue">Lons le Saunier</p>
            </div>
        </div>
        <img src="../assets//img/upDown.png" alt="doubles inversés haut et bas" class="fleche">
        <div class="modal h-full w-full absolute flex top-0 left-0 rounded-lg">
            <form action="" class="w-1/2 h-full BGColorRedOnline rounded-l-lg flex justify-center items-center" method="get">
                <input type="hidden" name="idToTransfer" value="2">
                <input type="submit" value="editer" name="action" class="font-bungee text-white text-xl">
            </form>
            <form action="" class="w-1/2 h-full bg-black rounded-r-lg flex justify-center items-center" method="get">
                <input type="hidden" name="idToTransfer" value="2">
                <input type="submit" value="supprimer" name="action" class="font-bungee text-white text-xl">
            </form>
        </div>
    </div>
    
    <div class="flex w-full justify-between items-center rounded-lg BGColorLightGrey p-3 h-24 relative cardTraject hidden" id="traject3">
        <div class="flex w-3/5 justify-between items-center h-full">
            <div class="flex flex-col">
                <p class="jourDate font-bungee colorRedOnline text-4xl">05</p>
                <p class="moisDate font-bungee text-xl">SEP</p>
            </div>
            <div class="h-full flex flex-col items-start justify-center">
                <p class="startingPoint colorGrey font-medium text-sm font-epilogue">Dole</p>
                <p class="endingPoint colorGrey font-medium text-sm font-epilogue">Lons le Saunier</p>
            </div>
        </div>
        <img src="../assets//img/upDown.png" alt="doubles inversés haut et bas" class="fleche">
        <div class="modal h-full w-full absolute flex top-0 left-0 rounded-lg">
            <form action="" class="w-1/2 h-full BGColorRedOnline rounded-l-lg flex justify-center items-center" method="get">
                <input type="hidden" name="idToTransfer" value="3">
                <input type="submit" value="editer" name="action" class="font-bungee text-white text-xl">
            </form>
            <form action="" class="w-1/2 h-full bg-black rounded-r-lg flex justify-center items-center" method="get">
                <input type="hidden" name="idToTransfer" value="3">
                <input type="submit" value="supprimer" name="action" class="font-bungee text-white text-xl">
            </form>
        </div>
    </div>
</main>
<?php include("footer.php")?>