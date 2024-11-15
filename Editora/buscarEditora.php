<?php
// Incluindo as configurações e funções globais
include_once(__DIR__ . '/../config.php');
$con = Connect::getInstance();

$editoras = [];
$excluido = false; // Variável para verificar se a exclusão foi bem-sucedida

// Processamento de pesquisa
if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $stmt = $con->prepare("SELECT id_editora, nome, pais FROM editora WHERE nome LIKE ? ORDER BY nome");
    $stmt->execute(['%' . $pesquisa . '%']);
    $editoras = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $stmt = $con->prepare("SELECT id_editora, nome, pais FROM editora ORDER BY nome");
    $stmt->execute();
    $editoras = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Processamento da exclusão
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir_id'])) {
    $editora_id = filter_input(INPUT_POST, 'excluir_id', FILTER_SANITIZE_NUMBER_INT);

    try {
        $stmt = $con->prepare("DELETE FROM editora WHERE id_editora = ?");
        $stmt->execute([$editora_id]);
        $excluido = true; // Indica que a editora foi excluída com sucesso
    } catch (Exception $e) {
        echo "<p>Erro ao excluir a editora: " . htmlspecialchars($e->getMessage()) . "</p>";
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
    <title>Buscar Editora</title>
    <script>
        // Refresh automático após exclusão
        function refreshPage() {
            setTimeout(() => {
                window.location.href = "buscarEditora.php";
            }, 1500); // Tempo em milissegundos antes do refresh
        }
    </script>
</head>
<body>

    <main>
        <h1>Buscar Editora</h1>

        <!-- Formulário de Pesquisa -->
        <form method="GET" action="buscarEditora.php">
            <input type="text" name="pesquisa" placeholder="Buscar por nome" value="<?= isset($_GET['pesquisa']) ? htmlspecialchars($_GET['pesquisa']) : '' ?>">
            <button type="submit">Buscar</button>
        </form>

        <h2>Editoras Encontradas:</h2>
        <ul>
            <?php if ($editoras): ?>
                <?php foreach ($editoras as $editora): ?>
                    <li>
                        <?= htmlspecialchars($editora['nome']) ?> - <?= htmlspecialchars($editora['pais']) ?>
                        <div class="acoes">
                            <button class="alterar">
                                <a href="alterarEditora.php?id=<?= $editora['id_editora'] ?>">Alterar</a>
                            </button>
                            <form method="POST" action="buscarEditora.php" style="display: inline;">
                                <input type="hidden" name="excluir_id" value="<?= $editora['id_editora'] ?>">
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esta editora?')">Excluir</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Nenhuma editora encontrada.</li>
            <?php endif; ?>
        </ul>

        <?php if ($excluido): ?>
            <div class="mensagem sucesso">
                Editora excluída com sucesso!
            </div>
            <script>refreshPage();</script>
        <?php endif; ?>

    </main>
    <a href="../MenuAdm.php">Voltar ao menu</a>
</body>
</html>
