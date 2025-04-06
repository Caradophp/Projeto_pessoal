<?php

namespace app\Models;

use app\Models\ConectarModel;
use PDO;

class loginModel
{
    public function verificacao($email, $senha)
    {
        $conn = new conectarModel();
        $db = $conn->connect();

        $sql = $db->prepare("SELECT senha FROM usuario WHERE email = :email");
        $sql->bindParam(':email', $email);
        $sql->execute();

        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        if (!$resultado) {
            return false;
        }

        // Converte a senha digitada para MD5 antes da verificação
        if ($resultado['senha'] === md5($senha)) {
            return true;
        }

        return false;
    }

    public function tracarSenha($novaSenha, $id)
    {
        $conn = new conectarModel();
        $db = $conn->connect();

        $sql = $db->prepare("UPDATE usuario SET senha = :senha WHERE id = :id");
        $sql->bindParam(':senha', md5($novaSenha));
        $sql->bindParam(':id', $id);
        $sql->execute();

        return true;
    }

    public function buscarEmail($email, $id)
    {
        $conn = new conectarModel();
        $db = $conn->connect();

        $sql = $db->prepare("SELECT :email FROM usuario WHERE id = :id");
        $sql->bindParam(':email', $email);
        $sql->bindParam(':id', $id);
        $sql->execute();

        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        return $resultado;
    }
}
