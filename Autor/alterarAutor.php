<?php
include_once(__DIR__ . '/../config.php'); // Inclui configurações e funções globais
$con = Connect::getInstance();

// Variáveis para mensagens de erro ou sucesso
$erro = false;
$sucesso = false;

// Verifica se o ID foi passado na URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_autor = $_GET['id'];

    // Busca os dados do autor para preencher o formulário
    $stmt = $con->prepare("SELECT ID_autor, nome, nacionalidade, data_nascimento, bio FROM autor WHERE ID_autor = ?");
    $stmt->execute([$id_autor]);
    $autor = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o autor existe
    if (!$autor) {
        die('Autor não encontrado!');
    }

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $nacionalidade = filter_input(INPUT_POST, 'nacionalidade', FILTER_SANITIZE_STRING);
        $data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);
        $bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_STRING);

        // Validação simples
        if (empty($nome) || empty($nacionalidade) || empty($data_nascimento) || empty($bio)) {
            $erro = "Por favor, preencha todos os campos.";
        } else {
            // Atualiza os dados no banco de dados
            $stmt = $con->prepare("UPDATE autor SET nome = ?, nacionalidade = ?, data_nascimento = ?, bio = ? WHERE ID_autor = ?");
            $stmt->execute([$nome, $nacionalidade, $data_nascimento, $bio, $id_autor]);

            // Verifica se a atualização foi bem-sucedida
            if ($stmt->rowCount() > 0) {
                $sucesso = "Autor atualizado com sucesso!";
            } else {
                $erro = "Nenhuma alteração realizada.";
            }
        }
    }
} else {
    die('ID do autor não fornecido.');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modulos.css">
    <link rel="stylesheet" href="../css/upload.css">
    <title>Alterar Autor</title>
</head>
<body>
    <main>
        <h1>Alterar Autor</h1>

        <?php if ($erro): ?>
            <div style="color: red;">
                <p><?= htmlspecialchars($erro) ?></p>
            </div>
        <?php endif; ?>

        <?php if ($sucesso): ?>
            <div style="color: green;">
                <p><?= htmlspecialchars($sucesso) ?></p>
                <a href="buscarAutor.php">Voltar para a lista de autores</a>
            </div>
        <?php else: ?>
            <!-- Formulário de Alteração -->
            <form id="formLivro" method="POST" action="alterarAutor.php?id=<?= $autor['ID_autor'] ?>">
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($autor['nome']) ?>" required>
                </div>
                <div>
                    <label for="nacionalidade">Nacionalidade:</label>
                    <input type="text" id="nacionalidade" name="nacionalidade" value="<?= htmlspecialchars($autor['nacionalidade']) ?>" required>
                </div>
                <div>
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" id="data_nascimento" name="data_nascimento" value="<?= htmlspecialchars($autor['data_nascimento']) ?>" required>
                </div>
                <div>
                    <label for="bio">Biografia:</label>
                    <textarea id="bio" name="bio" rows="6" required><?= htmlspecialchars($autor['bio']) ?></textarea>
                </div>
                <button type="submit">Alterar</button>
            </form>
        <?php endif; ?>
    </main>
</body>
</html>
