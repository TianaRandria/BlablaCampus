<?php
    require('./assets/views/header.php');
    switch($_GET['page']){
        case 'login':
            require('./assets/views/viewsAccount/login.php');
            break;
        case 'register':
            require('./assets/views/viewsAccount/register.php');
            break;
        default:
            break;
    }

    require('./assets/views/footer.php');