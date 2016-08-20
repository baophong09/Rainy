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

Route::set('user/login', function(){
	echo "user login";
});

Route::set('user/signup', function(){
	echo "user signup";
});

Route::show();