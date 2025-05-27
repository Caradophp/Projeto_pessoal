<?php

namespace app\Models;

use app\Models\ConectarModel;
use PDO;

class adminpainelModel {

    public function exibicao() {
        $conn = new conectarModel();
        $db = $conn->connect();

        $sql = $db->prepare("SELECT * FROM usuario");
        $sql->execute();
    
        if ($sql->rowCount() > 0) {
            
            $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    
            foreach ($resultados as $linha) {
                echo "<tr>ID: " . $linha['id'] . " - Nome: " . $linha['nome'] . "<br></tr>";
            }
        } else {
            echo "Nenhum registro encontrado.";
        }
    }

    public function excluir($id)
    {
        try {
            $conn = new conectarModel();
            $db = $conn->connect();

            $sql = "DELETE FROM usuario WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                return true;
            } else {
                throw new \Exception("Erro ao excluir o registro.");
            }
        } catch (\Throwable $e) {
           echo $e->getMessage();
            
        }
    }

    public function alterar($dados)
    {
        try {
            $conn = new conectarModel();
            $db = $conn->connect();
    
            $sql = $db->prepare("UPDATE FROM usuario SET nome = : nome, email = :email WHERE id = :id");
            $sql->bindParam(":nome", $dados['nome']);
            $sql->bindParam(":email", $dados['email']);
            $sql->bindParam(":id", $dados['id']);
            $sql->execute();
        } catch (\Throwable $e) {
            echo $e->getMessage();
             
        }
    }

    public function buscarDados($id) 
    {
        try {
            $conn = new conectarModel();
            $db = $conn->connect();

            $sql = $db->prepare("SELECT * FROM usuario WHERE id = :id");
            $sql->bindParam(":id", $id);
            $sql->execute();

            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            return $resultado;
        } catch (\Throwable $e) {
            echo $e->getMessage();
             
        }
    }
    
}