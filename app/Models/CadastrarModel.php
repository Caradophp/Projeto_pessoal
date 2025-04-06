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
        $sql->bindParam(':senha', md5($senha));
        $sql->execute();
    }
}