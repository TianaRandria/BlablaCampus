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
    if(isset($myAccount)){
        echo $myAccount;
    }
    if(isset($newItinerary)){
        echo $newItinerary;
    }
    if(isset($searchResult)){
        echo $searchResult;
    }
    require('./assets/views/footer.php');