<?php
session_start();
include_once('../config.php');

if (!isset($_SESSION['cliente_id'])) {
    echo "Faça login para visualizar seus favoritos.";
    exit;
}

$clienteId = $_SESSION['cliente_id'];

try {
    $con = Connect::getInstance();

    $query = $con->prepare("
        SELECT l.*
        FROM favoritos f
        JOIN livros l ON f.id_livro = l.id
        WHERE f.id_usuario = ? AND f.estado = 1
        ORDER BY f.data_adicao DESC
    ");
    $query->execute([$clienteId]);
    $favoritos = $query->fetchAll();
} catch (PDOException $e) {
    echo "Erro: " . htmlspecialchars($e->getMessage());
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Favoritos</title>
    <link rel="stylesheet" href="/bookersgalaxy/css/favoritos.css">
</head>

<body>
    <h1>Meus Livros Favoritos</h1>
    <div class="favoritos-container">
        <?php if ($favoritos): ?>
            <?php foreach ($favoritos as $livro): ?>
                <div class="livro-card">
                    <img src="<?php echo htmlspecialchars($livro['imagem']); ?>" alt="Capa de <?php echo htmlspecialchars($livro['Titulo']); ?>">
                    <h3><?php echo htmlspecialchars($livro['Titulo']); ?></h3>
                    <p><?php echo htmlspecialchars($livro['Autor']); ?></p>
                    <button onclick="removerFavorito(<?php echo $livro['id']; ?>)">Remover dos Favoritos</button>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Você ainda não adicionou livros aos favoritos.</p>
        <?php endif; ?>
    </div>

    <script>
        function removerFavorito(livroId) {
            fetch('favoritar.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ livro_id: livroId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    location.reload(); // Recarrega a página
                } else {
                    alert(data.error);
                }
            })
            .catch(error => console.error('Erro:', error));
        }
    </script>
</body>

</html>
