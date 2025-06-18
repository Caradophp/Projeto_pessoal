<?php

namespace App\Middlewares;

class AuthMiddleware {
    public static function verificarAutenticacao() {
        if (!isset($_SESSION['email'])) {
            header('Location: http://localhost/deucerto/phpup/Model_View_Controller/login');
            exit();
        }
    }

    public static function AuthPass() {
        if(!isset($_SESSION['codigo'])) {
            header('Location: http://localhost/deucerto/phpup/Model_View_Controller/login');
            exit();
        }
    }
}
