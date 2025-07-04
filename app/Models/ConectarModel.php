<?php

namespace app\Models;

use PDO;
use app\functions\db_config;  

require_once __DIR__ . '/../Middlewares/AuthMiddleware.php';

class conectarModel {

    // private $host = DB_HOST;
    // private $name = DB_NAME;
    // private $user = DB_USER;
    // private $pass = DB_PASS;

    public function connect(){

        try {
            $conn = new PDO('mysql:dbname=users;host=localhost', "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conectado com sucesso!!!";
            return $conn;
        } catch (\PDOException $th) {
           echo "Não foi possível conectar " . $th;
        }
    }
}