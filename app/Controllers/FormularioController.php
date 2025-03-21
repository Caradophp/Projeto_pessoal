<?php

namespace app\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use app\Models\ConectarModel;
use app\Models\CadastrarModel;
use app\Models\LoginModel;
use App\Middlewares\logout;

require_once __DIR__ . '/../Middlewares/logout.php';
require_once __DIR__ . '/../../vendor/autoload.php';

class FormularioController {

    private $twig;

    public function __construct() {
       
        $loader = new FilesystemLoader(__DIR__ . '/../Views/');
        $this->twig = new Environment($loader);

    }

    public function index() {

        $url = 'formulario';
        $title = 'Cadastro';

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

    public function cadastrar() {
        ini_set('session.gc_maxlifetime', 1800); 
        session_start();
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        if ($_POST['nome'] != "" && $_POST['nome'] != null) {

            if ($_POST['senha'] != "" && $_POST['senha'] != null) {
                
                try {
                    $insert = new cadastrarModel();
                    $insert->insert($nome,$senha);
       
                    $_SESSION['usuario'] = $nome;
                    $_SESSION['senha'] = $senha;
                    header('Location: http://localhost/deucerto/phpup/Model_View_Controller/adminpainel');
               } catch (\Throwable $th) {
                   echo "Erro ao cadastrar " . $th;
               }
            } else {
                echo "Preencha a senha";
            }
        } else {
            echo "Preencha o nome";
        }
        //var_dump($senha);
    } 

    public function login() {
        ini_set('session.gc_maxlifetime', 1800); 
        session_start();
        $message = null;
        $url = 'login';
        $title = 'Login';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'] ?? null;
        $senha = $_POST['senha'] ?? null;

        if (!empty($nome) && !empty($senha)) {
            $ver = new loginModel();
            $usuario = $ver->verificacao($nome, $senha);

            if ($usuario) {
                $_SESSION['usuario'] = $nome;
                $_SESSION['senha'] = $senha;
                header('Location: http://localhost/deucerto/phpup/Model_View_Controller/adminpainel');
                exit;
            } else {
                $message = "Erro ao logar Usuário ou senha incorretos!";
                return;
            }
        } else {
            echo $this->twig->render('templete.php', [
                'conteudo' => $this->twig->render("$url.php", [
                    'error' => 'Preencha todos os campos'
                ])
            ]);
            return;
        }
    }
    echo $this->twig->render('templete.php', [
        'title' => $title,
        'conteudo' => $this->twig->render("$url.php", [
            'error' => $message
        ])
    ]);
}

public function sair() {
    session_start();
    session_destroy();
    header('Location: http://localhost/deucerto/phpup/Model_View_Controller/formulario/login');
    exit();
}
}