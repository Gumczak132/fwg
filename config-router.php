<?php

$collection = new \Gumunia\Diary\Engine\Router\RouteCollection();

$collection->add('homepage', new \Gumunia\Diary\Engine\Router\Route(
        HTTP_SERVER . '', array(
    'file' => DIR_CONTROLLER . 'LoginController.php',
    'method' => 'index',
    'class' => '\Gumunia\Diary\Controller\LoginController'
        )
));

$collection->add('registration', new \Gumunia\Diary\Engine\Router\Route(
        HTTP_SERVER . 'registration', array(
    'file' => DIR_CONTROLLER . 'RegistrationController.php',
    'method' => 'registration',
    'class' => '\Gumunia\Diary\Controller\RegistrationController'
        )
));

$collection->add('registration_add', new \Gumunia\Diary\Engine\Router\Route(
        HTTP_SERVER . 'registration/add', array(
    'file' => DIR_CONTROLLER . 'RegistrationController.php',
    'method' => 'add',
    'class' => '\Gumunia\Diary\Controller\RegistrationController'
        )
));
 
$collection->add('login', new \Gumunia\Diary\Engine\Router\Route(
        HTTP_SERVER . 'login', array(
    'file' => DIR_CONTROLLER . 'LoginController.php',
    'method' => 'login',
    'class' => '\Gumunia\Diary\Controller\LoginController'
        )
));

$collection->add('diary', new \Gumunia\Diary\Engine\Router\Route(
        HTTP_SERVER . 'diary', array(
    'file' => DIR_CONTROLLER . 'DiaryController.php',
    'method' => 'index',
    'class' => '\Gumunia\Diary\Controller\DiaryController'
        )
));

$router = new \Gumunia\Diary\Engine\Router\Router($_SERVER['REQUEST_URI'], $collection);
