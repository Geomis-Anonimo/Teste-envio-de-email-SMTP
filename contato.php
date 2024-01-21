<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fale Conosco</title>
</head>
<body>
    <form action="envio.php" method="post">
<div>
    <input type="text" name="nome_quem_vai_enviar" placeholder="Nome de quem vai enviar">
</div>
<div>
    <input type="email" name="email_destinatario" placeholder="E-mail de quem vai receber">
</div>
<div>
    <input type="text" name="assunto" placeholder="Assunto do e-mail">
</div>
<div>
    <textarea name="msg"></textarea>
</div>
<input type="submit" name="enviar">
    </form>
</body>
</html>