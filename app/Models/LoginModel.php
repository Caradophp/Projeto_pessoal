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

        $sql = $db->prepare("SELECT * FROM usuario WHERE email = :email");
        $sql->bindParam(':email', $email);
        $sql->execute();

        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        if (!$resultado) {
            return false;
        }

        if ($resultado['senha'] === md5($senha)) {
            return $resultado; // retorna os dados do usuário
        }

        return false;
    }

    public static function salvarCodigo($email, $codigo) {
        $conn = new ConectarModel();
        $db = $conn->connect();

        $sql = $db->prepare("INSERT INTO codigos (email, codigo) VALUES (:email, :codigo)");
        $sql->bindParam(':email', $email);
        $sql->bindParam(':codigo', $codigo);
        $sql->execute();
    }

    public static function verifyCode($codigo) {
        $conn = new ConectarModel();
        $db = $conn->connect();

        $sql = $db->prepare("SELECT codigo FROM codigos WHERE codigo = :codigo");
        $sql->bindParam(':codigo', $codigo);
        $sql->execute();

        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return true;
            exit;
        }

        return false;
    }

   /**
    * @author Luciano Friebe Feigl
    * @param mixed $email
    * @return bool
    */
    public function emailForSenha($email) {

        $conn = new ConectarModel();
        $db = $conn->connect();

        $sql = $db->prepare("SELECT email FROM usuario WHERE email = :email");
        $sql->bindParam(':email', $email);
        $sql->execute();

        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return true;
            exit;
        }

        return false;
    }

    public function tracarSenha($novaSenha, $email)
    {
        $conn = new conectarModel();
        $db = $conn->connect();

        $sql = $db->prepare("UPDATE usuario SET senha = :senha WHERE email = :email");
        $sql->bindParam(':senha', md5($novaSenha));
        $sql->bindParam(':email', $email);
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
