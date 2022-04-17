<?php
session_start();
require 'config/init.php';

$route = str_replace('/challenge-tribe29/', "", $_SERVER['REQUEST_URI']);

switch ($route??'') {

    case '':
    case 'home':
    case 'index.php':
       HomeController::show();
        break;

    case 'subscribe':
        return UserController::subscribe($_POST);
        break;

    case 'all-subscribers':
        $subscribers =  UserController::getAllSubscribers();
        print(Json_encode($subscribers));
        break;
    
    case 'practice':
        include 'Views/practice.php';
        break;

    default:
        include 'Views/404.php';
        break;

}