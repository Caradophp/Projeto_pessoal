<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class SendEmail {
    
    private $mail;

    public function configurarEmail($email, $senha)
    {
        $this->mail = new PHPMailer(true);

        // Configurações do servidor SMTP
        $this->mail->isSMTP();
        $this->mail->Host       = 'smtp.gmail.com';
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = $email; // Seu email
        $this->mail->Password   = $senha; // Sua senha
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->Port       = 465;

        // Remetente
        $this->mail->setFrom('seuemail@gmail.com', 'Seu Nome');

        // Configurações padrão
        $this->mail->isHTML(true);
    }

    public function enviarEmail($destinatario, $nomeDestinatario, $assunto, $mensagemHtml, $mensagemTexto = '')
    {
        try {
            // Destinatário
            $this->mail->addAddress($destinatario, $nomeDestinatario);

            // Conteúdo do e-mail
            $this->mail->Subject = $assunto;
            $this->mail->Body    = $mensagemHtml;
            $this->mail->AltBody = $mensagemTexto ?: strip_tags($mensagemHtml);

            // Enviar
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            // Você pode salvar esse erro no log se quiser
            error_log('Erro ao enviar email: ' . $this->mail->ErrorInfo);
            return false;
        }
    }

    public function adicionarAnexo($caminho, $nome = '')
    {
        $this->mail->addAttachment($caminho, $nome);
    }
}

?>