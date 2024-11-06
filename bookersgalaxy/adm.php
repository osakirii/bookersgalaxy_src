<?php
    include_once 'modulos/header.php';
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
            <button><a href="uploadLivro.php">Adicionar novo Livro</a></button>
            <button><a href="uploadLivro.php">Ver livros</a></button>
            <button><a href="uploadLivro.php">Alterar Livro</a></button>
            <button><a href="uploadLivro.php">Excluir Livro</a></button>
            
        </main>
        
        <?php
            include_once 'modulos/footer.php';
        ?>
    </body>
</html>