<?php

namespace app\Models;

use PDO;

require_once __DIR__ . '/../Middlewares/AuthMiddleware.php';
require_once __DIR__ . '/../functions/db_config.php';

class conectarModel {

    private $host = DB_HOST;
    private $name = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;

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