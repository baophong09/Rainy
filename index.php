<?php

/**
 * Rainy - A Light-Weight PHP Framework For Beginner
 *
 * @package  RainyFramework
 * @author   Dinh Phong <dinhphong.developer@gmail.com>
 */

define('APPLICATION_TIME_START', microtime(true));

require_once "app/bootstrap.php";

$app = new App;

$app->setDefaultController('home');
$app->setDefaultMethod('index');

$app->run();

define('APPLICATION_TIME_END', microtime(true));
define('APPLICATION_RUN_TIME', APPLICATION_TIME_END - APPLICATION_TIME_START);

die("<br/>Execute time: ".(APPLICATION_RUN_TIME * 1000)." ms");