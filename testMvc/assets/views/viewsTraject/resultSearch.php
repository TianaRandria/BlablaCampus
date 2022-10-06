<?php
ob_start();
session_start();
?>

<main class="flex flex-col justify-start items-center w-5/6 min-h-screen gap-y-3">
    <h4 class="w-5/6font-bungee">Trajets Disponibles</h4>

    <!--         structure à utiliser dans le echo de ta fonction de recherche pour écrire les résultats , les seuls trucs à changer dedans seront les contenu des P ansi que la value de l'input hidden         -->
<?php if(count($GLOBALS['toWrite'])){ 
    $monthAndDay = $GLOBALS['toWrite'][0]['date_traject'];
    $monthAndDayArray = explode('-', $monthAndDay);
    $day = implode('',array_splice($monthAndDayArray,2, 2));
    $removeday = array_splice($monthAndDayArray,0,2);
    switch (implode('',array_splice($removeday,1,1))) {
        case '01':
            $month = "JANV";
            break;
        case '02':
            $month = "FEVR";
            break;
        case '03':
            $month = "MARS";
            break;
        case '04':
            $month = "AVR";
            break;
        case '05':
            $month = "MAI";
            break;
        case '06':
            $month = "JUIN";
            break;
        case '07':
            $month = "JUILL";
            break;
        case '08':
            $month = "AOUT";
            break;
        case '09':
            $month = "SEPT";
            break;
        case '10':
            $month = "OCT";
            break;
        case '11':
            $month = "NOV";
            break;
        default:
            $month = "DEC";
            break;
        }
    ?>
        <div class="flex w-full justify-between items-center rounded-lg bg-xtraLightGrey p-3">
            <div class="flex w-4/5 justify-between items-center gap-x-3">
                <div class="flex flex-col">
                    <p class="jourDate font-bungee text-redOnline text-4xl"><?= $day ?></p>
                    <p class="moisDate font-bungee text-xl"><?= $month ?></p>
                </div>
                <div class="h-full flex flex-col items-start justify-center gap-y-3">
                    <p class="startingPoint text-lightGrey font-medium text-sm font-epilogue"><?= $GLOBALS['toWrite'][0]['start_traject'] ?></p>
                    <p class="endingPoint text-lightGrey font-medium text-sm font-epilogue"><?php if ($GLOBALS['toWrite'][0]['end_traject'] == "46.6709261,5.5631747") {echo "13b Avenue du Stade Municipal, 39000 Lons-le-Saunier";}else{echo "2 Rte de Montaigu, 39000 Lons-le-Saunier";}?></p>
                </div>
            </div>
            <img src="../assets//img/upDown.png" alt="doubles inversés haut et bas" class="fleche">
        </div>

    <!--       Seule modif à faire ici pour toi Vincent , c'est dans la span , remplacé par probablement un count du nombre de résultats retourné par ton select -->

    <p class="w-5/6"><span class="text-redOnline"><?= count($GLOBALS['toWrite']) ?></span> trajets disponibles</p>

    <!-- texte fixe ou aucune modif n'est nécessaireok -->

    <div class="w-5/6 flex justify-between items-center gap-2">
        <img src="../assets/img/clock.png" alt="Logo d'horloge">
        <p class="font-epilogue font-medium text-xs">Les trajets sont triés chronologiquement par heure de départ.</p>
    </div>
</main>
<?php ;}else{echo '<p class="font-epilogue font-bold">Pas de trajets</p>';}?>
<?php 
$title = 'Recherche';
$searchResult = ob_get_clean();
require(__DIR__.'../../template.php'); ?>