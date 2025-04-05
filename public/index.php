<?php

require_once '../vendor/autoload.php';

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
//var_dump($controllerName);

if(class_exists($controllerName)) {
    $action = new $controllerName;
    $action->$methodName();
} else {
    echo "<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
</head>
<body>
 <center><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class='alert alert-danger'>Essa página não existe</div>
</center>
</body>
</html>";
}
//$action = new $controllerName;
// var_dump($controller);

// $msg = new HomeController();
// $msg->boasVindas($meuNome);