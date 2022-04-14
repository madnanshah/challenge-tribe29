<?php
session_start();
require 'config/init.php';

$route = str_replace('', "", $_SERVER['REQUEST_URI']);

$route = explode('/', $route);

switch ($route[2]??'') {

    case '':
    case 'home':
    case 'index.php':
       HomeController::show();
        break;

    case 'subscribe':
        $data = UserController::subscribe($_POST);
        print_r($data);
        break;

    case 'all-subscribers':
        $subscribers =  UserController::allSubscribers();
        print(Json_encode($subscribers));
        break;

    default:
        include 'Views/404.php';
        break;

}