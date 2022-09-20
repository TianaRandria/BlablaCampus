<?php include("header.php")?>
<main class="w-5/6 py-2">
    <h2 class="font-bungee">Proposer un trajet</h2>
    <form action="searchItinerary.php" method="post" class="w-full flex flex-col items-start justify-start gap-3">
        <label for="createItineraryDepart" class="colorGrey font-epilogue font-medium text-xs">D'où partez vous?</label>
        <div class="flex w-full gap-2 p-2 BGColorLightGrey rounded-lg">
            <img src="../assets/img/pinPoint.png" alt="Logo pour le départ">
            <input type="text" name="createItineraryDepart" id="createItineraryDepart" placeholder="Départ" required class="bg-transparent placeholder:text-black w-full">
        </div>
        <label for="departureTime" class="colorGrey font-epilogue font-medium text-xs">A quelle heure partez-vous ?</label>
        <div class="flex w-full justify-start items-center BGColorLightGrey rounded-lg p-2 gap-2">
            <img src="../assets/img/clock.png" alt="Logo Horloge">
            <input type="time" name="departureTime" id="departureTime" required class="BGColorLightGrey w-full">
        </div>
        <label for="itineraryFinalCreate" class="colorGrey font-epilogue font-medium text-xs">Pour aller où?</label>
        <div class="flex w-full justify-start items-center gap-2 BGColorLightGrey p-2">
            <img src="../assets/img/pinPoint.png" alt="Localisation du point d'arrivée">
            <select name="itineraryFinalCreate" id="itineraryFinalCreate" class="box-border w-full bg-transparent" required>
                <option value="">Arrivée</option>
                <option value="2 Rte de Montaigu, 39000 Lons-le-Saunier">2 Rte de Montaigu, 39000 Lons-le-Saunier</option>
                <option value="13b Avenue du Stade Municipal, 39000 Lons-le-Saunier">13b Avenue du Stade Municipal, 39000 Lons-le-Saunier</option>
            </select>
        </div>
        <label for="dateDepart" class="colorGrey font-epilogue font-medium text-xs">Quand partez-vous ?</label>
        <div class="w-full BGColorLightGrey rounded-lg p-2" id="blocDateSearch">
            <div id="firstRow" class="w-full h-full flex justify-start items-center gap-2">
                <div class="flex justify-center items-center">
                    <img src="../assets/img/calendar.png" alt="logo de calendrier">
                </div>
                <p>Aujourd'hui</p>
            </div>
            <input type="date" name="dateDepart" id="dateSearch" class="BGColorLightGrey w-full h-14 hidden rounded-lg">
        </div>
        <p class="colorGrey font-epilogue font-medium text-xs">Type de trajet :</p>
        <fieldset class="flex flex-row-reverse w-full justify-end items-center gap-6" id="typeOfTraject">
            <div class="flex flex-row-reverse justify-start items-center gap-2">
                <label for="backForth" class="font-epilogue text-sm">Allez / retour</label>
                <input type="checkbox" name="typeTrajetTest" id="backForth" value="1">
            </div>
            <div class="flex flex-row-reverse justify-start items-center gap-2">
                <label for="forthOnly" class="font-epilogue text-sm">Allez simple</label>
                <input type="checkbox" name="typeTrajetTest" id="forthOnly" value="0">
            </div>
        </fieldset>
        <label for="placesNumber" class="colorGrey font-epilogue font-medium text-xs">Nombre de places disponibles</label>
        <div class="flex justify-start items-center gap-2 w-full BGColorLightGrey p-2">
            <img src="../assets/img/group.png" alt="logo de groupes pour les places disponibles">
            <input type="number" name="placesNumber" id="placesNumber" min="2" placeholder="Places disponibles" class="bg-transparent w-full">
        </div>
        <label for="" class="colorGrey font-epilogue font-medium text-xs">Étapes éventuelles</label>
        <div class="flex w-full flex-col gap-2" id="allStepCreateItinerary">
            <div class="flex w-full" id="rowStep1">
                <div id="step1" class="flex w-5/6 justify-start items-center gap-2 BGColorLightGrey p-2 rounded-lg">
                    <img src="../assets/img/pinPoint.png" alt="point pour les étapes">
                    <input type="text" name="step1Adding" id="step1New" placeholder="Etape" class="bg-transparent">
                </div>
                <div id="addStep" class="w-1/6 flex justify-center items-center">
                    <img src="../assets/img/plus.png" alt="Ajout d'une étape" id="step1Adding">
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center w-full p-3">
            <input type="submit" name="action" value="Proposer un trajet" class="w-full font-workSans tracking-5px uppercase text-sm BGColorRedOnline text-white p-5 rounded-lg">
        </div>
    </form>
</main>
<?php include("footer.php")?>