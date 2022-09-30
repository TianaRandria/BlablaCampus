<?php 
$dir = "./assets/controllers";
$list = array_diff(scandir($dir), array('..','.'));
foreach ($list as $controller) {
    require_once('./assets/controllers/'.$controller);
}
if(empty($_GET['page'])){
    homePage();
    if(isset($_SESSION['nickname_user'])){
        session_start();
        header('Location: ./searchItinerary');
    }
}else{
    switch($_GET['page']){
        case "login" :
        case "register":
        case "myAccount":
            accountPage();
            break;
        case "searchItinerary":
        case "newItinerary":
            trajectPage();
            break;
        case "confirmation":
            confirmationPage();
            break;
        default:
    }
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'SE CONNECTER':
                loginUser();
                break;
            case 'CRÉER MON COMPTE':
                registerUser();
                break;
            case "RECHERCHER":
                break;
            case "Se déconnecter":
                logoutUser();
                break;
            default:
                break;
        }
    }
}
// session_start();
// session_destroy();
