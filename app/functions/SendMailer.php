<?php

namespace app\functions;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use app\Models\loginModel;

// require_once '../../vendor/autoload.php';

class SendMailer {
    
    private $mail;

    private $host = 'smtp.gmail.com';
    private $username = 'contatolucianofriebe@gmail.com';
    private $password = 'fink sfcf eosb otaj';
    private $port = 587;

    public function __construct() {
        $this->mail = new PHPMailer(true);

        $this->mail->isSMTP();
        $this->mail->Host = $this->host;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $this->username;
        $this->mail->Password = $this->password;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = $this->port;
    }

    public function enviarCodigo($emailDestinatario) {
        try {
            $codigo = mt_rand(100000, 999999);

            loginModel::salvarCodigo($emailDestinatario, $codigo);

            $this->mail->setFrom($this->username, 'Suporte FinanTech');
            $this->mail->addAddress($emailDestinatario);

            $this->mail->CharSet = 'UTF-8';
            $this->mail->Encoding = 'base64';

            $this->mail->Subject = 'Recuperação de senha';
            $this->mail->Body = "Seu código de recuperação de senha é: " . $codigo;

            $this->mail->send();

            return $codigo;
        } catch (Exception $e) {
            echo json_encode( ["Erro", "Erro ao enviar email: " . $this->mail->ErrorInfo]);
            return false;
        }
    }
}

?>
