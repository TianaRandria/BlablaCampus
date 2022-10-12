<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,300&family=Work+Sans:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="shortcut icon" href="../assets/img/favicon.png?v=2" type="image/x-icon">
  <title>BlaBla Campus</title>
</head>

<body class="flex flex-col justify-start items-center w-screen min-h-screen">
  <h1 class="hidden">Blabla Campus</h1>
  <header id="topMenu" class="sticky top-0 left-0 w-5/6 h-32 flex justify-between items-center bg-white">

    <a href="../index.php">
      <img src="../assets/img/simplifiedLogo.png" alt="Logo simplifié de BlaBla Campus">
    </a>
    <a href="account.php" id="changingZone" class="text-redOnline workSans"></a>
  </header>