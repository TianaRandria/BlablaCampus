<?php include('header.php'); ?>

<main class="flex flex-col justify-start items-center w-screen min-h-screen gap-4">
    <h4 class="w-5/6font-bungee">Trajets Disponibles</h4>

    <!--         structure à utiliser dans le echo de ta fonction de recherche pour écrire les résultats , les seuls trucs à changer dedans seront les contenu des P ansi que la value de l'input hidden         -->


        <div class="flex w-5/6 justify-between items-center rounded-lg bg-xtraLightGrey p-3 h-24">
            <div class="flex w-3/5 justify-between items-center h-full">
                <div class="flex flex-col">
                    <p class="jourDate font-bungee text-redOnline text-4xl">05</p>
                    <p class="moisDate font-bungee text-xl">SEP</p>
                </div>
                <div class="h-full flex flex-col items-start justify-center">
                    <p class="startingPoint text-lightGrey font-medium text-sm font-epilogue">Dole</p>
                    <p class="endingPoint text-lightGrey font-medium text-sm font-epilogue">Lons le Saunier</p>
                </div>
            </div>
            <img src="../assets//img/upDown.png" alt="doubles inversés haut et bas" class="fleche">
        </div>

    <!--       Seule modif à faire ici pour toi Vincent , c'est dans la span , remplacé par probablement un count du nombre de résultats retourné par ton select -->

    <p class="w-5/6"><span class="text-redOnline">5</span> trajets disponibles</p>

    <!-- texte fixe ou aucune modif n'est nécessaireok -->

    <div class="w-5/6 flex justify-between items-center gap-2">
        <img src="../assets/img/clock.png" alt="Logo d'horloge">
        <p class="epilogue font-medium text-xs">Les trajets sont triés chronologiquement par heure de départ.</p>
    </div>

    <!--     Template pour les cards que tu devras générer via tes fonctions de recherches -->


    <!-- les endroits à changer avec tes fonctions sont le nombre de place disponibles ( le chiffre uniquement ) , les lieux de destinations/départ , l'image du conducteur , son nom et la petite phrase. Pour l'image de l'utilisateur si il te faut une autre balise qu'une img hésite pas à me prévenir , que je puisse adapter ça proprement 

    edit 1 : changement pour un form , devra changer la value de l'input hidden pour pouvoir faire la récup après

-->
    <form action="reservation.php" class="w-full flex justify-center">
        <div class="card w-5/6 bg-xtraLightGrey rounded-lg flex flex-col p-3 gap-3.5 relative">
            <p class="text-xs font-workSans text-end w-full">places disponibles : <span class="text-redOnline font-bold">2</span></p>
            <div class="firstRow w-full flex h-12 gap-2">
                <div class="flex flex-col justify-between h-full">
                    <p class="text-redOnline font-bold text-sm">6H30</p>
                    <p class="text-redOnline font-bold text-sm">7H30</p>
                </div>
                <div class="flex flex-col relative justify-between h-full">
                    <span class="circleSearchResult"></span>
                    <span class="circleSearchResult"></span>
                    <span class="blackBar absolute"></span>
                </div>
                <div class="h-full flex flex-col justify-between items-start">
                    <p class="colorFakeBlack font-bold font-epilogue text-sm">Dole</p>
                    <p class="colorFakeBlack font-bold font-epilogue text-sm">Lons le Saunier</p>
                </div>
            </div>
            <div class="secondRow flex gap-3 justify-start items-center">
                <div class="first-col">
                    <img src="../assets/img/humanLogo.png" alt="img du conducteur" class="img-cardSearch">
                </div>
                <div class="second-col">
                    <p class="epilogue text-sm font-bold">Pauline</p>
                    <p class="epilogue font-light text-xs italic">Avec moi ça passe ou ça casse</p>
                </div>
            </div>
            <input type="submit" value="" name="action" class="absolute top-0 left-0 w-full h-full rounded-lg text-transparent" value="goToDetails">
        </div>
        <input type="hidden" name="idToTransfer" value="1">
    </form>



</main>

<?php include('footer.php') ?>