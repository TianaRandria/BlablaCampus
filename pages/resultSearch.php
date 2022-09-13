<?php include('header.php')?>
<h4 class="w-5/6 bungee">Trajets Disponibles</h4>

<!--         structure à utiliser dans le echo de ta fonction de recherche pour écrire les résultats , les seuls trucs à changer dedans seront les contenu des P              -->


<div class="flex w-5/6 justify-between items-center roundBorder BGColorLightGrey p-3 h-24">
    <div class="flex w-3/5 justify-between items-center h-full">
        <div class="flex flex-col">
            <p class="jourDate bungee colorRedOnline text-4xl">05</p>
            <p class="moisDate bungee text-xl">SEP</p>
        </div>
        <div class="h-full flex flex-col items-start justify-center">
            <p class="startingPoint colorGrey font-medium text-sm">Dole</p>
            <p class="endingPoint colorGrey font-medium text-sm">Lons le Saunier</p>
        </div>
    </div>
    <img src="../assets//img/upDown.png" alt="doubles inversés haut et bas" class="fleche">
</div>
<?php include('footer.php')?>