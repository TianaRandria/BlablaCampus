<?php include('header.php') ?>

<form action="confirmation.php" method="post" class="flex flex-col p-3 w-full gap-3" id="formRegister">
    <label for="nameRegister" class=" bungee">Entrez vos coordonnées</label>
    <input type="text" name="nameRegister" placeholder="Nom" class="BGColorLightGrey roundBorder p-2" required>
    <input type="text" name="nicknameRegister" placeholder="Nom d'utilisateur" class="BGColorLightGrey roundBorder p-2" required>
    <label for="pswdRegister" class=" bungee">Entrez votre mot de passe</label>
    <input type="password" name="pswdRegister" placeholder="******************" class="BGColorLightGrey roundBorder p-2" required>
    <label for="emailRegister" class=" bungee">Entrez votre email</label>
    <input type="email" name="emailRegister" placeholder="Email" class="BGColorLightGrey roundBorder p-2" required>
    <p class="epilogue colorGrey" id="underTextEmailRegister">Ajoutez votre adresse e-mail pour recevoir des notifications sur votre activité sur BlaBla Campus.</p>
    <label for="bioRegister" class=" bungee">Entrez votre biographie</label>
    <textarea name="bioRegister" id="bioRegister" cols="30" rows="8" placeholder="Entrez votre bio ici" class="BGColorLightGrey roundBorder resize-none" maxlength="140" required></textarea>
    <p class=" bungee">Téléchargez une image de profil</p>
    <label for="profilePictureRegister" id="profilePictureRegisterLabel" class="BGColorLightGrey roundBorder flex flex-col justify-center items-center w-full h-48">
        <img src="../assets/img/landscape.png" alt="Logo de paysage stylisé">
        <p>Glisser-déposer ou parcourir un fichier</p>
        <p class="text-sm w-3/4 text-center">Taille recommandée : JPG, PNG, GIF (150x150px, Max 1mb)</p>
    </label>
    <input type="file" name="profilePictureRegister" id="profilePictureRegister" accept=".png,.jpg,.heif" required>
    <div class="w-full flex justify-center">
        <input type="submit" name="action" value="CRÉER MON COMPTE" class="BGColorRedOnline cursor-pointer workSans roundBorder w-4/5 text-center text-sm py-2.5 text-white ls5">
    </div>
</form>

<?php

if (isset($_POST['action']) && !empty($_POST['nameRegister'])  && !empty($_POST['nicknameRegister']) && !empty($_POST['pswdRegister']) && !empty($_POST['emailRegister']) && !empty($_POST['bioRegister']) && $_POST['action'] == "CRÉER MON COMPTE") {
    $reg = new User();
    $reg->register();
}

include('footer.php') ?>