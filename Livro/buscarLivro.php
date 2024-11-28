<?php
include_once(__DIR__ . '/../config.php'); // Inclui todas as configurações e funções globais
$con = Connect::getInstance();

$livros = [];
$excluido = false; // Variável para verificar se a exclusão foi bem-sucedida

if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $stmt = $con->prepare("SELECT id_livro, Titulo, Autor FROM livros WHERE Titulo LIKE ? ORDER BY Titulo");
    $stmt->execute(['%' . $pesquisa . '%']);
    $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $stmt = $con->prepare("SELECT id_livro, Titulo, Autor FROM livros ORDER BY Titulo");
    $stmt->execute();
    $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir_id'])) {
    $livro_id = filter_input(INPUT_POST, 'excluir_id', FILTER_SANITIZE_NUMBER_INT);

    try {
        $stmt = $con->prepare("DELETE FROM livros WHERE id_livro = ?");
        $stmt->execute([$livro_id]);
        $excluido = true;
    } catch (Exception $e) {
        echo "<p>Erro ao excluir o livro: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modulos.css">
    <link rel="stylesheet" href="../css/buscar.css">
    <title>Buscar Livro</title>
</head>

<body>
    <main>
        <h1>Buscar Livro</h1>

        <form method="GET" action="buscarLivro.php">
            <input type="text" name="pesquisa" placeholder="Buscar por título" value="<?= isset($_GET['pesquisa']) ? htmlspecialchars($_GET['pesquisa']) : '' ?>">
            <button type="submit">Buscar</button>
        </form>

        <h2>Livros Encontrados:</h2>
        <ul>
            <?php if ($livros): ?>
                <?php foreach ($livros as $livro): ?>
                    <li>
                        <span><?= htmlspecialchars($livro['Titulo']) ?> - <?= htmlspecialchars($livro['Autor']) ?></span>
                        <div>
                            <button class="alterar">
                                <a href="alterarLivro.php?id=<?= $livro['id_livro'] ?>">Alterar</a>
                            </button>
                            <form method="POST" action="buscarLivro.php" style="display: inline;">
                                <input type="hidden" name="excluir_id" value="<?= $livro['id_livro'] ?>">
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este livro?')">Excluir</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Nenhum livro encontrado.</li>
            <?php endif; ?>
        </ul>
    </main>

    <?php if ($excluido): ?>
        <script>
            alert('Livro excluído com sucesso!');
            window.location.href = 'buscarLivro.php';
        </script>
    <?php endif; ?>
</body>

</html>
