<?php 

namespace app\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use app\Models\LoginModel;
use app\functions\SendMailer;

class LoginController 
{

    private $twig;

    /**
     * Renderiza a tela
     */
    public function index()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views/');
        $this->twig = new Environment($loader);

        $url = "login";
        $title = "Login";
        $script = "Logon";

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['email'])) {
            header('Location: http://localhost/deucerto/phpup/Model_View_Controller/adminpainel');
            exit;
        }

        echo $this->twig->render('templedes/logintemplete.php', [
            'title' => $title,
            'conteudo' => $this->twig->render("$url.php", []),
            'script' => $script
        ]);
    }

    public function logar()
    {
        ini_set('session.gc_maxlifetime', 1800);
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha =$_POST['senha'];

            if (empty($email) || empty($senha)) {
                echo json_encode(['success' => false, 'message' => 'Preencha todos os campos.']);
                exit();
            }

            $ver = new loginModel();
            $usuario = $ver->verificacao($email, $senha);

            if ($usuario) {
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                echo json_encode(['success' => true]);
                exit();
            } else {
                echo json_encode(['success' => false, 'message' => 'Usuário ou senha incorretos!']);
                exit();
            }
        }
    }

    public function changePass() {

        $email = $_POST['email'];

        $model = new LoginModel();
        $validate = $model->emailForSenha($email);

        if ($validate) {
           $recuperacao = new SendMailer();
           $codigoenviado = $recuperacao->enviarCodigo($email);

           if ($codigoenviado) {
                echo json_encode(['success' => true, 'message' => 'Código enviado com sucesso']);
                exit();
           } else {
                echo json_encode(["message", "Erro ao enviar código"]);
           }
            
        } else {
            echo json_encode(["message", "Email inválido"]);
        }
    }

    public function confirmarCodigo() {

        ini_set('session.gc_maxlifetime', 1800);
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigo = $_POST['codigo'];
        }
        
        if (LoginModel::verifyCode($codigo)) {
            $_SESSION['codigo'] = $codigo;

            echo json_encode(['success' => true]);
            exit();
        } else {
            echo json_encode(["result", "Código inválido"]);
        }
    }

    public function sair()
    {
        session_start();
        session_destroy();
        header('Location: http://localhost/deucerto/phpup/Model_View_Controller/login');
        exit();
    }
}

?>