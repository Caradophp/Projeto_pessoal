<?php

namespace app\Controllers;

use app\Models\adminpainelModel;
use app\Models\TransacaoModel;
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

    public function transacao() {
        $origem = $_POST['transacoesOrigem'];
        $destino = $_POST['transacoesDestino'];
        try {
            $inserirTransacao = new TransacaoModel();
            $inserirTransacao->transacaoInserir($origem, $destino);
            header('Location: http://localhost/deucerto/phpup/Model_View_Controller/adminpainel');
        } catch (\Throwable $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

public function dividaListar() {

        $url = 'painel';
        $title = 'Painel';

        if (isset($_POST['statusDivida'])) {
            $status = $_POST['statusDivida'];  // Obtém o status do formulário POST
            
            try {
                // Chama o método da model para buscar os dados
                $inserirTransacao = new TransacaoModel();
                $resultado = $inserirTransacao->dividaListar($status);  // Recebe os dados da consulta
                //var_dump($resultado);
                // Carrega o template Twig
                $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views/admin'); // Coloque o caminho correto
                $twig = new \Twig\Environment($loader);
                
                // Passa os dados para o template
                echo $this->twig->render('templete.php', [ 
                    'title' => $title,
                    'conteudo' => $this->verificaPagina($url),
                    'resultado' => $resultado,
                ]);
    
            } catch (\Throwable $e) {
                echo "Erro: " . $e->getMessage();
            }
        } else {
            echo "Status da dívida não fornecido!";
        }
    }    
}
