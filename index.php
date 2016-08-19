<?php

define('APPLICATION_TIME_START', microtime(true));

/**
 * Rainy - A Light-Weight PHP Framework For Beginner
 *
 * @package  RainyFramework
 * @author   Dinh Phong <dinhphong.developer@gmail.com>
 */

// Include bootstrap file
require_once "app/bootstrap.php";

$app = new App;

define('APPLICATION_TIME_END', microtime(true));
define('APPLICATION_RUN_TIME', APPLICATION_TIME_END - APPLICATION_TIME_START);

die("<br/>Execute time: ".(APPLICATION_RUN_TIME * 1000)." ms");