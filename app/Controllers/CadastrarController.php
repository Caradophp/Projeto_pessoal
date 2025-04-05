<?php 

namespace app\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use app\Models\CadastrarModel;

class CadastrarController
{
    
    private $twig;

    public function index()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views/');
        $this->twig = new Environment($loader);

        $url = "cadastrar";
        $title = "Cadastrar";

        echo $this->twig->render('templete.php', [
            'title' => $title,
            'conteudo' => $this->twig->render("$url.php", []),
        ]);
    }

    public function cadastrar()
    {
        ini_set('session.gc_maxlifetime', 1800);
        session_start();
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        if ($_POST['nome'] != "" && $_POST['nome'] != null) {
            if ($_POST['senha'] != "" && $_POST['senha'] != null) {
                try {
                    $insert = new cadastrarModel();
                    $insert->insert($nome, $senha);

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
}

?>