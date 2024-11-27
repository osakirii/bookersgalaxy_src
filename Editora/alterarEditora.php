<?php
include_once(__DIR__ . '/../config.php'); // Inclui configurações e funções globais
$con = Connect::getInstance();

// Variáveis para mensagens de erro ou sucesso
$erro = false;
$sucesso = false;

// Verifica se o ID foi passado na URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_editora = $_GET['id'];

    // Busca os dados da editora para preencher o formulário
    $stmt = $con->prepare("SELECT id_editora, nome, pais, email, telefone, cnpj FROM editora WHERE id_editora = ?");
    $stmt->execute([$id_editora]);
    $editora = $stmt->fetch(PDO::FETCH_ASSOC);

    // Busca os dados de endereço da editora
    $stmt_endereco = $con->prepare("SELECT id_endereco, tipo_endereco, endereco_rua, endereco_numero, endereco_bairro, endereco_cep, estado, cidade FROM enderecos_editora WHERE id_editora = ?");
    $stmt_endereco->execute([$id_editora]);
    $enderecos = $stmt_endereco->fetchAll(PDO::FETCH_ASSOC);

    // Verifica se a editora existe
    if (!$editora) {
        die('Editora não encontrada!');
    }

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $pais = filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
        $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);

        $tipo_endereco = filter_input(INPUT_POST, 'tipo_endereco', FILTER_SANITIZE_STRING);
        $endereco_rua = filter_input(INPUT_POST, 'endereco_rua', FILTER_SANITIZE_STRING);
        $endereco_numero = filter_input(INPUT_POST, 'endereco_numero', FILTER_SANITIZE_STRING);
        $endereco_bairro = filter_input(INPUT_POST, 'endereco_bairro', FILTER_SANITIZE_STRING);
        $endereco_cep = filter_input(INPUT_POST, 'endereco_cep', FILTER_SANITIZE_STRING);
        $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
        $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);

        // Validação simples
        if (empty($nome) || empty($pais) || empty($email) || empty($cnpj) || empty($tipo_endereco) || empty($endereco_rua)) {
            $erro = "Por favor, preencha todos os campos.";
        } else {
            try {
                // Inicia a transação
                $con->beginTransaction();

                // Atualiza os dados da editora
                $stmt_editora = $con->prepare("UPDATE editora SET nome = ?, pais = ?, email = ?, telefone = ?, cnpj = ? WHERE id_editora = ?");
                $stmt_editora->execute([$nome, $pais, $email, $telefone, $cnpj, $id_editora]);

                // Atualiza os endereços da editora (considerando que é possível ter vários endereços)
                foreach ($enderecos as $endereco) {
                    $stmt_endereco_update = $con->prepare("UPDATE enderecos_editora SET tipo_endereco = ?, endereco_rua = ?, endereco_numero = ?, endereco_bairro = ?, endereco_cep = ?, estado = ?, cidade = ? WHERE id_endereco = ?");
                    $stmt_endereco_update->execute([
                        $tipo_endereco, 
                        $endereco_rua, 
                        $endereco_numero, 
                        $endereco_bairro, 
                        $endereco_cep, 
                        $estado, 
                        $cidade, 
                        $endereco['id_endereco']
                    ]);
                }

                // Comita a transação
                $con->commit();
                $sucesso = "Editora e endereços atualizados com sucesso!";
            } catch (Exception $e) {
                // Em caso de erro, faz o rollback da transação
                $con->rollBack();
                $erro = "Erro ao atualizar a editora e os endereços: " . $e->getMessage();
            }
        }
    }
} else {
    die('ID da editora não fornecido.');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modulos.css">
    <link rel="stylesheet" href="../css/upload.css">
    <title>Alterar Editora</title>
</head>
<body>
    <main>
        <h1>Alterar Editora</h1>

        <?php if ($erro): ?>
            <div style="color: red;">
                <p><?= htmlspecialchars($erro) ?></p>
            </div>
        <?php endif; ?>

        <?php if ($sucesso): ?>
            <div style="color: green;">
                <p><?= htmlspecialchars($sucesso) ?></p>
                <a href="buscarEditora.php">Voltar para a lista de editoras</a>
            </div>
        <?php else: ?>
            <!-- Formulário de Alteração -->
            <form id="formLivro" method="POST" action="alterarEditora.php?id=<?= $editora['id_editora'] ?>">
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($editora['nome']) ?>" required>
                </div>
                <div>
                    <label for="pais">País:</label>
                    <input type="text" id="pais" name="pais" value="<?= htmlspecialchars($editora['pais']) ?>" required>
                </div>
                <div>
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($editora['email']) ?>" required>
                </div>
                <div>
                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($editora['telefone']) ?>">
                </div>
                <div>
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" id="cnpj" name="cnpj" value="<?= htmlspecialchars($editora['cnpj']) ?>" required>
                </div>

                <h2>Endereços</h2>
                <?php foreach ($enderecos as $endereco): ?>
                    <div>
                        <input type="hidden" name="tipo_endereco" value="<?= htmlspecialchars($endereco['tipo_endereco']) ?>" required>
                    </div>
                    <div>
                        <label for="endereco_rua">Rua:</label>
                        <input type="text" name="endereco_rua" value="<?= htmlspecialchars($endereco['endereco_rua']) ?>" required>
                    </div>
                    <div>
                        <label for="endereco_numero">Número:</label>
                        <input type="text" name="endereco_numero" value="<?= htmlspecialchars($endereco['endereco_numero']) ?>">
                    </div>
                    <div>
                        <label for="endereco_bairro">Bairro:</label>
                        <input type="text" name="endereco_bairro" value="<?= htmlspecialchars($endereco['endereco_bairro']) ?>">
                    </div>
                    <div>
                        <label for="endereco_cep">CEP:</label>
                        <input type="text" name="endereco_cep" value="<?= htmlspecialchars($endereco['endereco_cep']) ?>">
                    </div>
                    <div>
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" value="<?= htmlspecialchars($endereco['estado']) ?>">
                    </div>
                    <div>
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" value="<?= htmlspecialchars($endereco['cidade']) ?>">
                    </div>
                <?php endforeach; ?>
                <button type="submit">Alterar</button>
            </form>
        <?php endif; ?>
    </main>
</body>
</html>
