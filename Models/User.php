<?php


class User
{
    private $name;
    private $email;

    public function __construct($name,$email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function subscribe(){        
        try {
            $line = [date('ymdHm'),$this->name,$this->email];
            $handle = fopen('newsletter.csv', 'a');
            $result = fputcsv($handle, $line,'|');
            fclose($handle);
            return $result;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function allSubscribers()
    {
        $handle = file('newsletter.csv');
        for ($i=0; $i < sizeof($handle); $i++) { 
            $subscribers[$i] =  explode('|', $handle[$i]);
        }
        return $subscribers;
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }
}