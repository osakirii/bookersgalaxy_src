<?php
include_once(__DIR__ . '/../config.php');

$con = Connect::getInstance();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Recebendo e validando os dados
        $id_editora = intval($_POST['id_editora']);
        $nome = trim($_POST['nome']);
        $pais = trim($_POST['pais']);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $telefone = trim($_POST['telefone']);
        $cnpj = trim($_POST['CNPJ']);
        $tipo_imagem = $_POST['tipo_imagem'];

        $cep = trim($_POST['cep']);
        $rua = trim($_POST['rua']);
        $numero = trim($_POST['numero']);
        $bairro = trim($_POST['bairro']);
        $estado = trim($_POST['estado']);
        $cidade = trim($_POST['cidade']);
        $tipo_endereco = $_POST['tipo_endereco'];

        if (!$id_editora || !$nome || !$pais || !$email || !$telefone || !$cnpj) {
            throw new Exception("Preencha todos os campos obrigatórios.");
        }

        // Atualizando a editora
        $stmt = $con->prepare("UPDATE editora SET nome = ?, pais = ?, email = ?, telefone = ?, cnpj = ? WHERE id_editora = ?");
        $stmt->execute([$nome, $pais, $email, $telefone, $cnpj, $id_editora]);

        // Atualizando o endereço
        $stmtEndereco = $con->prepare("UPDATE enderecos_editora SET tipo_endereco = ?, endereco_rua = ?, endereco_numero = ?, endereco_bairro = ?, endereco_cep = ?, estado = ?, cidade = ? WHERE id_editora = ?");
        $stmtEndereco->execute([$tipo_endereco, $rua, $numero, $bairro, $cep, $estado, $cidade, $id_editora]);

        // Manipulação de imagens
        if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'][0] === 0) {
            foreach ($_FILES['arquivo']['tmp_name'] as $key => $tmp_name) {
                $arquivo = $_FILES['arquivo'];
                $folder = "../img/";
                $archiveName = $arquivo['name'][$key];
                $newArchiveName = uniqid();
                $extension = strtolower(pathinfo($archiveName, PATHINFO_EXTENSION));

                if (!in_array($extension, ['jpg', 'png', 'jpeg', 'gif'])) {
                    throw new Exception("Arquivo inválido: {$archiveName}.");
                }

                $path = $folder . $newArchiveName . "." . $extension;

                if (move_uploaded_file($tmp_name, $path)) {
                    $stmtImagem = $con->prepare("INSERT INTO imagens_editoras (id_editora, path, tipo_imagem, data_upload) VALUES (?, ?, ?, NOW())");
                    $stmtImagem->execute([$id_editora, $path, $tipo_imagem]);
                } else {
                    throw new Exception("Erro ao enviar o arquivo: {$archiveName}.");
                }
            }
        }

        echo "Editora atualizada com sucesso!";
    } catch (Exception $e) {
        echo "<p>Erro: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/upload.css">
    <link rel="stylesheet" href="../css/modulos.css">
    <title>Alterar Editora</title>
</head>
<body>
    <main>
        <h1>Alterar Editora</h1>
        <form id="formLivro" method="POST" enctype="multipart/form-data" action="alterarEditora.php">
            <input type="hidden" name="id_editora" value="<?= htmlspecialchars($_GET['id'] ?? '') ?>">

            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Nome da Editora" required>

            <label>País:</label>
            <input type="text" name="pais" placeholder="País" required>

            <label>CNPJ:</label>
            <input type="text" name="CNPJ" placeholder="CNPJ" required>

            <label>Email:</label>
            <input type="email" name="email" placeholder="E-mail" required>

            <label>Telefone:</label>
            <input type="text" name="telefone" placeholder="Telefone" required>

            <label>CEP:</label>
            <input type="text" name="cep" placeholder="CEP" onblur="buscarEndereco()" required>

            <label>Rua:</label>
            <input type="text" name="rua" placeholder="Rua" required>

            <label>Número:</label>
            <input type="text" name="numero" placeholder="Número" required>

            <label>Bairro:</label>
            <input type="text" name="bairro" placeholder="Bairro" required>

            <label>Cidade:</label>
            <input type="text" name="cidade" placeholder="Cidade" required>

            <label>Estado:</label>
            <input type="text" name="estado" placeholder="Estado" required>

            <label>Tipo de Endereço:</label>
            <select name="tipo_endereco" required>
                <option value="">Selecione</option>
                <option value="principal">Principal</option>
                <option value="filial">Filial</option>
                <option value="comercial">Comercial</option>
                <option value="correspondência">Correspondência</option>
            </select>

            <label>Imagens:</label>
            <input type="file" name="arquivo[]" multiple>

            <label>Tipo de Imagem:</label>
            <select name="tipo_imagem" required>
                <option value="">Selecione</option>
                <option value="logo">Logo</option>
                <option value="banner">Banner</option>
                <option value="promocao">Promoção</option>
                <option value="outra">Outra</option>
            </select>

            <center><button type="submit">Salvar Alterações</button></center>
        </form>
        <a id="voltar" onclick="history.back()">Voltar</a>
    </main>

    <script>
        function buscarEndereco() {
            const cep = document.querySelector('input[name="cep"]').value.replace(/\D/g, '');
            if (cep.length === 8) {
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            document.querySelector('input[name="rua"]').value = data.logradouro;
                            document.querySelector('input[name="bairro"]').value = data.bairro;
                            document.querySelector('input[name="cidade"]').value = data.localidade;
                            document.querySelector('input[name="estado"]').value = data.uf;
                        } else {
                            alert("CEP não encontrado.");
                        }
                    })
                    .catch(() => alert("Erro ao buscar o CEP."));
            } else {
                alert("CEP inválido.");
            }
        }
    </script>
</body>
</html>
