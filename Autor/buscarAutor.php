<?php
include_once(__DIR__ . '/../config.php'); // Inclui configurações e funções globais
$con = Connect::getInstance();

$autores = [];
$excluido = false; // Variável para verificar se a exclusão foi bem-sucedida

// Verifica se há uma pesquisa
if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $stmt = $con->prepare("SELECT ID_autor, nome, nacionalidade FROM autor WHERE nome LIKE ? ORDER BY nome");
    $stmt->execute(['%' . $pesquisa . '%']);
    $autores = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $stmt = $con->prepare("SELECT ID_autor, nome, nacionalidade FROM autor ORDER BY nome");
    $stmt->execute();
    $autores = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Verifica se é uma requisição POST para exclusão
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir_id'])) {
    $autor_id = filter_input(INPUT_POST, 'excluir_id', FILTER_SANITIZE_NUMBER_INT);

    try {
        $stmt = $con->prepare("DELETE FROM autor WHERE ID_autor = ?");
        $stmt->execute([$autor_id]);
        $excluido = true;
    } catch (Exception $e) {
        echo "<p>Erro ao excluir o autor: " . htmlspecialchars($e->getMessage()) . "</p>";
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
    <title>Buscar Autor</title>
</head>

<body>
    <main>
        <h1>Buscar Autor</h1>

        <!-- Formulário de busca -->
        <form method="GET" action="buscarAutor.php">
            <input type="text" name="pesquisa" placeholder="Buscar por nome" value="<?= isset($_GET['pesquisa']) ? htmlspecialchars($_GET['pesquisa']) : '' ?>">
            <button type="submit">Buscar</button>
        </form>

        <h2>Autores Encontrados:</h2>
        <ul>
            <?php if ($autores): ?>
                <?php foreach ($autores as $autor): ?>
                    <li>
                        <span><?= htmlspecialchars($autor['nome']) ?> - <?= htmlspecialchars($autor['nacionalidade']) ?></span>
                        <div>
                            <!-- Botão para alterar -->
                            <button class="alterar">
                                <a href="alterarAutor.php?id=<?= $autor['ID_autor'] ?>">Alterar</a>
                            </button>
                            <!-- Formulário para excluir -->
                            <form method="POST" action="buscarAutor.php" style="display: inline;">
                                <input type="hidden" name="excluir_id" value="<?= $autor['ID_autor'] ?>">
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este autor?')">Excluir</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Nenhum autor encontrado.</li>
            <?php endif; ?>
        </ul>
    </main>

    <?php if ($excluido): ?>
        <script>
            alert('Autor excluído com sucesso!');
            window.location.href = 'buscarAutor.php';
        </script>
    <?php endif; ?>
</body>

</html>
