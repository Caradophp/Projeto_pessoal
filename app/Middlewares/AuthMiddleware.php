<?php

namespace App\Middlewares;

class AuthMiddleware {
    public static function verificarAutenticacao() {
        if (!isset($_SESSION['usuario'])) {
            header('Location: http://localhost/deucerto/phpup/Model_View_Controller/formulario/login');
            exit();
        }
    }
}

