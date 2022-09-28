<?php
    require('./assets/views/header.php');
    if (isset($register)) {
        echo $register;
    }
    if(isset($login)){
        echo $login;
    }
    if(isset($search)){
        echo $search;
    }
    require('./assets/views/footer.php');