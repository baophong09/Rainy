<?php

/**
 * This is bootstrap file
 * This file boot up firstly when application run
 */

error_reporting(E_ALL);
ini_set('display_errors', 'on');

// Define some variable
// require_once "core/Define.php";

// Autoload class
require_once "vendor/autoload.php";

// Rewrite routes
require_once "app/routes.php";

