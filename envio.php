<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Validação de busca do formulário em contato.php
if(isset($_POST['enviar'])) {

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$mainUsername = 'juninholiu10@gmail.com';

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  //Enable verbose debug output
    $mail->isSMTP();    //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';   //Set the SMTP server to send through
    $mail->SMTPAuth   = true;   //Enable SMTP authentication
    $mail->Username   = $mainUsername;   //SMTP username
    $mail->Password   = 'rxxe ieyc gifu gwzm';  //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;    //Enable implicit TLS encryption
    $mail->Port       = 465;    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($mainUsername, $_POST['nome_quem_vai_enviar']);
    $mail->addAddress( $_POST['email_destinatario'], 'Meu outro e-mail');   //Add quem receberá o e-mail
    //$mail->addReplyTo('juninholiu10@gmail.com', 'Information');

    //Adicionar anexos no email
//$mail->addAttachment('/var/tmp/file.tar.gz');
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');

    //Content
    $mail->isHTML(true);
    $mail->Subject = $_POST['assunto'];

    //$mail->body pode receber HTML normalmente
    $body = "<h1>TESTANDO ENVIO DE EMAIL<h1>";

    $mail->Body = $body;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // Esse é bom para evitar de cair no Spam por não utiçizar o formato HTML. O Ruim é que não dá pra utilizar HTML...

    $mail->send();
    echo 'E-mail enviado com Sucesso!';
} catch (Exception $e) {
    echo "Não foi possível enviar o email. Verificaro motivo: {$mail->ErrorInfo}";
}
} else{
    echo "Erro ao enviar e-mail, acesso não foi via formulário";
}