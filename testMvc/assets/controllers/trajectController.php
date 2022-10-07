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
                // var_dump(searchItineraryControl());
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
        return $searchingItinerary->searchItinerary();
    }
    function day($target){
        $monthAndDay = $target;
        $monthAndDayArray = explode('-', $monthAndDay);
        return implode('',array_splice($monthAndDayArray,2, 2));
    }
    function month($target){
        $monthAndDay = $target;
        $monthAndDayArray = explode('-', $monthAndDay);
        $removeday = array_splice($monthAndDayArray,0,2);
        switch (implode('',array_splice($removeday,1,1))) {
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
    }

    // créer nouveau tableau à partir des données récupéré , split la partie date en deux morceaux via day et month puis le retourner pour ensuite l'exploiter dans une boucle sur la vue resultSearch. que faire pour les étapes ? nouvelle ligne ? les ignorer ? les montrer en résultat?