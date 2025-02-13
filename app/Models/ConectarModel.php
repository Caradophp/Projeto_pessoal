<?php

namespace app\Models;

use PDO;

class conectarModel {

    public function connect(){

        try {
            $conn = new PDO('mysql:dbname=users;host=localhost', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conectado com sucesso!!!";
            return $conn;
        } catch (PDOException $th) {
           echo "Não foi possível conectar " . $th;
        }
    }
}