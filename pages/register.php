<?php include('header.php') ?>

<form action="../assets/php/conditions.php" method="post" class="flex flex-col w-5/6 gap-3" id="formRegister">
  <label for="nameRegister" class="font-bungee">Entrez vos coordonnées</label>
  <input type="text" name="nameRegister" placeholder="Nom" class="bg-xtraLightGrey rounded-lg p-2" required>
  <input type="text" name="nicknameRegister" placeholder="Nom d'utilisateur" class="bg-xtraLightGrey rounded-lg p-2" required>
  <label for="pswdRegister" class="font-bungee">Entrez votre mot de passe</label>
  <input type="password" name="pswdRegister" placeholder="******************" class="bg-xtraLightGrey rounded-lg p-2" required>
  <label for="emailRegister" class="font-bungee">Entrez votre email</label>
  <input type="email" name="emailRegister" placeholder="Email" class="bg-xtraLightGrey rounded-lg p-2" required>
  <p class="epilogue text-lightGrey" id="underTextEmailRegister">Ajoutez votre adresse e-mail pour recevoir des notifications sur votre activité sur BlaBla Campus.</p>
  <label for="bioRegister" class="font-bungee">Entrez votre biographie</label>
  <textarea name="bioRegister" id="bioRegister" cols="30" rows="8" placeholder="Entrez votre bio ici" class="bg-xtraLightGrey rounded-lg resize-none" maxlength="140" required></textarea>
  <p class="font-bungee">Téléchargez une image de profil</p>
  <label for="profilePictureRegister" id="profilePictureRegisterLabel" class="bg-xtraLightGrey rounded-lg flex flex-col justify-center items-center w-full h-48 text-center box-border break-words overflow-hidden">
    <img src="../assets/img/landscape.png" alt="Logo de paysage stylisé">
    <p>Glisser-déposer ou parcourir un fichier</p>
    <p class="text-sm w-3/4 text-center">Taille recommandée : JPG, PNG, GIF (150x150px, Max 1mb)</p>
  </label>
  <input type="file" name="profilePictureRegister" id="profilePictureRegister" accept=".png,.jpg,.heif" required>
  <!-- <p id="changeIfWrongFile"></p> -->
  <div class="w-full flex justify-center">
    <input type="submit" name="action" value="CRÉER MON COMPTE" class="bg-redOnline cursor-pointer font-workSans rounded-lg w-4/5 text-center text-sm py-2.5 text-white tracking-5px">
  </div>
</form>

<?php include('footer.php') ?>