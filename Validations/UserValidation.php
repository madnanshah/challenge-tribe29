<?php


class UserValidation
{
    public function subscribe(User $user){
        $email = $user->getEmail();
        $name = $user->getName();

        if(!$name || !$email){
            return ['success'=>false, 'message'=>'Please fill all data'];
        }
        elseif(!$this->isEmailValid($email)){
            return ['success'=>false, 'message'=>'Invalid email'];
        }elseif($this->isEmailAlreadyExists($email)){
            return ['success'=>false, 'message'=>'User already registered!'];
        }
        else{
            return ['success'=>true, 'message'=>'Data is valid'];
        }
    }

    private function isEmailValid($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private function isEmailAlreadyExists($email){
        $fcsv = file('newsletter.csv');
        foreach ($fcsv as $key => $value) {
            $temp = explode('|', $value);
            if (trim($temp[2]) == $email) {
                return true;
            }
        }
        return false;
    }
}