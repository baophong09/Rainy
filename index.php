<?php

/**
 * Rainy - A Light-Weight PHP Framework For Beginner
 *
 * @package  RainyFramework
 * @author   Dinh Phong <dinhphong.developer@gmail.com>
 */


define('APPLICATION_TIME_START', microtime(true));

require_once "app/bootstrap.php";

$app = new Rainy\App();

$app->setDefaultController('home');
$app->setDefaultMethod('index');

try {
	$app->run();
} catch (Exception $e) {
	echo 'Caught exception: '. $e->getMessage() . "\n";
}


define('APPLICATION_TIME_END', microtime(true));
define('APPLICATION_RUN_TIME', APPLICATION_TIME_END - APPLICATION_TIME_START);

echo ("<div style='position: absolute; bottom:0; left: 0; padding: 30px; background-color: #eee'>Execute time: ".(APPLICATION_RUN_TIME * 1000)." ms</div>");