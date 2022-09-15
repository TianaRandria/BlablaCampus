<?php include("header.php")?>
<main class="w-5/6 flex flex-col justify-start items-start gap-6">
    <h4 class="bungee text-lg">Pas de stress !</h4>
    <div class="p-2">
        <p class="epilogue font-medium text-xs colorGrey">Vous ne vous souvez plus de votre mot de passe et ne parvenez plus à vous connecter. Entrez votre email et réinitialisez le.</p>
    </div>
    <form action="index.php" method="post" id="formResetMDP" class="w-full flex flex-col justify-center items-center gap-6">
        <input type="email" name="emailReset" id="emailReset" required placeholder="Email" class="w-full BGColorLightGrey roundBorder p-2">
        <button type="submit" name="action" class="w-4/6 ls5 workSans text-xs BGColorRedOnline text-white rounded-xl p-2">RÉINITIALISER LE MOT DE PASSE</button>
    </form>
</main>
<?php include("footer.php")?>