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
            case'myItinerary':
                $listTraject = new Trajet();
                $transfert = newArray($listTraject->getMyTrajects());
                require('./assets/views/viewsTraject/myItinerary.php');
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
                return "JANV";
                break;
            case '02':
                return "FEVR";
                break;
            case '03':
                return "MARS";
                break;
            case '04':
                return "AVR";
                break;
            case '05':
                return "MAI";
                break;
            case '06':
                return "JUIN";
                break;
            case '07':
                return "JUILL";
                break;
            case '08':
                return "AOUT";
                break;
            case '09':
                return "SEPT";
                break;
            case '10':
                return "OCT";
                break;
            case '11':
                return "NOV";
                break;
            default:
                return "DEC";
                break;
        }
    }
