<?php
include_once(__DIR__ . '/../config.php'); // Inclui todas as configurações e funções globais
$con = Connect::getInstance();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Recuperando os dados do livro
        $livro_id = $_POST['livro_id'];
        $titulo = $_POST['Titulo'];
        $autor = $_POST['Autor'];
        $data_lancamento = $_POST['Data_lancamento'];
        $qtd_paginas = $_POST['QtdPaginas'];
        $id_categoria = $_POST['id_categoria'];
        $id_editora = $_POST['id_editora'];
        $sinopse = $_POST['Sinopse'];
        $preco = $_POST['Preco'];
        $isbn = $_POST['ISBN'];

        // Atualizando as informações do livro no banco de dados
        $stmt = $con->prepare("UPDATE livros SET Titulo = ?, Autor = ?, Data_lancamento = ?, QntPaginas = ?, Sinopse = ?, Preco = ?, ISBN = ?, id_categoria = ?, id_editora = ? WHERE id_livro = ?");
        $stmt->execute([$titulo, $autor, $data_lancamento, $qtd_paginas, $sinopse, $preco, $isbn, $id_categoria, $id_editora, $livro_id]);

        // Verifica se foram enviadas imagens
        if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'][0] === 0) {
            foreach ($_FILES['arquivo']['tmp_name'] as $key => $tmp_name) {
                $arquivo = $_FILES['arquivo'];
                $folder = __DIR__ . '/../img/';

                $archiveName = $arquivo['name'][$key];
                $newArchiveName = uniqid();
                $extension = strtolower(pathinfo($archiveName, PATHINFO_EXTENSION));

                if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg' && $extension != 'gif') {
                    die("Tipo de arquivo inaceitável para arquivo " . $arquivo['name'][$key] . "!! Apenas .jpg, .png, .jpeg ou .gif");
                }

                $path = 'img/' . $newArchiveName . "." . $extension;

                $accepted = move_uploaded_file($tmp_name, $folder . $newArchiveName . "." . $extension);

                if ($accepted) {
                    $isCapa = ($key == $_POST['capaIndex']) ? 1 : 0;
                    $stmtImagem = $con->prepare("INSERT INTO arquivos (livro_id, nome, path, data_upload, is_capa) VALUES (?, ?, ?, NOW(), ?)");
                    $stmtImagem->execute([$livro_id, $archiveName, $path, $isCapa]);
                } else {
                    echo "<p>Falha ao enviar arquivo." . $arquivo['name'][$key] . "</p>";
                }
            }
        }

        echo "Livro alterado com sucesso!";
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
} elseif (isset($_GET['id'])) {
    // Carregando dados do livro para edição
    $livro_id = $_GET['id'];
    try {
        $stmt = $con->prepare("SELECT * FROM livros WHERE id_livro = ?");
        $stmt->execute([$livro_id]);
        $livro = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erro ao buscar livro: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/upload.css">
    <link rel="stylesheet" href="../css/modulos.css">
    <title>Alteração de Livro</title>
</head>

<body>

    <main>
        <form id="formLivro" method="POST" enctype="multipart/form-data" action="alterarLivro.php">
            <label>Insira as informações do livro:</label>
            <input type="text" name="Titulo" value="<?= htmlspecialchars($livro['Titulo']) ?>" placeholder="Título do Livro" required>
            <input type="text" name="Autor" value="<?= htmlspecialchars($livro['Autor']) ?>" placeholder="Autor do Livro" required>
            <input type="date" name="Data_lancamento" value="<?= htmlspecialchars($livro['Data_lancamento']) ?>" required>
            <input type="number" name="QtdPaginas" value="<?= htmlspecialchars($livro['QntPaginas']) ?>" placeholder="Quantidade de Páginas" required>
            <select id="generoSelect" name="id_categoria" required>
                <option value="">Selecione um Gênero</option>
                <?php
                // Carregar categorias
                $stmt = $con->prepare("SELECT id_categoria, Genero FROM genero");
                $stmt->execute();
                $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($generos as $genero) {
                    echo '<option value="' . htmlspecialchars($genero['id_categoria']) . '" ' . ($livro['id_categoria'] == $genero['id_categoria'] ? 'selected' : '') . '>' . htmlspecialchars($genero['Genero']) . '</option>';
                }
                ?>
            </select>
            <select id="editoraSelect" name="id_editora" required>
                <option value="">Selecione uma Editora</option>
                <?php
                // Carregar editoras
                $stmt = $con->prepare("SELECT id_editora, nome FROM editora");
                $stmt->execute();
                $editoras = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($editoras as $editora) {
                    echo '<option value="' . htmlspecialchars($editora['id_editora']) . '" ' . ($livro['id_editora'] == $editora['id_editora'] ? 'selected' : '') . '>' . htmlspecialchars($editora['nome']) . '</option>';
                }
                ?>
            </select>
            <textarea name="Sinopse" placeholder="Sinopse" required rows="10"><?= htmlspecialchars($livro['Sinopse']) ?></textarea>
            <input type="number" step="0.01" name="Preco" value="<?= htmlspecialchars($livro['Preco']) ?>" placeholder="Preço" required>
            <input type="text" name="ISBN" id="isbn" value="<?= htmlspecialchars($livro['ISBN']) ?>" placeholder="ISBN" required maxlength="17">

            <label>Selecione as imagens:</label>
            <input type="file" name="arquivo[]" multiple required>

            <!-- DROPDOWN PARA ESCOLHER A CAPA -->
            <label for="capa">Escolha a capa:</label>
            <select name="capa" required>
                <option value="">Selecione uma imagem como capa</option>
                <?php
                // Carregar as imagens atuais do livro
                $stmt = $con->prepare("SELECT id_arquivo, nome FROM arquivos WHERE livro_id = ?");
                $stmt->execute([$livro['id_livro']]);
                $arquivos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($arquivos as $arquivo) {
                    echo '<option value="' . $arquivo['id_arquivo'] . '">' . $arquivo['nome'] . '</option>';
                }
                ?>
            </select>
            <center><button type="submit">Alterar Livro</button></center>
        </form>
        <a id="voltar" onclick="history.back()">Voltar</a></button>
    </main>

    <script>
        //JAVASCRIPT PARA PREENCHER O SELECT BASEADO NA QUANTIDADE DE IMAGENS
        const fileInput = document.querySelector('input[name="arquivo[]"]');
        const capaSelect = document.querySelector('select[name="capa"]');

        fileInput.addEventListener('change', function() {
            // Limpa as opções anteriores
            capaSelect.innerHTML = '<option value="">Selecione uma imagem como capa</option>';

            // Adiciona uma opção para cada imagem
            Array.from(fileInput.files).forEach((file, index) => {
                const option = document.createElement('option');
                option.value = index;
                option.textContent = `Imagem ${index + 1} - ${file.name}`;
                capaSelect.appendChild(option);
            });
        });

        const isbnInput = document.getElementById('isbn');

        isbnInput.addEventListener('input', function() {
            let value = isbnInput.value.replace(/\D/g, ''); //PERMITE SOMENTE NÚMERO
            if (value.length <= 3) {
                isbnInput.value = value;
            } else if (value.length <= 5) {
                isbnInput.value = value.slice(0, 3) + '-' + value.slice(3);
            } else if (value.length <= 9) {
                isbnInput.value = value.slice(0, 3) + '-' + value.slice(3, 5) + '-' + value.slice(5);
            } else if (value.length <= 12) {
                isbnInput.value = value.slice(0, 3) + '-' + value.slice(3, 5) + '-' + value.slice(5, 9) + '-' + value.slice(9);
            } else {
                isbnInput.value = value.slice(0, 3) + '-' + value.slice(3, 5) + '-' + value.slice(5, 9) + '-' + value.slice(9, 12) + '-' + value.slice(12, 13);
            }
        });
    </script>

</body>

</html>