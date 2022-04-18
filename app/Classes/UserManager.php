<?php

namespace App\Classes;

use App\Models\User;

class UserManager
{
    static public function createAccount($array){
        
        $user = User::create($array);
        if($user){
            return true;
        }
        else{
            return false;
        }
        
    }


    static public function editAccount($array){
        $user = User::create($array);
        if($user){
            return true;
        }
        else{
            return false;
        }
    }
    
}