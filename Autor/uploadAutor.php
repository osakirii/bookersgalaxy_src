<?php
include_once(__DIR__ . '/../config.php'); // Inclui configurações globais
$con = Connect::getInstance();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Recuperando os dados do autor
        $nome = $_POST['Nome'];
        $data_nascimento = $_POST['Data_nascimento'];
        $nacionalidade = $_POST['Nacionalidade'];
        $bio = $_POST['Bio'];

        // Inserindo os dados no banco de dados
        $stmt = $con->prepare("INSERT INTO autor (nome, data_nascimento, nacionalidade, bio) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nome, $data_nascimento, $nacionalidade, $bio]);

        echo "Autor cadastrado com sucesso!";
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
    <title>Cadastro de Autor</title>
</head>

<body>

    <main>
        <form id="formLivro" method="POST" action="uploadAutor.php">
            <label>Insira as informações do autor:</label>
            <input type="text" name="Nome" placeholder="Nome do Autor" required>
            <input type="date" name="Data_nascimento" required>
            <input type="text" name="Nacionalidade" placeholder="Nacionalidade" required>
            <textarea name="Bio" placeholder="Biografia do Autor" required rows="10"></textarea>
            <center><button type="submit">Cadastrar Autor</button></center>
        </form>
        <a id="voltar" onclick="history.back()">Voltar</a>
    </main>

</body>

</html>
