<?php

namespace app\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use app\Models\ConectarModel;
use app\Models\CadastrarModel;
use app\Models\LoginModel;

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

        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        try {
             $insert = new cadastrarModel();
             $insert->insert($nome,$senha);

             header('Location: http://localhost/deucerto/phpup/Model_View_Controller/adminpainel');
        } catch (\Throwable $th) {
            echo "Erro ao cadastrar " . $th;
        }
        //var_dump($senha);
    }

    public function login() {
       
        $url = 'login';
        $title = 'Login';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'] ?? null;
        $senha = $_POST['senha'] ?? null;

        if (!empty($nome) && !empty($senha)) {
            $ver = new loginModel();
            $autenticado = $ver->verificacao($nome, $senha);

            if ($autenticado == true) {
                header('Location: http://localhost/deucerto/phpup/Model_View_Controller/adminpainel');
                exit;
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
    <div class='alert alert-danger'>Dados Incorretos</div>
</center>
</body>
</html>";
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
        'conteudo' => $this->twig->render("$url.php")
    ]);
}
}