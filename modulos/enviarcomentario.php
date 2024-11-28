<?php
// Inclua manualmente os arquivos necessários do PHPMailer
require __DIR__ . '/../PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/../PHPMailer-master/src/SMTP.php';
require __DIR__ . '/../PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $tema = htmlspecialchars($_POST['tema']);
    $comentario = htmlspecialchars($_POST['comentario']);

    // Instância do PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'bookersgalaxy@gmail.com'; // E-mail do Bookers Galaxy
        $mail->Password = 'bookersgalaxy123'; // Senha do e-mail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configurações do remetente e destinatário
        $mail->setFrom($email, $nome); // Remetente será o usuário que comentou
        $mail->addAddress('bookersgalaxy@gmail.com', 'Bookers Galaxy'); // O e-mail do Bookers Galaxy receberá a mensagem
        $mail->addReplyTo($email, $nome); // Permite que Bookers Galaxy responda ao remetente (usuário)

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = "Mensagem de: $nome - Tema: $tema";
        $mail->Body = "
            <h1>Nova mensagem do formulário de contato</h1>
            <p><strong>Nome:</strong> $nome</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Tema:</strong> $tema</p>
            <p><strong>Comentário:</strong> $comentario</p>
        ";

        // Envia o e-mail
        $mail->send();
        echo "E-mail enviado com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }
} else {
    echo "Método inválido.";
}
?>
