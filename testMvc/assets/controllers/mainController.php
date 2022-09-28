<?php
    spl_autoload_register(function ($class_name) {
        include './assets/models/' . $class_name . '.php';
    });
    function homePage(){
        require(__DIR__.'/../views/homePage.php');
    }
    function confirmationPage(){
        require(__DIR__.'/../views/confirmation.php');
    }
    // function testConnect(){
    //     $testConnect = new Database;
    //     echo $testConnect->connect();
    // }
    // function test(){
    //     $test = new User;
    //     echo $test->test();
    // }