<?php
include_once(__DIR__ . '/../config.php'); // Inclui todas as configurações e funções globais
$con = Connect::getInstance();

$livros = [];
if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
    // Realizar a busca por título do livro
    $pesquisa = $_GET['pesquisa'];
    $stmt = $con->prepare("SELECT id_livro, Titulo, Autor FROM livros WHERE Titulo LIKE ? ORDER BY Titulo");
    $stmt->execute(['%' . $pesquisa . '%']);
    $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Exibir todos os livros caso não haja busca
    $stmt = $con->prepare("SELECT id_livro, Titulo, Autor FROM livros ORDER BY Titulo");
    $stmt->execute();
    $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modulos.css">
    <title>Buscar Livro</title>
</head>

<body>

<main>
    <h1>Buscar Livro</h1>

    <!-- Formulário de Pesquisa -->
    <form method="GET" action="buscarLivro.php">
        <input type="text" name="pesquisa" placeholder="Buscar por título" value="<?= isset($_GET['pesquisa']) ? htmlspecialchars($_GET['pesquisa']) : '' ?>">
        <button type="submit">Buscar</button>
    </form>

    <h2>Livros Encontrados:</h2>
    <ul>
        <?php if ($livros): ?>
            <?php foreach ($livros as $livro): ?>
                <li>
                    <?= htmlspecialchars($livro['Titulo']) ?> - <?= htmlspecialchars($livro['Autor']) ?>
                    <a href="alterarLivro.php?id=<?= $livro['id_livro'] ?>">Alterar</a>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Nenhum livro encontrado.</li>
        <?php endif; ?>
    </ul>
</main>

</body>
</html>
