<?php include("header.php")?>
<main class="w-5/6">
    <h2 class="font-bungee">Proposer un trajet</h2>
    <form action="" method="post" class="w-full flex flex-col items-start justify-start gap-3">
        <label for="createItineraryDepart" class="colorGrey font-epilogue font-medium text-sm">D'où partez vous?</label>
        <div class="flex w-full gap-2 p-2 BGColorLightGrey rounded-lg">
            <img src="../assets/img/pinPoint.png" alt="Logo pour le départ">
            <input type="text" name="createItineraryDepart" id="createItineraryDepart" placeholder="Départ" required class="bg-transparent placeholder:text-black w-full">
        </div>
        <label for="departureTime" class="colorGrey font-epilogue font-medium text-sm">A quelle heure partez-vous ?</label>
        <div class="flex w-full justify-start items-center BGColorLightGrey rounded-lg p-2 gap-2">
            <img src="../assets/img/clock.png" alt="Logo Horloge">
            <input type="time" name="departureTime" id="departureTime" required class="BGColorLightGrey w-full">
        </div>
        <label for="itineraryFinalCreate" class="colorGrey font-epilogue font-medium text-sm">Pour aller où?</label>
        <div class="flex w-full justify-start items-center gap-2">
            <img src="../assets/img/pinPoint.png" alt="Localisation du point d'arrivée">
            <select name="itineraryFinalCreate" id="itineraryFinalCreate" class="box-border w-full" required>
                <option value="">Arrivée</option>
                <option value="2 Rte de Montaigu, 39000 Lons-le-Saunier">2 Rte de Montaigu, 39000 Lons-le-Saunier</option>
                <option value="13b Avenue du Stade Municipal, 39000 Lons-le-Saunier">13b Avenue du Stade Municipal, 39000 Lons-le-Saunier</option>
            </select>
        </div>
        <label for="dateDepart" class="colorGrey font-epilogue font-medium text-sm">Quand partez-vous ?</label>
        <div class="w-full h-14 BGColorLightGrey" id="blocDateSearch">
            <div id="firstRow" class="w-full h-full flex justify-start items-center">
                <div class="w-1/5 flex justify-center items-center">
                    <img src="../assets/img/calendar.png" alt="logo de calendrier">
                </div>
                <p class="w-4/5">Aujourd'hui</p>
            </div>
            <input type="date" name="dateDepart" id="dateSearch" class="BGColorLightGrey w-full h-14 hidden">
        </div>
        <p class="colorGrey font-epilogue font-medium text-sm">Type de trajet :</p>
        <div class="flex flex-row-reverse w-full justify-end items-center gap-2" id="typeOfTraject">
            <label for="backForth">Allez / Retour</label>
            <input type="checkbox" name="backForth" id="backForth">
            <label for="forthOnly">Allez simple</label>
            <input type="checkbox" name="forthOnly" id="forthOnly">
        </div>
        <label for="placesNumber" class="colorGrey font-epilogue font-medium text-sm">Nombre de places disponibles</label>
        <div class="flex justify-start items-center gap-2">
            <img src="../assets/img/group.png" alt="logo de groupes pour les places disponibles">
            <select name="placesNumber" id="placesNumber" class="w-full">
                <option value="">Places Disponibles</option>
                <?php
                for ($i=1; $i < 10; $i++) {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
                ?>
            </select>
        </div>
        <label for="" class="colorGrey font-epilogue font-medium text-sm">Étapes éventuelles</label>
        <div class="flex w-full" id="allStepCreateItinerary">
            <div class="flex w-full" id="rowStep1">
                <div id="step" class="flex w-5/6 justify-start items-center gap-2">
                    <img src="../assets/img/pinPoint.png" alt="point pour les étapes">
                    <input type="text" name="step1Adding" id="step1New" placeholder="Etape">
                </div>
                <div id="addStep" class="w-1/6 flex justify-center items-center">
                    <img src="../assets/img/plus.png" alt="Ajout d'une étape" id="step1Adding">
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center w-full">
            <input type="submit" value="Proposer un trajet">
        </div>
    </form>
</main>
<?php include("footer.php")?>