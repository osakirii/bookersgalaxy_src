<?php
include_once(__DIR__ . '/../config.php'); // Inclui configurações e funções globais
$con = Connect::getInstance();

// Variáveis para mensagens de erro ou sucesso
$erro = false;
$sucesso = false;

// Verifica se o ID do livro foi passado na URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_livro = $_GET['id'];

    // Busca os dados do livro para preencher o formulário
    $stmt = $con->prepare("SELECT ID_livro, Titulo, Autor, Data_lancamento, QntPaginas, Sinopse, Preco, ISBN, id_categoria, id_editora 
                           FROM livros WHERE ID_livro = ?");
    $stmt->execute([$id_livro]);
    $livro = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o livro existe
    if (!$livro) {
        die('Livro não encontrado!');
    }

    // Busca todas as categorias para o campo select
    $stmt_categoria = $con->prepare("SELECT id_categoria, Genero FROM genero");
    $stmt_categoria->execute();
    $categorias = $stmt_categoria->fetchAll(PDO::FETCH_ASSOC);

    // Busca todas as editoras para o campo select
    $stmt_editora = $con->prepare("SELECT id_editora, nome FROM editora");
    $stmt_editora->execute();
    $editoras = $stmt_editora->fetchAll(PDO::FETCH_ASSOC);

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Titulo = filter_input(INPUT_POST, 'Titulo', FILTER_SANITIZE_STRING);
        $Autor = filter_input(INPUT_POST, 'Autor', FILTER_SANITIZE_STRING);
        $Data_lancamento = filter_input(INPUT_POST, 'Data_lancamento', FILTER_SANITIZE_STRING);
        $QntPaginas = filter_input(INPUT_POST, 'QntPaginas', FILTER_SANITIZE_NUMBER_INT);
        $Sinopse = filter_input(INPUT_POST, 'Sinopse', FILTER_SANITIZE_STRING);
        $Preco = filter_input(INPUT_POST, 'Preco', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $ISBN = filter_input(INPUT_POST, 'ISBN', FILTER_SANITIZE_STRING);
        $id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_SANITIZE_NUMBER_INT);
        $id_editora = filter_input(INPUT_POST, 'id_editora', FILTER_SANITIZE_NUMBER_INT);

        // Validação simples
        if (empty($Titulo) || empty($Autor) || empty($Data_lancamento) || empty($QntPaginas) || empty($Sinopse) || empty($Preco) || empty($id_categoria) || empty($id_editora)) {
            $erro = "Por favor, preencha todos os campos.";
        } else {
            // Atualiza os dados do livro no banco de dados
            $stmt = $con->prepare("UPDATE livros 
                                   SET Titulo = ?, Autor = ?, Data_lancamento = ?, QntPaginas = ?, Sinopse = ?, Preco = ?, ISBN = ?, id_categoria = ?, id_editora = ? 
                                   WHERE ID_livro = ?");
            $stmt->execute([$Titulo, $Autor, $Data_lancamento, $QntPaginas, $Sinopse, $Preco, $ISBN, $id_categoria, $id_editora, $id_livro]);

            // Verifica se a atualização foi bem-sucedida
            if ($stmt->rowCount() > 0) {
                $sucesso = "Livro atualizado com sucesso!";
            } else {
                $erro = "Nenhuma alteração realizada.";
            }
        }
    }
} else {
    die('ID do livro não fornecido.');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modulos.css">
    <link rel="stylesheet" href="../css/upload.css">
    <title>Alterar Livro</title>
</head>
<body>
    <main>
        <h1>Alterar Livro</h1>

        <?php if ($erro): ?>
            <div style="color: red;">
                <p><?= htmlspecialchars($erro) ?></p>
            </div>
        <?php endif; ?>

        <?php if ($sucesso): ?>
            <div style="color: green;">
                <p><?= htmlspecialchars($sucesso) ?></p>
                <a href="buscarLivro.php">Voltar para a lista de livros</a>
            </div>
        <?php else: ?>
            <!-- Formulário de Alteração -->
            <form id="formLivro" method="POST" action="alterarLivro.php?id=<?= $livro['ID_livro'] ?>">
                <div>
                    <label for="Titulo">Título:</label>
                    <input type="text" id="Titulo" name="Titulo" value="<?= htmlspecialchars($livro['Titulo']) ?>" required>
                </div>
                <div>
                    <label for="Autor">Autor:</label>
                    <input type="text" id="Autor" name="Autor" value="<?= htmlspecialchars($livro['Autor']) ?>" required>
                </div>
                <div>
                    <label for="Data_lancamento">Data de Lançamento:</label>
                    <input type="date" id="Data_lancamento" name="Data_lancamento" value="<?= htmlspecialchars($livro['Data_lancamento']) ?>" required>
                </div>
                <div>
                    <label for="QntPaginas">Quantidade de Páginas:</label>
                    <input type="number" id="QntPaginas" name="QntPaginas" value="<?= htmlspecialchars($livro['QntPaginas']) ?>" required>
                </div>
                <div>
                    <label for="Sinopse">Sinopse:</label>
                    <textarea id="Sinopse" name="Sinopse" rows="6" required><?= htmlspecialchars($livro['Sinopse']) ?></textarea>
                </div>
                <div>
                    <label for="Preco">Preço:</label>
                    <input type="text" id="Preco" name="Preco" value="<?= htmlspecialchars($livro['Preco']) ?>" required>
                </div>
                <div>
                    <label for="ISBN">ISBN:</label>
                    <input type="text" id="ISBN" name="ISBN" value="<?= htmlspecialchars($livro['ISBN']) ?>">
                </div>
                <div>
                    <label for="id_categoria">Categoria:</label>
                    <select id="id_categoria" name="id_categoria" required>
                        <?php foreach ($categorias as $categoria): ?>
                            <option value="<?= $categoria['id_categoria'] ?>" <?= $categoria['id_categoria'] == $livro['id_categoria'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($categoria['Genero']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="id_editora">Editora:</label>
                    <select id="id_editora" name="id_editora" required>
                        <?php foreach ($editoras as $editora): ?>
                            <option value="<?= $editora['id_editora'] ?>" <?= $editora['id_editora'] == $livro['id_editora'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($editora['nome']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit">Alterar</button>
            </form>
        <?php endif; ?>
    </main>
</body>
</html>
