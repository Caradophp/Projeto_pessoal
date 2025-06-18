<?php

require_once '../vendor/autoload.php';

//require_once '../src/classes/Routes.php';

use app\Controllers\HomeController;
use App\Classes\Routes;

//$meuNome = 'Luciano';
$uri = $_SERVER['REQUEST_URI'];

$url = explode('/', trim($uri));

if ($url[4] == "") {
    $controller = 'HomeController';
} else {
    $controller = ucfirst($url[4]) . 'Controller';
}

$controllerName = "app\\Controllers\\{$controller}";
$methodName = $url[5] ?? 'index';
$idValue = $url[6] ?? '';
//var_dump($controllerName);

if(class_exists($controllerName)) {
    $action = new $controllerName;
    $action->$methodName();
}
//$action = new $controllerName;
// var_dump($controller);

// $msg = new HomeController();
// $msg->boasVindas($meuNome);