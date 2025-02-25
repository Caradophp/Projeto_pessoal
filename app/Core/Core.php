<?php

namespace app\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Core {

    private $twig;

    public function __construct() {
        $loader = new FilesystemLoader(__DIR__ . '/../Views/admin');
        $this->twig = new Environment($loader);
    }

    public function getTwig() {
        return $this->twig;
    }

    public function verificaPagina($page) {
        try {
            return $this->twig->render("$page.php");
        } catch (\Twig\Error\LoaderError $e) {
            return $this->twig->render('manutencao.php', ['message' => 'Página não encontrada.']);
        }
    }

    public function rend($template, $params = []) {
        return $this->twig->render($template, $params);
    }
}
