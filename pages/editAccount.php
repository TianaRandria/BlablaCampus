<?php include('header.php') ?>

<!-- à remplir par défaut avec les données concernant l'utilisateur en utilsant les attributs value  , l'utilisateur devra rentrer à nouveau son mot de passe donc faut faire un check en même temps que la mise à jour des informations. L'image ne sera pas en require pour éviter les soucis de récupérations de données / remise à nouveau de l'image par l'utilisateur de façon forcé -->

<form action="../assets/php/conditions.php" method="post" class="flex flex-col w-5/6 gap-3" id="formEdit">
  <label for="nameEdit" class="font-bungee">Entrez vos coordonnées</label>
  <input type="text" name="nameEdit" placeholder="<?php echo $_SESSION['name_user'] ?>" class="bg-xtraLightGrey rounded-lg p-2">
  <input type="text" name="nicknameEdit" placeholder="<?php echo $_SESSION['nickname_user'] ?>" class="bg-xtraLightGrey rounded-lg p-2">
  <label for="pswdEdit" class="font-bungee">Entrez votre mot de passe</label>
  <input type="password" name="pswdEdit" placeholder="******************" class="bg-xtraLightGrey rounded-lg p-2">
  <label for="emailEdit" class="font-bungee">Entrez votre email</label>
  <input type="email" name="emailEdit" placeholder="<?php echo $_SESSION['email_user'] ?>" class="bg-xtraLightGrey rounded-lg p-2">
  <p class="epilogue text-lightGrey" id="underTextEmailEdit">Ajoutez votre adresse e-mail pour recevoir des notifications sur votre activité sur BlaBla Campus.</p>
  <label for="bioEdit" class="font-bungee">Entrez votre biographie</label>
  <textarea name="bioEdit" id="bioEdit" cols="30" rows="8" placeholder="<?php echo $_SESSION['bio_user'] ?>" class="bg-xtraLightGrey rounded-lg resize-none" maxlength="140"></textarea>
  <p class="font-bungee">Téléchargez une image de profil</p>
  <label for="profilePictureEdit" id="profilePictureEditLabel" class="bg-xtraLightGrey rounded-lg flex flex-col justify-center items-center w-full h-48">
    <img src="../assets/img/landscape.png" alt="Logo de paysage stylisé">
    <p>Glisser-déposer ou parcourir un fichier</p>
    <p class="text-sm w-3/4 text-center">Taille recommandée : JPG, PNG, GIF (150x150px, Max 1mb)</p>
  </label>
  <input type="file" name="profilePictureEdit" id="profilePictureEdit" accept=".png,.jpg,.heif">
  <div class="w-full flex justify-center">
    <input type="submit" name="action" value="ÉDITER MON COMPTE" class="bg-redOnline cursor-pointer font-workSans rounded-lg w-4/5 text-center text-sm py-2.5 text-white tracking-5px">
  </div>
</form>

<?php include('footer.php') ?>