<?php

namespace app\Controllers;

use app\Models\adminpainelModel;
use app\Middlewares\AuthMiddleware;
use app\Core\Core;

require_once __DIR__ . '/../Middlewares/AuthMiddleware.php';

class AdminpainelController {

    private $twig;

    public function __construct() {
        session_start();
        $core = new Core(); 
        $this->twig = $core->getTwig();
    }

    public function index() {
        AuthMiddleware::verificarAutenticacao();

        $url = 'painel';
        $title = 'Painel';

        echo $this->twig->render('templete.php', [ 
            'title' => $title,
            'conteudo' => $this->verificaPagina($url),
        ]);
    }

    private function verificaPagina($page) {
        return $this->twig->render("$page.php");
    }
}
