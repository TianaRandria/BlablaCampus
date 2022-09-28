<?php 
$dir = "./assets/controllers";
$list = array_diff(scandir($dir), array('..','.'));
foreach ($list as $controller) {
    require_once('./assets/controllers/'.$controller);
}
if(empty($_GET['page'])){
    homePage();
}else{
    switch($_GET['page']){
        // case "test":
        //     test();
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
                break;
            case 'CRÉER MON COMPTE':
                registerUser();
                break;
            default:
                break;
        }
    }
}
session_destroy();