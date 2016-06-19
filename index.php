<?php
error_reporting(E_ALL^E_WARNING);
ini_set('display_errors',true);
define("APP_PATH",  realpath(dirname(__FILE__) . '/'));
$app  = new Yaf_Application(APP_PATH . "/conf/application.ini");
$app->bootstrap()->run();