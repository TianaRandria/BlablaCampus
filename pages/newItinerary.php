<?php include("header.php")?>
<main class="w-5/6">
    <h2 class="bungee">Proposer un trajet</h2>
    <form action="" method="post" class="w-full">
        <label for="createItineraryDepart">D'où partez vous?</label>
        <div class="flex">
            <img src="../assets/img/pinPoint.png" alt="Logo pour le départ">
            <input type="text" name="createItineraryDepart" id="createItineraryDepart" placeholder="Départ" required>
        </div>
        <label for="departureTime"></label>
        <div class="flex">
            <img src="../assets/img/clock.png" alt="Logo Horloge">
            <input type="time" name="departureTime" id="departureTime" required>
        </div>
        <label for="itineraryFinalCreate">Pour aller où?</label>
        <div class="flex w-full">
            <img src="../assets/img/pinPoint.png" alt="Localisation du point d'arrivée">
            <select name="itineraryFinalCreate" id="itineraryFinalCreate" class="box-border w-full" required>
                <option value="">Arrivée</option>
                <option value="2 Rte de Montaigu, 39000 Lons-le-Saunier">2 Rte de Montaigu, 39000 Lons-le-Saunier</option>
                <option value="13b Avenue du Stade Municipal, 39000 Lons-le-Saunier">13b Avenue du Stade Municipal, 39000 Lons-le-Saunier</option>
            </select>
        </div>
        <label for="dateSearch">Quand partez-vous ?</label>
        <div class="w-full h-14 BGColorLightGrey" id="blocDateSearch">
            <div id="firstRow" class="w-full h-full flex justify-start items-center">
                <div class="w-1/5 flex justify-center items-center">
                    <img src="../assets/img/calendar.png" alt="logo de calendrier">
                </div>
                <p class="w-4/5">Aujourd'hui</p>
            </div>
            <input type="date" name="dateSearch" id="dateSearch" class="BGColorLightGrey w-full h-14 dsn">
        </div>
    </form>
</main>
<?php include("footer.php")?>