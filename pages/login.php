<?php include('header.php')?>
<form action="confirmation.php" method="post" class="flex flex-col w-5/6 gap-9">
    <label for="login" class="bungee text-lg">Entrez vos informations</label>
    <div class="flex flex-col gap-2.5">
        <input type="text" name="login" placeholder="Nom d'utilisateur" class="BGColorLightGrey rounded-lg font-epilogue p-3" required>
        <input type="password" name="password" id="password" placeholder="******************" class="BGColorLightGrey rounded-lg p-3" required>
    </div>
    <div class="flex flex-col items-center justify-center w-full gap-9">
        <input type="submit" value="SE CONNECTER" class="cursor-pointer BGColorRedOnline rounded-lg tracking-5pxfont-workSans text-white text-sm w-3/4 py-2">
        <a href="pswdReset.php" class="tracking-5px colorRedOnlinefont-workSans text-xs">MOT DE PASSE OUBLIÉ</a>
    </div>
</form>
<?php include('footer.php') ?>