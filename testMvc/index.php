<?php 
$dir = "./assets/controllers";
$list = array_diff(scandir($dir), array('..','.'));
foreach ($list as $controller) {
    require_once('./assets/controllers/'.$controller);
}
if(empty($_GET['page'])){
    homePage();
    session_start();
    if($_SESSION['nickname_user']){
        header('Location: ./searchItinerary');
    }
}else{
    switch($_GET['page']){
        case "login" :
        case "register":
            accountPage();
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
            default:
                break;
        }
    }
}
// session_start();
// session_destroy();