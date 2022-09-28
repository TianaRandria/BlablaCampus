<?php
    spl_autoload_register(function ($class_name) {
        include './assets/models/' . $class_name . '.php';
    });

    function registerUser(){
        $newUser = new User;
        var_dump($newUser->register());
    }