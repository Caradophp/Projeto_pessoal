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
    
}