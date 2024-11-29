<?php
session_start();
ob_start();
include_once(__DIR__ . '/../config.php');
$con = Connect::getInstance();
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!isset($_SESSION['cliente_id'])) {
    die('Usuário não autenticado');
}

$userId = $_SESSION['cliente_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Diretório de uploads
        $uploadDir = __DIR__ . '/../img/usuario/';
        $fotoPerfil = null;

        // Processar upload da foto
        if (isset($_FILES['fotoPerfil']) && $_FILES['fotoPerfil']['error'] === UPLOAD_ERR_OK) {
            $fileName = basename($_FILES['fotoPerfil']['name']);
            $fileTmp = $_FILES['fotoPerfil']['tmp_name'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $newFileName = uniqid('perfil_', true) . '.' . $fileExt;

            // Validar extensão
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($fileExt, $allowedExtensions)) {
                throw new Exception('Extensão de arquivo não permitida. Apenas JPG, PNG e GIF são suportados.');
            }

            // Validar tamanho do arquivo (limite: 2MB)
            if ($_FILES['fotoPerfil']['size'] > 2 * 1024 * 1024) {
                throw new Exception('Arquivo muito grande. O tamanho máximo permitido é 2MB.');
            }

            // Garantir que o diretório de upload existe
            if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true)) {
                throw new Exception('Erro ao criar diretório de uploads.');
            }

            // Mover arquivo para o diretório
            if (!move_uploaded_file($fileTmp, $uploadDir . $newFileName)) {
                throw new Exception('Erro ao mover o arquivo para o servidor.');
            }

            // Nome da foto para salvar no banco
            $fotoPerfil = $newFileName;

            // Atualiza o campo fotoPerfil no banco
            $query = "UPDATE clientes SET fotoPerfil = :fotoPerfil WHERE id_usuario = :id";
            $stmt = $con->prepare($query);
            $stmt->bindParam(':fotoPerfil', $fotoPerfil);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();
        }

        // Atualizar outros campos do formulário
        $updates = [];
        if (!empty($_POST['nome'])) $updates['nome_usuario'] = $_POST['nome'];
        if (!empty($_POST['sexo'])) $updates['sexo'] = $_POST['sexo'];
        if (!empty($_POST['telefone'])) $updates['telefone'] = $_POST['telefone'];
        if (!empty($_POST['senha']) && $_POST['senha'] === $_POST['confirmarSenha']) {
            $updates['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        }

        // Verifique se há algo a atualizar
        if (!empty($updates)) {
            $query = "UPDATE clientes SET ";
            foreach ($updates as $field => $value) {
                $query .= "$field = :$field, ";
            }
            $query = rtrim($query, ', ') . " WHERE id_usuario = :id";
            $stmt = $con->prepare($query);
            foreach ($updates as $field => &$value) {
                $stmt->bindParam(":$field", $value);
            }
            $stmt->bindParam(':id', $userId);
            $stmt->execute();
        }

        // Atualizar endereço
        if (!empty($_POST['logradouro_principal']) || !empty($_POST['cep_principal'])) {
            $query = "UPDATE enderecos_cliente SET 
                        Rua = COALESCE(NULLIF(:logradouro_principal, ''), Rua), 
                        Numero = COALESCE(NULLIF(:numero_casa, ''), Numero), 
                        Cidade_Cli = COALESCE(NULLIF(:cidade_estado_principal, ''), Cidade_Cli), 
                        Bairrro = COALESCE(NULLIF(:bairro, ''), Bairrro),
                        Estado = COALESCE(NULLIF(:estado, ''), Estado), 
                        CEP = COALESCE(NULLIF(:cep_principal, ''), CEP), 
                        Complemento = COALESCE(NULLIF(:complemento, ''), Complemento) 
                      WHERE id_usuario = :id";

            $stmt = $con->prepare($query);

            $stmt->bindParam(':logradouro_principal', $_POST['logradouro_principal']);
            $stmt->bindParam(':numero_casa', $_POST['numero_casa']);
            $stmt->bindParam(':cidade_estado_principal', $_POST['cidade_estado_principal']);
            $stmt->bindParam(':bairro', $_POST['bairro']);
            $stmt->bindParam(':estado', $_POST['estado']);
            $stmt->bindParam(':cep_principal', $_POST['cep_principal']);
            $stmt->bindParam(':complemento', $_POST['complemento']);
            $stmt->bindParam(':id', $userId);

            $stmt->execute();
        }

        // Redirecionar após salvar
        header("Location: editarperfil.php");
        exit;

    } catch (Exception $e) {
        error_log('Erro: ' . $e->getMessage());
        echo '<p>Erro: ' . htmlspecialchars($e->getMessage()) . '</p>';
    }
}

ob_end_flush();
