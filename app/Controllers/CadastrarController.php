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
        $script = "Cadastrar";

        echo $this->twig->render('templete.php', [
            'title' => $title,
            'conteudo' => $this->twig->render("$url.php", []),
            'script' => $script
        ]);
    }

    public function cadastrar()
    {
        ini_set('session.gc_maxlifetime', 1800);
        session_start();
        $nome =  htmlspecialchars(trim($_POST['nome'] ?? ''), ENT_QUOTES, 'UTF-8');
        $email = $_POST['email'];
        $senha = htmlspecialchars(trim($_POST['senha'] ?? ''), ENT_QUOTES, 'UTF-8');

        if($_POST['nome'] != "" && $_POST['nome'] != null) {
            if ($_POST['email'] != "" && $_POST['email'] != null) {
                if ($_POST['senha'] != "" && $_POST['senha'] != null) {
                    try {
                        $insert = new cadastrarModel();
                        $insert->insert($nome, $email, $senha);

                        $_SESSION['nome'] = $nome;
                        $_SESSION['email'] = $email;
                        $_SESSION['senha'] = $senha;
                        echo json_encode(['success' => true]);
                        exit();
                    } catch (\Throwable $th) {
                        echo json_encode(['success' => false, 'message' => "ERRO: " . $th->getMessage()]);
                    }
                } else {
                    echo json_encode(['success' => false, 'message' => 'Campo senha deve ser preenchido']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Campo email deve ser preenchido']);
            }
        //var_dump($senha);
       } else {
         echo json_encode(['success' => false, 'message' => 'Campo nome deve ser preenchido']);
       }
    }
}

?>