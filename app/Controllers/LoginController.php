<?php 

namespace app\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use app\Models\LoginModel;

class LoginController 
{

    private $twig;

    public function index()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views/');
        $this->twig = new Environment($loader);

        $url = "login";
        $title = "Login";
        $script = "Logon";

        echo $this->twig->render('templete.php', [
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

    public function sair()
    {
        session_start();
        session_destroy();
        header('Location: http://localhost/deucerto/phpup/Model_View_Controller/login');
        exit();
    }
}

?>