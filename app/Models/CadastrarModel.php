<?php

namespace app\Models;

use app\Models\ConectarModel;
use PDO;

class cadastrarModel {

    public function insert($user) {

        $senhaHash = password_hash($user['senha'], PASSWORD_DEFAULT);

        $conn = new conectarModel();
        $db = $conn->connect();

        $sql = $db->prepare("INSERT INTO usuario (nome, email, senha, tipo_pessoa, cpf, cnpj) VALUES (:nome, :email, :senha, :tipo_pessoa, :cpf, :cnpj)");
        $sql->bindParam(':nome', $user['nome']);
        $sql->bindParam(':email', $user['email']);
        $sql->bindParam('senha', $senhaHash);
        $sql->bindParam(':tipo_pessoa', $user['tipo_pessoa']);
        $sql->bindParam(':cpf', $user['cpf']);
        $sql->bindParam(':cnpj', $user['cnpj']);
        $sql->execute();
    }
}