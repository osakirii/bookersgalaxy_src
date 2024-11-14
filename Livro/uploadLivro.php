<?php
include_once(__DIR__ . '/../config.php'); // Inclui todas as configurações e funções globais
$con = Connect::getInstance();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        //RECUPERANDO OS DADOS DO LIVROz
        $titulo = $_POST['Titulo'];
        $autor = $_POST['Autor'];
        $data_lancamento = $_POST['Data_lancamento'];
        $qtd_paginas = $_POST['QtdPaginas'];
        $id_categoria = $_POST['id_categoria']; // Gênero selecionado no dropdown
        $id_editora = $_POST['id_editora']; // Gênero selecionado no dropdown
        $sinopse = $_POST['Sinopse'];
        $preco = $_POST['Preco'];
        $isbn = $_POST['ISBN'];
        $capaIndex = $_POST['capa'];  // índice da imagem selecionada como capa



        // <!--INSERINDO OS DADOS NO BANCO DE DADOS-->
        $stmt = $con->prepare("INSERT INTO livros (Titulo, Autor, Data_lancamento, QntPaginas,Sinopse, Preco, ISBN,id_categoria,id_editora) VALUES (?, ?, ?, ?, ?,?,?,?,?)");
        $stmt->execute([$titulo, $autor, $data_lancamento, $qtd_paginas, $sinopse, $preco, $isbn, $id_categoria,$id_editora]);

        // <--OBTENDO O ID DO LIVRO RECEM ADICIONADO-->
        $livro_id = $con->lastInsertId();
        if ($livro_id === "0") {
            echo "Erro: Não foi possível obter o ID do livro.";
            exit;
        } else {
            echo "ID do livro: " . $livro_id . "\n";
        }
        // Verifica se foram enviadas imagens
        if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'][0] === 0) {
            foreach ($_FILES['arquivo']['tmp_name'] as $key => $tmp_name) {
                $arquivo = $_FILES['arquivo'];
                var_export($arquivo, true);
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
                    $isCapa = ($key == $capaIndex) ? 1 : 0;
                    $stmtImagem = $con->prepare("INSERT INTO arquivos (livro_id, nome, path, data_upload, is_capa) VALUES (?, ?, ?, NOW(), ?)");
                    $stmtImagem->execute([$livro_id, $archiveName, $path, $isCapa]);
                } else {
                    echo "<p>Falha ao enviar arquivo." . $arquivo['name'][$key] . "</p>";
                }
            }
        } else {
            echo "Nenhuma imagem enviada ou ocorreu um erro no envio da imagem.";
        }

        echo "Livro cadastrado com sucesso!";
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
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
    <title>Cadastro de Livro</title>
</head>

<body>

    <main>
        <form id="formLivro" method="POST" enctype="multipart/form-data" action="uploadLivro.php">
            <label>Insira as informações do livro:</label>
            <input type="text" name="Titulo" placeholder="Título do Livro" required>
            <input type="text" name="Autor" placeholder="Autor do Livro" required>
            <input type="date" name="Data_lancamento" required>
            <input type="number" name="QtdPaginas" placeholder="Quantidade de Páginas" required>
            <select id="generoSelect" name="id_categoria" required>
                <option value="">Selecione um Gênero</option>
                <?php
                try {
                    $generosPorPagina = 10;
                    $totalGeneros = $con->query("SELECT COUNT(*) FROM genero")->fetchColumn();
                    $totalPaginas = ceil($totalGeneros / $generosPorPagina);

                    $stmt = $con->prepare("SELECT id_categoria, Genero FROM genero LIMIT :limite OFFSET :offset");
                    $stmt->bindValue(':limite', $generosPorPagina, PDO::PARAM_INT);
                    $stmt->bindValue(':offset', 0, PDO::PARAM_INT);
                    $stmt->execute();
                    $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (!$generos) {
                        echo "<option value=''>Nenhum gênero encontrado.</option>";
                    } else {
                        foreach ($generos as $genero) {
                            echo '<option value="' . htmlspecialchars($genero['id_categoria']) . '">' . htmlspecialchars($genero['Genero']) . '</option>';
                        }
                    }
                } catch (Exception $e) {
                    echo "Erro: " . $e->getMessage();
                }
                ?>
            </select>
            <select id="editoraSelect" name="id_editora" required>
                <option value="">Selecione uma Editora</option>
                <?php
                try {
                    $stmt = $con->prepare("SELECT id_editora, nome FROM editora");
                    $stmt->execute();
                    $editoras = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (!$editoras) {
                        echo "<option value=''>Nenhum gênero encontrado.</option>";
                    } else {
                        foreach ($editoras as $editora) {
                            echo '<option value="' . htmlspecialchars($editora['id_editora']) . '">' . htmlspecialchars($editora['nome']) . '</option>';
                        }
                    }
                } catch (Exception $e) {
                    echo "Erro: " . $e->getMessage();
                }
                ?>
            </select>
            <textarea name="Sinopse" placeholder="Sinopse" required rows="10"></textarea>
            <input type="number" step="0.01" name="Preco" placeholder="Preço" required>
            <input type="text" name="ISBN" id="isbn" placeholder="ISBN" required maxlength="17">

            <label>Selecione as imagens:</label>
            <input type="file" name="arquivo[]" multiple required>

            <!-- DROPDOWN PARA ESCOLHER A CAPA -->
            <label for="capa">Escolha a capa:</label>
            <select name="capa" required>
                <option value="">Selecione uma imagem como capa</option>
            </select>

            <center><button type="submit">Cadastrar Livro</button></center>

        </form>
        <a id="voltar" onclick="history.back()">Voltar</a></button>
        </div>
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