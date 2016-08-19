<?php

define('APPLICATION_TIME_START', microtime(true));

/**
 * This is bootstrap file
 * This file boot up firstly when application run
 */

define('APPLICATION_TIME_END', microtime(true));

define('APPLICATION_RUN_TIME', APPLICATION_TIME_END - APPLICATION_TIME_START);

die("Execute time: ".APPLICATION_RUN_TIME." ms");