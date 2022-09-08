<?php include('header.php')?>
<div class="w-4/5 p-2 flex">
    <h2 class="bungee">Rechercher un trajet</h2>
</div>
<form action="" method="post" id="searchItinerary" class="w-4/5">
    <div class="BGColorLightGrey w-full flex roundBorder">
        <div class="p-3">
            <img src="../assets/img/pinPoint.png" alt="Cible d'un lieu">
        </div>
        <input type="text" name="startingPointSearch" id="startingPointSearch" placeholder="Départ" class="BGColorLightGrey w-4/5 epilogue font-medium text-base">
    </div>
    <div class="BGColorLightGrey w-full flex roundBorder">
        <div class="p-3">
            <img src="../assets/img/pinPoint.png" alt="Cible d'un lieu">
        </div>
        <select name="arrivalPointSearch" id="arrivalPointSearch" class="w-4/5 borderNone">
            <option value="13b Avenue du Stade Municipal, 39000 Lons-le-Saunier">13b Avenue du Stade Municipal, 39000 Lons-le-Saunier</option>
            <option value="2 Route de Montaigu, 39000 Lons-le-Saunier">2 Rte de Montaigu, 39000 Lons-le-Saunier</option>
        </select>
    </div>
</form>
<?php include('footer.php')?>