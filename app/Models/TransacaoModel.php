<?php

namespace app\Models;

use app\Models\ConectarModel;
use PDO;

class TransacaoModel
{

    public function pesquisar($dado)
    {
        try {
            $conn = new conectarModel();
            $db = $conn->connect();

            try{
                $sql = $db->prepare("SELECT id, nome FROM usuario WHERE nome LIKE :dado");
                $dados = "%" . $dado . "%";
                $sql->bindParam(':dado', $dados,PDO::PARAM_STR);
                $sql->execute();

                $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            } catch (\Throwable $e) {
                echo "Erro: " . $e->getMessage();
                
            }
        } catch (\Throwable $e) {
            echo "Erro: " . $e->getMessage();
            
        }
    }

    public function transacaoInserir($origem, $destino)
    {
        try {
            $conn = new conectarModel();
            $db = $conn->connect();

            try {
                $sql = $db->prepare("INSERT INTO transacoes (origem, destino) VALUES (:origem, :destino)");
                $sql->bindParam(':origem', $origem);
                $sql->bindParam(':destino', $destino);
                $sql->execute();
            } catch (\Throwable $e) {
                echo "Erro: " . $e->getMessage();
            }
        } catch (\Throwable $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function debitoInserir($dados)
    {
        $usuario_id = $dados['usuario_id'];
        $descricao = $dados['descricao'];
        $valor = $dados['valor'];
        $data_debito = $dados['data_debito'];
        $categoria = $dados['categoria'];
        $forma_pagamento = $dados['forma_pagamento'];
        $referencia = $dados['referencia'];
        $status = $dados['status'];
        $observacao = $dados['observacao'];

        try {
            $conn = new conectarModel();
            $db = $conn->connect();

            try {
                $sql = $db->prepare(
                    "INSERT INTO debitos (usuario_id, descricao, valor, data_debito, categoria, forma_pagamento, referencia, status, observacao) VALUES (:usuario_id, :descricao, :valor, :data_debito, :categoria, :forma_pagamento, :referencia, :status, :observacao)"
                );
                $sql->bindParam(':usuario_id', $usuario_id);
                $sql->bindParam(':descricao', $descricao);
                $sql->bindParam(':valor', $valor);
                $sql->bindParam(':data_debito', $data_debito);
                $sql->bindParam(':categoria', $categoria);
                $sql->bindParam(':forma_pagamento', $forma_pagamento);
                $sql->bindParam(':referencia', $referencia);
                $sql->bindParam(':status', $status);
                $sql->bindParam(':observacao', $observacao);
                $sql->execute();
            } catch (\Throwable $e) {
                echo "Erro: " . $e->getMessage();
            }
        } catch (\Throwable $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function dividaListar($dados)
    {
        $usuario_id = $dados['usuario_id'];
        //$valor = $dados['valor'];
        //$data_debito = $dados['data_debito'];
        $categoria = $dados['categoria'];
        $forma_pagamento = $dados['forma_pagamento'];
        //$referencia = $dados['referencia'];
        $status = $dados['statusDivida'];

        try {
            $conn = new conectarModel();
            $db = $conn->connect();

            try {
                $sql = $db->prepare("SELECT * FROM debitos WHERE status = :status OR usuario_id = :usuario_id OR categoria = :categoria OR forma_pagamento = :forma_pagamento");
                $sql->bindParam(':usuario_id', $usuario_id);
                $sql->bindParam(':categoria', $categoria);
                $sql->bindParam(':forma_pagamento', $forma_pagamento);
                $sql->bindParam(':status', $status);
                $sql->execute();

                $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

                return $resultado;
            } catch (\Throwable $e) {
                echo "Erro: " . $e->getMessage();
            }
        } catch (\Throwable $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function listarTransacoesMensal()
    {
        try {
            $conn = new conectarModel(); // Instância da conexão com o banco
            $db = $conn->connect();

            $sql = $db->prepare("SELECT * FROM debitos ORDER BY id");
            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $e) {
            echo "Erro ao listar transações: " . $e->getMessage();
            return [];
        }
    }

    public function listarTransacoes()
    {
        try {
            $conn = new conectarModel(); // Instância da conexão com o banco
            $db = $conn->connect();

            $sql = $db->prepare("SELECT * FROM debitos ORDER BY id");
            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $e) {
            echo "Erro ao listar transações: " . $e->getMessage();
            return [];
        }
    }

    public function usuariosBuscar()
    {
        try {
            $conn = new conectarModel();
            $db = $conn->connect();

            try {
                $sql = $db->prepare("SELECT * FROM usuario");
                $sql->execute();

                $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

                return $resultado;
            } catch (\Throwable $e) {
                echo "Erro: " . $e->getMessage();
            }
        } catch (\Throwable $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}

?>
