<?php

namespace app\Models;

use app\Models\ConectarModel;
use PDO;

class cadastrarModel {

    public function insert($nome, $email, $senha) {

        $conn = new conectarModel();
        $db = $conn->connect();

        $sql = $db->prepare("INSERT INTO usuario (nome,email, senha) VALUES (:nome, :email, :senha)");
        $sql->bindParam(':nome', $nome);
        $sql->bindParam(':email', $email);
        $senhaHash = md5($senha);
        $sql->bindParam(':senha', $senhaHash);
        $sql->execute();
    }
}