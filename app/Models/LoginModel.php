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
            $senhaBanco = $resultado['senha']; // Senha armazenada no banco (MD5)

            if (md5($senha)=== $senhaBanco) {

                var_dump($senhaBanco);
                echo "✅ Login realizado com sucesso!";
                return true;
            } else {
                var_dump(md5($senha));
                echo "❌ Senha incorreta!";
            }
        } else {
            echo "❌ Usuário não encontrado!";
        }
    }
}