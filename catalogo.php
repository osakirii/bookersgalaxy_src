<?php
session_start();
include_once(__DIR__ . '/config.php'); // Inclui configurações e funções globais
$con = Connect::getInstance();

// Verifica se há uma consulta de pesquisa na URL
$query = isset($_GET['q']) ? trim($_GET['q']) : '';

// Atualizando a função BuscaLivro para incluir o filtro de pesquisa
function BuscaLivroPorTitulo($titulo = '') {
    global $pdo;
    
    $sql = "
        SELECT 
            arquivos.path,  
            livros.Titulo, 
            livros.Autor, 
            livros.Data_lancamento,
            livros.QntPaginas,
            livros.Sinopse,
            livros.Preco, 
            livros.Estoque, 
            livros.Avaliacao, 
            livros.id_livro,
            genero.Genero AS Genero,
            editora.nome AS NomeEditora
        FROM arquivos 
        INNER JOIN livros 
            ON livros.id_livro = arquivos.livro_id 
        INNER JOIN genero 
            ON livros.id_categoria = genero.id_categoria
        INNER JOIN editora
            ON livros.id_editora = editora.id_editora
        WHERE arquivos.is_capa = 1
    ";
    
    if (!empty($titulo)) {
        $sql .= " AND livros.Titulo LIKE :titulo";
    }

    $sql .= " LIMIT 15";

    $stmtImagem = $pdo->prepare($sql);

    if (!empty($titulo)) {
        $stmtImagem->bindValue(':titulo', '%' . $titulo . '%', PDO::PARAM_STR);
    }

    $stmtImagem->execute();

    return $stmtImagem->fetchAll(PDO::FETCH_ASSOC);
}

// Busca os livros usando a função atualizada
$livros = BuscaLivroPorTitulo($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Catálogo de Livros</title>
</head>
<body>
    <main id="corpo">
        <h1>CATÁLOGO DE LIVROS</h1>
        <div id="catalogo">
        <?php
        if (!empty($query)) {
            echo '<h2>Resultados para: "' . htmlspecialchars($query) . '"</h2>';
        }

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
                echo '<p class="valor">R$ ' . htmlspecialchars(number_format($livro['Preco'], 2, ',', '.')) . '</p>';
                echo '</div></div>';
            }
        } else {
            echo '<p>Nenhum livro encontrado.</p>';
        }
        ?>
        </div>
    </main>
</body>
</html>
