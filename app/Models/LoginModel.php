<?php

namespace app\Models;

use app\Models\ConectarModel;
use PDO;

class loginModel {

    public function verificacao($nome, $senha) {

        $conn = new conectarModel();
        $db = $conn->connect();

        $sql = $db->prepare("SELECT senha FROM usuario WHERE nome = :nome");
        $sql->bindParam(':nome', $nome);
        //$sql->bindParam(':senha', $senha);
        $sql->execute();

        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return true;
        } else {
            return false;
        }

    }
}