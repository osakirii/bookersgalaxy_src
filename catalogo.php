<?php
session_start();
include_once(__DIR__ . '/config.php'); // Inclui todas as configurações e funções globais
$con = Connect::getInstance();
if (isset($_SESSION['cliente_id'])) {
    $userId = $_SESSION['cliente_id'];
    echo $userId;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Catálogo de [X]</title>
</head>
<body>
    <main id="corpo">
        <h1>CATÁLOGO DE [X]</h1>
        <div id="catalogo">
        <?php
            $livros = BuscaLivro(); // Chama a função BuscaLivro()

            // Verifica se encontrou livros
            if ($livros) {
                foreach ($livros as $livro) {
                    echo '<div class="livro">';
                    echo '<a href="Livro.php?id_livro=' . urlencode($livro['id_livro']) . '">';
                    echo '<img src="/bookersgalaxy/' . htmlspecialchars($livro['path']) . '" alt="Imagem de ' . htmlspecialchars($livro['Titulo']) . '">';
                    echo '</a>';
                    echo '<div class="livro-texto">';
                    echo '<p class="nomeAutor">' . htmlspecialchars($livro['Autor']) . '</p>';
                    echo '<p>' . htmlspecialchars($livro['Titulo']) . '</p>';
                    echo '<p class="valor">R$ ' . htmlspecialchars(number_format($livro['Preco'], 2, ',', '.'));
                    echo '</div></div>';
                }
            } else {
                echo 'Nenhum livro encontrado para exibir.';
            }
            ?>
        </div>
    </main>
</body>
</html>