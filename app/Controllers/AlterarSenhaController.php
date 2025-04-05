<?php 

namespace app\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use app\Models\LoginModel;

class AlterarSenhaController
{

    private $twig;

    public function index()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views/');
        $this->twig = new Environment($loader);

        $url = "NovaSenha";
        $title = "Login";

        echo $this->twig->render('templete.php', [
            'title' => $title,
            'conteudo' => $this->twig->render("$url.php", []),
        ]);
    }

    public function login()
    {
        $ts = new LoginModel();
        $title = "Trocar Senha";
        $url = "novasenha";

        // Validação dos dados de entrada
        $novaSenha = $_POST['senha'] ?? null;

        try {
            // Verifica se o usuário existe no banco
            $usuarioExiste = $ts->buscarNome("admin", 1);

            if ($usuarioExiste) {
                // Altera a senha
                $ts->tracarSenha($novaSenha, 1);
                header('Location: /login');
                exit();
            }

        } catch (\Throwable $th) {
            echo $th;
        }
    }
}

?>