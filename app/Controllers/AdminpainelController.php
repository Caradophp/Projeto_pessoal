<?php

namespace app\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use app\Models\adminpainelModel;
use App\Middlewares\AuthMiddleware;

require_once __DIR__ . '/../Middlewares/AuthMiddleware.php';

class AdminpainelController {

    private $twig;

    public function __construct() {

        session_start();
        $loader = new FilesystemLoader(__DIR__ . '/../Views/admin');
        $this->twig = new Environment($loader);
    }

    public function index() {

           AuthMiddleware::verificarAutenticacao();
           $url = 'painel';
           $title = 'Painel';
           $exib = new adminpainelModel();
        // var_dump($exib);

        echo $this->twig->render('templete.php', [
        'title' => $title,
        'conteudo' => $this->verificaPagina($url),
        //'dados' => $exib->exibicao()
        ]);
    }

    public function verificaPagina($page) {
        try {
            return $this->twig->render("$page.php");
        } catch (\Twig\Error\LoaderError $e) {
            return $this->twig->render('manutencao.php', ['message' => 'Página não encontrada.']);
        }
    }
}