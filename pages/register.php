<?php include('header.php') ?>

<body class="flex flex-col justify-center items-center w-screen min-h-screen">
    <form action="" method="post" class="flex flex-col p-3" id="formRegister">
        <label for="nameRegister" class="epilogue">Entrez vos coordonnées</label>
        <input type="text" name="nameRegister" placeholder="Nom" class="BGColorLightGrey roundBorder">
        <input type="text" name="nicknameRegister" placeholder="Nom d'utilisateur" class="BGColorLightGrey roundBorder">
        <label for="pswdRegister" class="epilogue">Entrez votre mot de passe</label>
        <input type="password" name="pswdRegister" placeholder="**************" class="BGColorLightGrey roundBorder">
        <label for="emailRegister" class="epilogue">Entrez votre email</label>
        <input type="email" name="emailRegister" placeholder="Email" class="BGColorLightGrey roundBorder">
        <p class="epilogue colorGrey" id="underTextEmailRegister">Ajoutez votre adresse e-mail pour recevoir des notifications sur votre activité sur BlaBla Campus.</p>
        <label for="bioRegister" class="epilogue">Entrez votre biographie</label>
        <textarea name="bioRegister" id="bioRegister" cols="30" rows="10" placeholder="Entrez votre bio ici" class="BGColorLightGrey roundBorder" maxlength="140"></textarea>
        <p class="epilogue">Téléchargez une image de profil</p>
        <label for="profilePictureRegister" id="profilePictureRegisterLabel" class="BGColorLightGrey roundBorder">
            <img src="../assets/img/landscape.png" alt="Logo de paysage stylisé">
            <p>Glisser-déposer ou parcourir un fichier</p>
            <p>Taille recommandée : JPG, PNG, GIF (150x150px, Max 1mb)</p>
        </label>
        <input type="file" name="profilePictureRegister" id="profilePictureRegister" accept=".png,.jpg,.heif">
    </form>
    <?php include('footer.php') ?>