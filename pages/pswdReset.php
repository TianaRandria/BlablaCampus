<?php include("header.php")?>
<main class="w-5/6">
    <h4>Pas de stress</h4>
    <p>Vous ne vous souvez plus de votre mot de passe et ne parvenez plus à vous connecter. Entrez votre email et réinitialisez le.</p>
    <form action="index.php" method="post" id="formResetMDP" class="w-full flex flex-col justify-center items-center">
        <input type="email" name="emailReset" id="emailReset" required class="w-full">
        <button type="submit" name="action" class="w-4/6 ls5 workSans text-xs BGColorRedOnline text-white rounded-xl p-2">RÉINITIALISER LE MOT DE PASSE</button>
    </form>
</main>
<?php include("footer.php")?>