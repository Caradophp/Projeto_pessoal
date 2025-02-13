<?php

namespace app\Models;

use app\Models\ConectarModel;
use PDO;

class cadastrarModel {

    public function insert($nome, $senha) {

        $conn = new conectarModel();
        $db = $conn->connect();

        $sql = $db->prepare("INSERT INTO usuario (nome, senha) VALUES (:nome, :senha)");
        $sql->bindParam(':nome', $nome);
        $sql->bindParam(':senha', md5($senha));
        $sql->execute();
    }
}