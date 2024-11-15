<?php
include_once(__DIR__ . '/../config.php'); // Configuration and global functions
$con = Connect::getInstance(); // Database connection instance
include_once(__DIR__ . '/../modulos/callimg.php'); // Includes BuscaLivro and Busca functions

// Define the book ID to fetch a specific book, or leave as null to fetch all books
$id_livro = null; 
$todasImagens = false; // true to show all images, false for only the cover

// Fetch books based on criteria
$livros = BuscaLivro($id_livro, $todasImagens);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibição de Livros</title>
    <link rel="stylesheet" href="../css/tabela.css">
    <style>
        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        /* Scrollable synopsis */
        .sinopse {
            max-height: 60px !important;
            overflow-y: auto;
            font-size: 0.9em;
            line-height: 1.2em;
        }
    </style>
</head>

<body>

    <main>
        <h1>Lista de Livros</h1>
        <?php if (!empty($livros)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Capa</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Data de Lançamento</th>
                        <th>Quantidade de Páginas</th>
                        <th>Sinopse</th>
                        <th>Preço</th>
                        <th>Gênero</th>
                        <th>Editora</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($livros as $livro): ?>
                        <tr>
                            <td>
                                <img src="<?php echo htmlspecialchars(Busca($livro['id_livro'])); ?>" alt="Capa do Livro" width="100" height="150">
                            </td>
                            <td><?php echo htmlspecialchars($livro['Titulo']); ?></td>
                            <td><?php echo htmlspecialchars($livro['Autor']); ?></td>
                            <td><?php echo htmlspecialchars($livro['Data_lancamento']); ?></td>
                            <td><?php echo htmlspecialchars($livro['QntPaginas']); ?></td>
                            <td class="sinopse"><?php echo htmlspecialchars($livro['Sinopse']); ?></td>
                            <td>R$ <?php echo number_format($livro['Preco'], 2, ',', '.'); ?></td>
                            <td><?php echo htmlspecialchars($livro['Genero']); ?></td>
                            <td><?php echo htmlspecialchars($livro['NomeEditora']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum livro encontrado.</p>
        <?php endif; ?>
    </main>

</body>

</html>
