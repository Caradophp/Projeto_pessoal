<?php

namespace app\Controllers;

use app\Models\adminpainelModel;
use FPDF;
use app\Models\TransacaoModel;
use app\Middlewares\AuthMiddleware;
use app\Core\Core;

require_once __DIR__ . '/../Middlewares/AuthMiddleware.php';

class AdminpainelController {

    private $twig;

    public function __construct() {
        session_start();
        $core = new Core(); 
        $this->twig = $core->getTwig();
    }

    public function index() {
        AuthMiddleware::verificarAutenticacao();

        $url = 'painel';
        $title = 'Painel';

        //$this->buscar();

        echo $this->twig->render('templete.php', [ 
            'title' => $title,
            'conteudo' => $this->verificaPagina($url),
        ]);
    }

    private function verificaPagina($page) {

        $relatorio = $this->relatorioUltimoMes();
        $resultado = $this->usuariosSelecionar();
        //$resultBusca = $this->buscar() ?? '';
        return $this->twig->render("$page.php", [ 
               'listaUsuario' => $resultado,
               'dados' => $relatorio,
               //'resultado' => $resultBusca
        ]);
    }

    public function buscar() {
        $dado = $_POST['dado'] ?? '';

        $busca = new TransacaoModel();
        $resultado = $busca->pesquisar($dado);
        echo json_encode($resultado);
        exit();
        // for ($i = 0; $i < count($resultado) && $i < 5; $i++) {
        // echo $resultado[$i]['nome'] . "<br>"; // ou qualquer outro campo que tiver
    }

    public function transacao() {
        $origem = $_POST['transacoesOrigem'];
        $destino = $_POST['transacoesDestino'];

        $url = 'painel';
        $title = 'Painel';

        if (($origem != null && $origem != "") && ($destino != null && $destino != "")) {

            try {
                $inserirTransacao = new TransacaoModel();
                $inserirTransacao->transacaoInserir($origem, $destino);
                header('Location: http://localhost/deucerto/phpup/Model_View_Controller/adminpainel');
            } catch (\Throwable $e) {
                echo "Erro: " . $e->getMessage();
            }

        } else {
            echo $this->twig->render('templete.php', [ 
                'title' => $title,
                'conteudo' => $this->verificaPagina($url),
                'erro' => 'Preencha todos os campos'
            ]);
        }
    }

    public function dividaListar() {

        $url = 'painel';
        $title = 'Painel';

        if (isset($_POST) && $_POST != null && $_POST != "") {
            $status = $_POST;  // Obtém o status do formulário POST
            
            try {
                // Chama o método da model para buscar os dados
                $inserirTransacao = new TransacaoModel();
                $resultado = $inserirTransacao->dividaListar($status);  // Recebe os dados da consulta
                //var_dump($resultado);
                // Carrega o template Twig
                $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views/admin'); // Coloque o caminho correto
                $twig = new \Twig\Environment($loader);
                
                // Passa os dados para o template
                echo $this->twig->render('templete.php', [ 
                    'title' => $title,
                    'conteudo' => $this->verificaPagina($url),
                    'resultado' => $resultado,
                ]);
    
            } catch (\Throwable $e) {
                echo "Erro: " . $e->getMessage();
            }
        } else {
            echo "Status da dívida não fornecido!";
        }
    }   

    public function debitosInserir() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = $_POST;

            try {
                $inserirDebito = new TransacaoModel();
                $inserirDebito->debitoInserir($dados);
                header('Location: http://localhost/deucerto/phpup/Model_View_Controller/adminpainel');
            } catch (\Throwable $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }

    public function relatorioUltimoMes() {
        $transacaoModel = new TransacaoModel();
        $relatorio = $transacaoModel->listarTransacoesMensal(); // Busca do banco
    
        return $relatorio;
    }

    public function relatorio() {
        $transacaoModel = new TransacaoModel();
        $dados = $transacaoModel->listarTransacoes(); // Busca do banco
    
        echo $this->twig->render('relatorio.php', [
            'dados' => $dados
        ]);
    }
    

    public function gerarPDF() {
        
        $transacaoModel = new TransacaoModel();
        $dados = $transacaoModel->listarTransacoes(); // Busca do banco
        
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(190, 10, utf8_decode('Relatório de Transações'), 0, 1, 'C'); // Convertendo o título para ISO-8859-1
        $pdf->Ln(10);
        
        // Cabeçalhos da tabela
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(20, 10, 'ID', 1);
        $pdf->Cell(30, 10, utf8_decode('Usuário'), 1); // Convertendo o título para ISO-8859-1
        $pdf->Cell(60, 10, utf8_decode('Descrição'), 1); // Convertendo o título para ISO-8859-1
        $pdf->Cell(30, 10, utf8_decode('Valor'), 1); // Convertendo o título para ISO-8859-1
        $pdf->Cell(30, 10, utf8_decode('Data'), 1); // Convertendo o título para ISO-8859-1
        $pdf->Cell(20, 10, utf8_decode('Status'), 1); // Convertendo o título para ISO-8859-1
        $pdf->Ln();
        
        // Adiciona os dados à tabela
        $pdf->SetFont('Arial', '', 10);
        foreach ($dados as $item) {
            $pdf->Cell(20, 10, utf8_decode($item['id']), 1);
            $pdf->Cell(30, 10, utf8_decode($item['usuario_id']), 1);
            $pdf->Cell(60, 10, utf8_decode($item['descricao']), 1);  // Convertendo os dados para ISO-8859-1
            $pdf->Cell(30, 10, 'R$ ' . number_format($item['valor'], 2, ',', '.'), 1);
            $pdf->Cell(30, 10, utf8_decode($item['data_debito']), 1); // Convertendo para ISO-8859-1
            $pdf->Cell(20, 10, utf8_decode($item['status']), 1); // Convertendo para ISO-8859-1
            $pdf->Ln();
        }
        
        $pdf->Output('D', 'Relatorio_Transacoes.pdf'); // Gera o PDF
        
    }

    public function usuariosSelecionar() {

        try {
            $inserirDebito = new TransacaoModel();
            $resultado = $inserirDebito->usuariosBuscar();
            //var_dump($resultado['usuario_id']);
            //header('Location: http://localhost/deucerto/phpup/Model_View_Controller/adminpainel');

            $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views/admin'); // Coloque o caminho correto
            $twig = new \Twig\Environment($loader);
            
            // Passa os dados para o template
            // echo $this->twig->render('painel.php', [ 
            //     'listaUsuario' => $resultado,
            // ]);

            return $resultado;
        } catch (\Throwable $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function alterar() {
        
        $uri = $_SERVER['REQUEST_URI'];

        $url = explode('/', trim($uri));

        //$id = $url[6] ?? '';

        $dados = $_POST;
        
        try {
            $del = new AdminPainelModel();
            $del->alterar($dados);
            header('Location:http://localhost/deucerto/phpup/Model_View_Controller/adminpainel');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function excluir() {

        $uri = $_SERVER['REQUEST_URI'];

        $url = explode('/', trim($uri));

        $id = $url[6] ?? '';
        
        try {
            $del = new AdminPainelModel();
            $del->excluir($id);
            header('Location:http://localhost/deucerto/phpup/Model_View_Controller/adminpainel');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}