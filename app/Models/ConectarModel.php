<?php

namespace app\Models;

use PDO;
use app\functions\db_config;  

require_once __DIR__ . '/../Middlewares/AuthMiddleware.php';

class conectarModel {

    private $host = "localhost";
    private $name = "users";
    private $user = "root";
    private $pass = "";

    public function connect(){

        try {
            $conn = new PDO('mysql:dbname='.$this->name.';host='.$this->host.'', $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conectado com sucesso!!!";
            return $conn;
        } catch (\PDOException $th) {
           echo "Não foi possível conectar " . $th;
        }
    }
}