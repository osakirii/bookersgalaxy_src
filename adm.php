<?php
    include_once(__DIR__ . '/config.php'); // Inclui todas as configurações e funções globais
    include_once("modulos/loadingscreen.php");
    $con = Connect::getInstance();

?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booker's Galaxy: ADM</title>
    </head>
    <body>
        <main id="corpo">
            <h1>Sala da Administração</h1>
            <h2>Livros</h2>
            <button><a href="Livro/uploadLivro.php">Adicionar um novo Livro</a></button><br>
            <button><a href="uploadLivro.php">Ver livros</a></button><br>
            <button><a href="uploadLivro.php">Alterar Livro</a></button><br>
            <button><a href="uploadLivro.php">Excluir Livro</a></button><br>
            
            <h2>Editora</h2>
            <button><a href="Editora/uploadEditora.php">Adicionar uma nova Editora</a></button><br>
            <button><a href="uploadLivro.php">Ver Editoras</a></button><br>
            <button><a href="uploadLivro.php">Alterar Editora</a></button><br>
            <button><a href="uploadLivro.php">Excluir Editora</a></button><br>

            <h2>Site</h2>
            <button><a href="Editora/uploadEditora.php">Adicionar </a></button><br>
            <button><a href="uploadLivro.php">Ver Editoras</a></button><br>
            <button><a href="uploadLivro.php">Alterar Editora</a></button><br>
            <button><a href="uploadLivro.php">Excluir Editora</a></button><br>
        </main>
        
        <?php
        ?>
    </body>
</html>