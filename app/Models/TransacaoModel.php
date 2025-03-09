<?php 

namespace app\Models;

use app\Models\ConectarModel;
use PDO;

class TransacaoModel {

    public function transacaoInserir($origem, $destino) {

        try {

            $conn = new conectarModel();
            $db = $conn->connect();

            try {
                
                $sql = $db->prepare("INSERT INTO transacoes (origem, destino) VALUES (:origem, :destino)");
                $sql->bindParam(':origem', $origem);
                $sql->bindParam(':destino', $destino);
                $sql->execute();

            } catch (\Throwable $e) {
               echo "Erro: " .  $e->getMessage();
            }
        } catch (\Throwable $e) {
            echo "Erro: " .  $e->getMessage();
        }
    }

    public function debitoInserir($origem, $destino) {

        try {

            $conn = new conectarModel();
            $db = $conn->connect();

            try {
                
                $sql = $db->prepare("INSERT INTO debito (origem, destino) VALUES (:origem, :destino)");
                $sql->bindParam(':origem', $origem);
                $sql->bindParam(':destino', $destino);
                $sql->execute();

            } catch (\Throwable $e) {
               echo "Erro: " .  $e->getMessage();
            }
        } catch (\Throwable $e) {
            echo "Erro: " .  $e->getMessage();
        }
    }

    public function dividaListar($status) {

        try {

            $conn = new conectarModel();
            $db = $conn->connect();

            try {
                
                $sql = $db->prepare("SELECT * FROM debitos WHERE status = :status");
                $sql->bindParam(':status', $status);
                $sql->execute();

                $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

                return $resultado;

            } catch (\Throwable $e) {
               echo "Erro: " .  $e->getMessage();
            }
        } catch (\Throwable $e) {
            echo "Erro: " .  $e->getMessage();
        }
    }
}

?>