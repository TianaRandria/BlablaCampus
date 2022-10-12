<!-- de manière général ça seras surtout des appels sur une variable au début probablement afin de se servir de celle ci pour  pouvoir réécrire les données nécessaires -->
<?php include('header.php');
include('../assets/class/Trajet.php');
// $getDateTraj = new Trajet();
// $getDateTrajects = $getDateTraj->month();
$getAllTr = new Trajet();
$getIdTraject = $getAllTr->getIdTrajects();
$getAllTraject = $getAllTr->getReservId();
$getAllUser = $getAllTr->getIdUsers();

$monthAndDay = $getAllTraject['date_traject'];
$monthAndDayArray = explode('-', $monthAndDay);
$day = implode('', array_splice($monthAndDayArray, 2, 2));
$removeday = array_splice($monthAndDayArray, 0, 2);
switch (implode('', array_splice($removeday, 1, 1))) {
  case '01':
    $month = "JANV";
    break;
  case '02':
    $month = "FEVR";
    break;
  case '03':
    $month = "MARS";
    break;
  case '04':
    $month = "AVR";
    break;
  case '05':
    $month = "MAI";
    break;
  case '06':
    $month = "JUIN";
    break;
  case '07':
    $month = "JUILL";
    break;
  case '08':
    $month = "AOUT";
    break;
  case '09':
    $month = "SEPT";
    break;
  case '10':
    $month = "OCT";
    break;
  case '11':
    $month = "NOV";
    break;
  default:
    $month = "DEC";
    break;
}
?>
<main class="w-5/6 flex flex-col gap-10">

  <!-- récupérer les données du trajets cliqué ( probablement un select , je ferais passé l'id discrétement), pour modfifier les infos du jour , du mois , du départ et de l'arrivé ainsi que  le nom du conducteur-->
  <h2 class="font-bungee text-lg">Réserver une place</h2>
  <div class="flex w-full justify-between items-center rounded-lg bg-xtraLightGrey p-3 h-24">
    <div class="flex w-3/5 justify-between items-center h-full">
      <div class="flex flex-col">
        <p class="jourDate font-bungee text-redOnline text-4xl"><?php echo $day ?></p>
        <p class="moisDate font-bungee text-xl"><?php echo $month ?></p>
      </div>
      <div class="h-full flex flex-col items-start justify-center">
        <p class="startingPoint text-lightGrey font-medium text-sm font-epilogue"><?php echo $getAllTraject['start_traject'] ?></p>
        <p class="endingPoint text-lightGrey font-medium text-sm font-epilogue"><?php echo $getAllTraject['end_traject'] ?></p>
      </div>
    </div>
    <img src="../assets//img/upDown.png" alt="doubles inversés haut et bas" class="fleche">
  </div>

  <div class="flex flex-col justify-start items-start gap-10 font-epilogue">
    <p class="font-epilogue text-lightGrey font-medium">Bonjour <span class="text-redOnline font-bold"><?php echo $getAllUser['nickname_user'] ?></span></p>
    <p class="font-epilogue text-lightGrey font-medium">Je souhaiterai réserver une place dans ta voiture pour le trajet <span class="text-redOnline font-bold"><?php echo $getAllTraject['start_traject'] ?> - <?php echo $getAllTraject['end_traject'] ?></span></p>
    <p class="font-epilogue text-lightGrey font-medium">En te remerciant.</p>
  </div>
  <!-- modifier la valeur des inputs caché avec l'id de l'utilisateur qui envoit le message ( celui qui réserve donc ) et l'id du trajet  -->
  <form action="../assets/php/conditions.php?id_traject=<?php echo $_GET['id_traject'] ?>" method="post" class="flex justify-center items-center">
    <input type="submit" name="action" value="Envoyer ma demande" class="font-workSans text-sm p-5 tracking-5px bg-redOnline text-white rounded-lg uppercase">
  </form>
</main>
<?php include('footer.php'); ?>