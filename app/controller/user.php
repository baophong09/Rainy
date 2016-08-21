<?php

namespace App\Controller;

class User extends \Rainy\Controller
{
	public function index()
	{
		echo "User/index";
	}

	public function test()
	{
		echo "User/test";
	}

	public function hello($firstname, $lastname)
	{
		echo "Hello " . $firstname . " " . $lastname;
	}
}