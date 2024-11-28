<?php
session_start();
include_once(__DIR__ . '/config.php'); // Inclui configurações globais e funções de conexão
$con = Connect::getInstance();
if (isset($_SESSION['cliente_id'])) {
    $userId = $_SESSION['cliente_id'];
    $nomeUsuario = $_SESSION['nomeUsuario'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fale Conosco</title>
    <link rel="stylesheet" href="/bookersgalaxy/css/faleconosco.css">
</head>

<body>
    <div class="container-chefe">
        <form action="modulos/enviarcomentario.php" method="POST">
            <div class="input-grid">
                <input type="text" name="nome" placeholder="Nome completo" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="tema" placeholder="Tema" required>
                <textarea name="comentario" placeholder="Insira seu comentário" required></textarea>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>

    <?php
    include_once("modulos/footer.php");
    ?>
</body>

</html>