<?php include('header.php')?>
<form action="" method="post" class="flex flex-col w-full p-4 gap-9">
    <label for="login" class="bungee text-lg">Entrez vos informations</label>
    <div class="flex flex-col gap-2.5">
        <input type="text" name="login" placeholder="Nom d'utilisateur" class="BGColorLightGrey roundBorder epilogue p-3">
        <input type="password" name="password" id="password" placeholder="******************" class="BGColorLightGrey roundBorder p-3">
    </div>
    <div class="flex flex-col items-center justify-center w-full gap-9">
        <input type="submit" value="SE CONNECTER" class="BGColorRedOnline roundBorder ls5 workSans text-white text-sm w-3/4 py-2">
        <a href="pswdReset.php" class="ls5 colorRedOnline workSans text-xs">MOT DE PASSE OUBLIÉ</a>
    </div>
</form>
<?php include('footer.php')?>