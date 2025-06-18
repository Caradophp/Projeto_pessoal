<?php

use app\Controllers\HomeController;
use app\Controllers\ContatoController;
use app\Controllers\CadastrarController;
use app\Controllers\LoginController;
use app\Controllers\AdminpainelController;
use app\Controllers\AlterarSenhaController;

// Função simples para lidar com rotas
function route($uri, $callback) {
    $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if ($uri === $currentUri) {
        $callback();
        exit;
    }
}

// Rotas definidas
route('/', function() {
    $controller = new HomeController();
    $controller->index();
});

route('/contato', function() {
    $controller = new ContatoController();
    $controller->index();
});

