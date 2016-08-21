<?php

namespace App\Controller;

class Home extends \Rainy\Controller
{
    public function index()
    {
        return $this->view('home', []);
    }

    public function test()
    {
        echo "This is test method";
    }

    public function params($params)
    {
        echo "This is test params";
        var_dump($params);
    }
}