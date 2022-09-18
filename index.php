<?php include('./assets/php/conditions.php');
if (isset($_SESSION['nickname_user'])) {
    header("Location:pages/searchItinerary.php");
}else{
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,300&family=Work+Sans:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>BlaBla Campus</title>
    </head>
    
    <body class="flex flex-col justify-center items-center w-screen min-h-screen gap-20">
        <img src="assets/img/logoBlaBlaFirstPage.png" alt="Logo de BlaBla Campus">
        <div id="containerStarting" class="w-4/5">
            <a href="./pages/register.php" id="starting" class="flex w-full justify-center items-center gap-2 BGColorRedOnline">
                <img src="assets/img/carStarting.png" alt="Une voiture">
                <p class="text-white workSans ls5">COMMENCEZ</p>
            </a>
            <a href="pages/login.php" class="flex justify-center items-center w-full">
                <p class="workSans ls5 colorRedOnline">SE CONNECTER</p>
            </a>
        </div>
        <script src="assets/js/app.js"></script>
    </body>
    
    </html>
<?php
}
?>