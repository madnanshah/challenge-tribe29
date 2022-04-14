<?php

require_once 'Models/User.php';

class UserController{
    
    public static function subscribe($data)
    {
        $user = new User($data['name'],$data['email']);
        $validated = $user->validate();

        if ($validated['success']){
            try {
                $line = [date('ymdHm'),$data['name'],$data['email']];
                $handle = fopen("newsletter.csv", "a");
                fputcsv($handle, $line,'|');
                fclose($handle);
                $_SESSION['status'] = ['success'=>true, 'message'=>'Subscribed successfully'];
            } catch (\Throwable $th) {
                $_SESSION['status'] = ['success'=>false, 'message'=>'Something went wrong'];
            }
        }else{
            $_SESSION['status'] = $validated;
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    public static function allSubscribers()
    {
        $data = file('newsletter.csv');
        for ($i=0; $i < sizeof($data); $i++) { 
            $data[$i] =  explode('|', $data[$i]);
        }
        return $data;
    }
}