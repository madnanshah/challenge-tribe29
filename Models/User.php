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

    public function validate()
    {
        $email = $this->email;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success'=>false, 'message'=>'Invalid email'];
        }

        $fcsv   = file('newsletter.csv');
        foreach ($fcsv as $key => $value) {
            $temp = explode('|', $value);
            if (trim($temp[2]) == $email) {
                return ['success'=>false, 'message'=>'User already registered!'];
            }
        }
        return ['success'=>true, 'message'=>'Data is valid'];
    }
}