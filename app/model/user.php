<?php

namespace App\Model;

class User extends \Rainy\Model
{
    public function say($message)
    {
        echo $message;
        return true;
    }
}