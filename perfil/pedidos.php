<?php
    session_start();
    include_once(__DIR__ . '/../config.php'); // Inclui todas as configurações e funções globais
    $con = Connect::getInstance();
    if (isset($_SESSION['cliente_id'])) {
        $userId = $_SESSION['cliente_id'];
        echo $userId;
    }
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>
<body>
    
</body>
</html>