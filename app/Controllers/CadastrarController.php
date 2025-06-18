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

        echo $this->twig->render('templedes/CadTemplete.php', [
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
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $senha = htmlspecialchars(trim($_POST['senha'] ?? ''), ENT_QUOTES, 'UTF-8');
        $tipo_pessoa = $_POST['tipo_pessoa'];
        $cpf = filter_var($_POST['cpf'], FILTER_SANITIZE_NUMBER_INT);
        $cnpj = filter_var($_POST['cnpj'], FILTER_SANITIZE_NUMBER_INT);

        $valido = false;

        if ($tipo_pessoa === 'FISICA') {
            if ($cpf != "" && !empty($cpf)) {
                $valido = true;
            }
        }

        if ($tipo_pessoa === 'JURIDICA') {
            if ($cnpj != "" && !empty($cnpj)) {
                $valido = true;
            }
        }

        if($nome != "" && $nome != null) {
            if ($email != "" && $email != null) {
                if ($senha != "" && $senha != null) {
                        if ($valido) {
                            try {

                                $user = [
                                            'nome' => $nome, 
                                            'email' => $email,
                                            'senha' => $senha,
                                            'tipo_pessoa' => $tipo_pessoa, 
                                            'cpf' => $cpf ?? 0, 
                                            'cnpj' => $cnpj ?? 0
                                        ];

                                $insert = new cadastrarModel();
                                $insert->insert($user);

                                $_SESSION['nome'] = $nome;
                                $_SESSION['email'] = $email;
                                $_SESSION['senha'] = $senha;
                                echo json_encode(['success' => true]);
                                exit();
                            } catch (\Throwable $th) {
                                echo json_encode(['success' => false, 'message' => "ERRO: " . $th->getMessage()]);
                            }  
                    } else {
                       echo json_encode(['success' => false, 'message' => 'O Campo telefone deve ser preenchido']);
                    }
                } else {
                    echo json_encode(['success' => false, 'message' => 'Campo senha deve ser preenchido']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Campo email deve ser preenchido']);
            }
       } else {
         echo json_encode(['success' => false, 'message' => 'Campo nome deve ser preenchido']);
       }
    }
}

?>