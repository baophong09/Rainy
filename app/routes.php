<?php

/**
 * Rainy - A Light-Weight PHP Framework For Beginner
 *
 * @package  RainyFramework
 * @author   Dinh Phong <dinhphong.developer@gmail.com>
 *
 * Rewrite Route
 */

class_alias('Rainy\Route','Route');

Route::rewrite('user/{username}', function($username){
	echo "Hello, " . $username;
});

Route::rewrite('hello/{firstname}/{lastname}', "User@hello");

Route::rewrite('dinh-phong', "Home@test");

//Route::show();