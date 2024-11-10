<?php
    include_once("callimg.php");
$pdo = Connect::getInstance();
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/modulos.css">
        <script src="../js/modulos.js"></script>
    </head>
    <body>
        <div id="loadingscreen">
                <h1>Booker's Galaxy</h1>
                <h2>Carregando...</h2>
            <img src="<?php echo Busca(2,) ?>">
        </div>
    </body>
</html>