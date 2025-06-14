<?php

namespace app\Models;

use app\Models\ConectarModel;
use PDO;

class cadastrarModel {

    public function insert($user) {

        $conn = new conectarModel();
        $db = $conn->connect();

        $sql = $db->prepare("INSERT INTO usuario (nome,email, senha) VALUES (:nome, :email, :senha, :telefone, :tipo_pessoa, :cpf, :cnpj)");
        $sql->bindParam(':nome', $user['nome']);
        $sql->bindParam(':email', $user['email']);
        $sql->bindParam('senha', $user['senha']);
        $sql->bindParam(':telefone', $user['telefone']);
        $sql->bindParam(':tipo_pessoa', $user['tipo_pessoa']);
        $sql->bindParam(':cpf', $user['cpf']);
        $sql->bindParam(':cnpj', $user['cnpj']);
        $sql->execute();
    }
}