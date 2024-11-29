<?php
session_start();
include_once(__DIR__ . '/../config.php');
$con = Connect::getInstance();

if (!isset($_SESSION['cliente_id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuário não autenticado']);
    exit;
}

$userId = $_SESSION['cliente_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fotoPerfil'])) {
    try {
        $uploadDir = __DIR__ . '/../img/usuario/';
        $fileTmp = $_FILES['fotoPerfil']['tmp_name'];
        $fileExt = strtolower(pathinfo($_FILES['fotoPerfil']['name'], PATHINFO_EXTENSION));
        $newFileName = uniqid('perfil_', true) . '.' . $fileExt;

        // Validar extensão
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($fileExt, $allowedExtensions)) {
            echo json_encode(['success' => false, 'message' => 'Formato de arquivo inválido.']);
            exit;
        }

        // Validar tamanho (limite: 2MB)
        if ($_FILES['fotoPerfil']['size'] > 2 * 1024 * 1024) {
            echo json_encode(['success' => false, 'message' => 'Arquivo muito grande.']);
            exit;
        }

        // Criar diretório se não existir
        if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true)) {
            echo json_encode(['success' => false, 'message' => 'Erro ao criar diretório de upload.']);
            exit;
        }

        // Mover arquivo
        if (!move_uploaded_file($fileTmp, $uploadDir . $newFileName)) {
            echo json_encode(['success' => false, 'message' => 'Erro ao mover o arquivo.']);
            exit;
        }

        // Atualizar banco de dados
        $query = "UPDATE clientes SET fotoPerfil = :fotoPerfil WHERE id_usuario = :id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':fotoPerfil', $newFileName);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();

        // Retornar URL da nova imagem
        $newImageUrl = "../img/usuario/" . $newFileName;
        echo json_encode(['success' => true, 'newImageUrl' => $newImageUrl]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Requisição inválida.']);
}
