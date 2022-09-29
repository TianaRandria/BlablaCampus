<?php
    spl_autoload_register(function ($class_name) {
        include './assets/models/' . $class_name . '.php';
    });
    function accountPage(){
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
    }
    function registerUser(){
        $newUser = new User;
        $newUser->register();
    }
    function loginUser(){
        $loginUser = new User;
        $loginUser->login();
    }