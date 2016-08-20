<?php

namespace App\Controller;

class Home
{
	public function index()
	{
		echo "This is home/index";
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