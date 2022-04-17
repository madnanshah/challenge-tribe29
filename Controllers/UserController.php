<?php

require_once 'Models/User.php';
require_once 'Validations/UserValidation.php';

class UserController{

    public static function subscribe($data)
    {
        $user = new User($data['name'],$data['email']);
        $validation = new UserValidation();
        $validated = $validation->subscribe($user);
        if($validated['success']){
            if($user->subscribe()){
                $response = ['success'=>true, 'message'=>'Subscribed successfully'];
            }
            else{
                $response = ['success'=>false, 'message'=>'Something went wrong'];
            }           
        }else{
            $response = $validated;
        }
        $response['post'] = $data;
        print_r($response);
        $_SESSION['response'] = $response;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    public static function getAllSubscribers()
    {
        return User::allSubscribers();
    }
}