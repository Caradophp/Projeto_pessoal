<?php

namespace app\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once __DIR__ . '/../../vendor/autoload.php';

class ContatoController {

    private $twig;

    public function __construct() {
       
        $loader = new FilesystemLoader(__DIR__ . '/../Views/');
        $this->twig = new Environment($loader);

    }

    public function index() {

        $url = 'contato';
        $title = 'Contato';

       echo $this->twig->render('templete.php', [
        'title' => $title,
        'conteudo' => $this->verificaPagina($url)
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