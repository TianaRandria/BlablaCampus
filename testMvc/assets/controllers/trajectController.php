<?php 
    spl_autoload_register(function ($class_name) {
        include './assets/models/' . $class_name . '.php';
    });
    function trajectPage(){
        switch ($_GET['page']) {
            case 'searchItinerary':
                require('./assets/views/viewsTraject/search.php');
                break;
            case 'newItinerary':
                require('./assets/views/viewsTraject/newTraject.php');
                break;
            case 'resultSearch':
                require('./assets/views/viewsTraject/resultSearch.php');
                break;
            default:
                break;
        }
    }
    function registerTraject(){
        $entry = new Trajet();
        $entry->newItinerary();
    }
    function searchItineraryControl(){
        $searchingItinerary = new Trajet();
        $GLOBALS['toWrite'] = $searchingItinerary->searchItinerary();
    }