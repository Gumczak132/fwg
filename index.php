<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';
$loader = include DIR_VENDOR . 'autoload.php';
require_once 'config-router.php';
$router = new \Gumunia\Diary\Engine\Router\Router('http://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
//var_dump('http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);

$router->run();
$file = $router->getFile();
$classController = $router->getClass();
$method = $router->getMethod();
require_once($file);
$obj = new $classController();
$obj->$method();
