<?php

namespace app\Models;

use app\Models\ConectarModel;
use PDO;

class cadastrarModel {

    public function insert($user) {

        $senhaHash = password_hash($user['senha'], PASSWORD_DEFAULT);

        $conn = new conectarModel();
        $db = $conn->connect();

        if ($user['tipo_pessoa'] === 'FISICA') {

            $sql = $db->prepare("INSERT INTO usuario (nome, email, senha, tipo_pessoa, cpf) VALUES (:nome, :email, :senha, :tipo_pessoa, :cpf)");

            $sql->bindParam(':nome', $user['nome']);
            $sql->bindParam(':email', $user['email']);
            $sql->bindParam('senha', $senhaHash);
            $sql->bindParam(':tipo_pessoa', $user['tipo_pessoa']);
            $sql->bindParam(':cpf', $user['cpf']);
            $sql->execute();
        } else if ($user['tipo_pessoa'] === 'JURIDICA') {

            $sql = $db->prepare("INSERT INTO usuario (nome, email, senha, tipo_pessoa, cnpj) VALUES (:nome, :email, :senha, :tipo_pessoa, :cnpj)");

            $sql->bindParam(':nome', $user['nome']);
            $sql->bindParam(':email', $user['email']);
            $sql->bindParam('senha', $senhaHash);
            $sql->bindParam(':tipo_pessoa', $user['tipo_pessoa']);
            $sql->bindParam(':cnpj', $user['cnpj']);
            $sql->execute();
        } else {
            return json_encode("Tipo de pessoa inválida");
        }
    }
}