<?php

namespace app\Controllers;

class TesteController {

    public function __construct() {
        echo "Olá Mundo!!!";
        //$this->boasVindas('Luciano');
    }

    private function boasVindas($nome) {

        echo 'Seja bem vindo, ' . $nome . '!!!';
    }
}