<?php include('header.php')?>
<body class="flex flex-col justify-center items-center w-screen min-h-screen">
<form action="" method="post" class="flex flex-col">
    <label for="coordsRegister">Entrez vos coordonnées</label>
    <input type="text" name="coordsRegister" placeholder="Nom">
    <input type="text" name="coordsRegister" placeholder="Nom d'utilisateur">
    <label for="pswdRegister">Entrez votre mot de passe</label>
    <input type="password" name="pswdRegister" placeholder="**************">
    <label for="emailRegister">Entrez votre email</label>
    <input type="email" name="emailRegister" placeholder="Email">
    <p>Ajoutez votre adresse e-mail pour recevoir des notifications sur votre activité sur Foundation. Cela ne sera pas affiché sur votre profil.</p>
    <label for="bioRegister">Entrez votre biographie</label>
    <textarea name="bioRegister" id="bioRegister" cols="30" rows="10" placeholder="Entrez votre bio ici"></textarea>
    <label for="profilePictureRegister">Téléchargez une image de profil</label>
    <input type="file" name="profilePictureRegister" id="profilePictureRegister" accept=".png,.jpg,.heif">
</form>
<?php include('footer.php')?>