<?php include('header.php');
if (!isset($_SESSION['name_user'])) {
    header("Location:./register.php");
}
?>
<div class="w-4/5 p-2 flex">
    <h2 class="bungee">Rechercher un trajet</h2>
</div>
<form action="resultSearch.php" method="post" id="searchItinerary" class="w-5/6 flex flex-col gap-3 justify-center items-center">
    <div class="BGColorLightGrey w-full flex roundBorder h-14">
        <div class="p-3 w-1/5 flex justify-center items-center">
            <img src="../assets/img/pinPoint.png" alt="Cible d'un lieu">
        </div>
        <input type="text" name="startingPointSearch" id="startingPointSearch" placeholder="Départ" class="BGColorLightGrey w-4/5 epilogue font-medium text-base">
    </div>
    <div class="BGColorLightGrey w-full flex roundBorder h-14">
        <div class="p-3 w-1/5 flex justify-center items-center">
            <img src="../assets/img/pinPoint.png" alt="Cible d'un lieu">
        </div>
        <select name="arrivalPointSearch" id="arrivalPointSearch" class="w-4/5 BGColorLightGrey">
            <option value="13b Avenue du Stade Municipal, 39000 Lons-le-Saunier">13b Avenue du Stade Municipal, 39000 Lons-le-Saunier</option>
            <option value="2 Route de Montaigu, 39000 Lons-le-Saunier">2 Rte de Montaigu, 39000 Lons-le-Saunier</option>
        </select>
    </div>
    <div class="w-full h-14 BGColorLightGrey" id="blocDateSearch">
        <div id="firstRow" class="w-full h-full flex justify-start items-center">
            <div class="w-1/5 flex justify-center items-center">
                <img src="../assets/img/calendar.png" alt="logo de calendrier">
            </div>
            <p class="w-4/5">Aujourd'hui</p>
        </div>

        <input type="date" name="dateSearch" id="dateSearch" class="BGColorLightGrey w-full h-14 dsn">
    </div>
    <input type="submit" value="RECHERCHER" class="ls5 workSans p-3 w-4/5 BGColorRedOnline roundBorder text-white">
</form>
<?php include('footer.php') ?>