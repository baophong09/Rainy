<?php

/**
 * Rainy - A Light-Weight PHP Framework For Beginner
 *
 * @package  RainyFramework
 * @author   Dinh Phong <dinhphong.developer@gmail.com>
 *
 * Register Route
 */

class_alias('Rainy\Route','Route');

Route::rewrite('user/{username}', function($username){
	echo "Hello, " . $username;
});

Route::rewrite('dinh-phong', "home@test");


// Route::show();