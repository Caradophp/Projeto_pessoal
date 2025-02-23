<?php

namespace App\Middlewares;

class LogoutMiddleware {
    public function logout() {
        session_start();
        session_destroy(); // Destroi a sessão
        header("Location: /login");
        exit();
    }    
}