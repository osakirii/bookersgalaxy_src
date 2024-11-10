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
        <link rel="stylesheet" href="../css/perfil.css">
        <link rel="stylesheet" href="../css/modulos.css">
        <title>Perfil</title>
    </head>
    <body>
        <main id="corpo">
            <h1>MEU PERFIL</h1>

            <div id="perfil">
                <img src="../img/usuario/placeholder.png" alt="placeholder.png">
                <div class="perfilContainer">
                    <p>| JORGE VALENTIM</p>
                    <p>| Biografia: x x x x x xxxxx xxxxxxxxx xxx xxx xxxxx xx xxx xxxx x xx
                         xxxxxx xx xx xxx xx xx xxxxxx x x x x x </p>
                    <span>
                        <i class="fas fa-pen-to-square"></i><p>Editar Perfil</p>
                        </span>
                    <span>
                        <i class="fas fa-address-book"></i><p>Dados Pessoais</p>
                        </span>
                </div>
                <div class="perfilContainer">
                    <span>
                        <i class="fas fa-cart-shopping"></i><p>Carrinho</p>
                        </span>
                    <span>
                        <i class="fas fa-location-dot"></i><p>Endereços Cadastrados</p>
                        </span>
                    <span>
                        <i class="fas fa-credit-card"></i><p>Cartões Cadastrados</p>
                        </span>
                    <span>
                        <i class="fas fa-boxes-packing"></i><p>Pedidos</p>
                        </span>
                    <span>
                        <i class="far fa-heart"></i><p>Favoritos</p>
                        </span>
                </div>
            </div>
        </main>
    </body>
</html>