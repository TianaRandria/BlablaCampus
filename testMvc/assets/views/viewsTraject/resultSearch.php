<?php
ob_start();
session_start();
?>

<main class="flex flex-col justify-start items-center w-5/6 min-h-screen gap-y-3">
    <h4 class="w-5/6font-bungee">Trajets Disponibles</h4>

    <!--         structure à utiliser dans le echo de ta fonction de recherche pour écrire les résultats , les seuls trucs à changer dedans seront les contenu des P ansi que la value de l'input hidden         -->
        <div class="flex w-full justify-between items-center rounded-lg bg-xtraLightGrey p-3">
            <div class="flex w-4/5 justify-between items-center gap-x-3">
                <div class="flex flex-col">
                    <p class="jourDate font-bungee text-redOnline text-4xl"></p>
                    <p class="moisDate font-bungee text-xl"></p>
                </div>
                <div class="h-full flex flex-col items-start justify-center gap-y-3">
                    <p class="startingPoint text-lightGrey font-medium text-sm font-epilogue"></p>
                    <!-- <p class="endingPoint text-lightGrey font-medium text-sm font-epilogue"><?php if ($GLOBALS['toWrite'][0]['end_traject'] == "46.6709261,5.5631747") {echo "13b Avenue du Stade Municipal, 39000 Lons-le-Saunier";}else{echo "2 Rte de Montaigu, 39000 Lons-le-Saunier";}?></p> -->
                </div>
            </div>
            <img src="../assets//img/upDown.png" alt="doubles inversés haut et bas" class="fleche">
        </div>

    <!--       Seule modif à faire ici pour toi Vincent , c'est dans la span , remplacé par probablement un count du nombre de résultats retourné par ton select -->

    <p class="w-5/6"><span class="text-redOnline"><?= count($test) ?></span> trajets disponibles</p>

    <!-- texte fixe ou aucune modif n'est nécessaireok -->

    <div class="w-5/6 flex justify-between items-center gap-2">
        <img src="../assets/img/clock.png" alt="Logo d'horloge">
        <p class="font-epilogue font-medium text-xs">Les trajets sont triés chronologiquement par heure de départ.</p>
    </div>
</main>
<?php 
$title = 'Recherche';
$searchResult = ob_get_clean();
require(__DIR__.'../../template.php'); ?>