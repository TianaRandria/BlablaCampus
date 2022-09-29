<?php 
    spl_autoload_register(function ($class_name) {
        include './assets/models/' . $class_name . '.php';
    });
    function trajectPage(){
        switch ($_GET['page']) {
            case 'searchItinerary':
                require('./assets/views/viewsTraject/search.php');
                break;
            default:
                break;
        }
    }