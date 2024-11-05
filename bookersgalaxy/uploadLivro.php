<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $con = Connect::getInstance();

        // Recupera os dados do livro
        $titulo = $_POST['Titulo'];
        $autor = $_POST['Autor'];
        $qtd_paginas = $_POST['QtdPaginas'];
        $genero = $_POST['Genero'];
        $sinopse = $_POST['Sinopse'];
        $preco = $_POST['Preco'];

        // Insere o livro no banco de dados
        $stmt = $con->prepare("INSERT INTO livro (Titulo, Autor, QntPaginas, Genero, Sinopse, Preco) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$titulo, $autor, $qtd_paginas, $genero, $sinopse, $preco]);

        // Obtém o ID do livro recém-inserido
        $livro_id = $con->lastInsertId();

        // Verifica se foram enviadas imagens
        if (isset($_FILES['Imagens']) && $_FILES['Imagens']['error'][0] === 0) {
            foreach ($_FILES['Imagens']['tmp_name'] as $key => $tmp_name) {
                if ($_FILES['Imagens']['error'][$key] === 0) { // Verifica se não houve erro no upload
                    $name = $_FILES['Imagens']['name'][$key];
                    $full_path = 'uploads/' . basename($name);

                    // Move a imagem para o diretório de uploads
                    if (move_uploaded_file($tmp_name, $full_path)) {
                        // Insere a imagem no banco de dados
                        $stmtImagem = $con->prepare("INSERT INTO imagens (livro_id, caminho) VALUES (?, ?)");
                        $stmtImagem->execute([$livro_id, $full_path]);
                    } else {
                        echo "Erro ao mover a imagem: $name";
                    }
                } else {
                    echo "Erro no upload da imagem: $name - Código do erro: " . $_FILES['Imagens']['error'][$key];
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
    <title>Cadastro de Livro</title>
</head>
<body>
<form method="POST" enctype="multipart/form-data" action="uploadLivro.php">
    <input type="text" name="Titulo" placeholder="Título do Livro" required>
    <input type="text" name="Autor" required>
    <input type="number" name="QtdPaginas" placeholder="Quantidade de Páginas" required>
    <input type="text" name="Genero" placeholder="Gênero" required>
    <textarea name="Sinopse" placeholder="Sinopse" required></textarea>
    <input type="number" step="0.01" name="Preco" placeholder="Preço" required>
    <input type="file" name="Imagens[]" multiple required>
    <input type="submit" value="Cadastrar Livro">
</form>
</body>
</html>
