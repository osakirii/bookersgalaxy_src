<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $con = Connect::getInstance();

        // Recupera os dados do livro
        $titulo = $_POST['Titulo'];
        $autor = $_POST['Autor'];
        $data_lancamento = $_POST['Data_lancamento'];
        $qtd_paginas = $_POST['QtdPaginas'];
        $genero = $_POST['Genero'];
        $sinopse = $_POST['Sinopse'];
        $preco = $_POST['Preco'];
        $isbn = $_POST['ISBN'];


        // <!--INSERINDO OS DADOS NO BANCO DE DADOS-->
        $stmt = $con->prepare("INSERT INTO livros (Titulo, Autor, Data_lancamento, QntPaginas, Genero, Sinopse, Preco, ISBN) VALUES (?, ?, ?, ?, ?, ?,?,?)");
        $stmt->execute([$titulo, $autor, $data_lancamento, $qtd_paginas, $genero, $sinopse, $preco, $isbn]);

        // <--OBTENDO O ID DO LIVRO RECEM ADICIONADO-->
        $livro_id = $con->lastInsertId();

        // Verifica se foram enviadas imagens
        if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'][0] === 0) {
            foreach ($_FILES['arquivo']['tmp_name'] as $key => $tmp_name) {

                    $arquivo = $_FILES['arquivo'];
                    var_export($arquivo, true);
                    $folder = "img/";
                    $archiveName = $arquivo['name'][$key];
                    $newArchiveName = uniqid();
                    $extension = strtolower(pathinfo($archiveName, PATHINFO_EXTENSION));
            
                    if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg' && $extension != 'gif'){
                        die("Tipo de arquivo inaceitável para arquivo " . $arquivo['name'][$key] . "!! Apenas .jpg, .png, .jpeg ou .gif");
            
                    }
            
                    $path = $folder . $newArchiveName. ".". $extension;
            
                    $accepted = move_uploaded_file($tmp_name, $path);
                    if($accepted){
                        $stmtImagem = $con->prepare("INSERT INTO arquivos (livro_id, nome, path, data_upload) VALUES (?, ?, ?, NOW())");
                        $stmtImagem->execute([$livro_id, $archiveName, $path]);
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
        <link rel="stylesheet" href="css/upload.css">
        <title>Cadastro de Livro</title>
    </head>

    <body>
        <?php
            include_once 'modulos/header.php';
         ?>
        <main>
            <form id="formLivro" method="POST" enctype="multipart/form-data" action="uploadLivro.php">
                <label>Insira as informações do livro:</label>
                <input type="text" name="Titulo" placeholder="Título do Livro" required>
                <input type="text" name="Autor" placeholder="Autor do Livro" required>
                <input type="date" name="Data_lancamento" required>
                <input type="number" name="QtdPaginas" placeholder="Quantidade de Páginas" required>
                <input type="text" name="Genero" placeholder="Gênero" required>
                <textarea name="Sinopse" placeholder="Sinopse" required rows="10"></textarea>
                <input type="number" step="0.01" name="Preco" placeholder="Preço" required>
                <input type="text" name="ISBN" id="isbn" placeholder="ISBN" required maxlength="17">
                
                <!-- Campo de upload para múltiplas imagens -->
                <label>Selecione as imagens:</label>
                <input type="file" name="arquivo[]" multiple required>

                <!-- Dropdown para selecionar a capa -->
                <label for="capa">Escolha a capa:</label>
                <select name="capa" required>
                    <option value="">Selecione uma imagem como capa</option>
                    <!-- Vamos adicionar opções em JavaScript, após o upload -->
                </select>

                <center><button type="submit">Cadastrar Livro</button></center>
                
            </form>
            <a id="voltar" href="adm.php">Voltar</a></button>
            </div>
        </main>

    <script>
        // JavaScript para preencher as opções do dropdown com base na quantidade de imagens
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
        let value = isbnInput.value.replace(/\D/g, ''); // Remove qualquer caractere que não seja número
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
