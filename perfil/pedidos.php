<?php
    session_start();
    include_once(__DIR__ . '/../config.php'); // Inclui todas as configurações e funções globais
    $con = Connect::getInstance();
    if (isset($_SESSION['cliente_id'])) {
        $userId = $_SESSION['cliente_id'];
    }
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil.css">
    <title>Pedidos</title>
</head>
<body>
    <main id="corpo">
        <h1>PEDIDOS</h1>
        <section class="pedido">
            <h2>Pedido: [NOME DO PRODUTO]</h2>
            <div class="pedidoContainer">
                <img src="../img/usuario/placeholder.png" alt="placeholder.png">
                <div class="timeline">
                    <span class="timelineContainer active">
                        <p>Pedido feito. (HORAS)</p>
                        <p class="desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia nesciunt minus soluta qui ducimus error quidem saepe, natus, corrupti dolor sapiente, labore ipsam provident dolorum dicta molestiae aut est repudiandae.</p>
                    </span>
                    <span class="timelineContainer">
                        <p>Pedido feito. (HORAS)</p>
                        <p class="desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia nesciunt minus soluta qui ducimus error quidem saepe, natus, corrupti dolor sapiente, labore ipsam provident dolorum dicta molestiae aut est repudiandae.</p>
                    </span>
                    <span class="timelineContainer">
                        <p>Pedido feito. (HORAS)</p>
                        <p class="desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia nesciunt minus soluta qui ducimus error quidem saepe, natus, corrupti dolor sapiente, labore ipsam provident dolorum dicta molestiae aut est repudiandae.</p>
                    </span>
                </div>
            </div>
        </section>
    </main>
</body>
</html>