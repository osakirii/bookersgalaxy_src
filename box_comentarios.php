<?php
session_start();

if (!isset($_SESSION['cliente_id'])) {
    echo "Você precisa estar logado para visualizar os comentários.";
    exit();
}

$cliente_id = $_SESSION['cliente_id']; // ID do cliente logado
?>
       
       <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Comentários</title>
            <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
            <style>

            </style>
        </head>
        <body>

        <div class="form_container">
            <h2>Cadastrar Comentário</h2>
            <form action="cadastrarcomentarios.php" method="POST" enctype="multipart/form-data">
                <div class="form_group">
                    <label for="nota">Nota (1 a 5)</label>
                    <input type="number" id="nota" name="nota" min="1" max="5" required>
                </div>
                <div class="form_group">
                    <label for="texto">Comentário</label>
                    <textarea id="texto" name="texto" rows="4" required></textarea>
                </div>
                <div class="form_group">
                    <label>Imagens (Máximo de 5)</label>
                    <input type="file" name="imagens[]" accept="image/*" multiple>
                </div>
                <div class="form_group">
                    <button type="submit">Enviar Comentário</button>
                </div>
            </form>


        </body>
        </html>
