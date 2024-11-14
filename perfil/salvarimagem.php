<?php
session_start();
include_once(__DIR__ . '/../config.php');

$response = ['success' => false];
$userId = $_SESSION['cliente_id'];

if (isset($_FILES['fotoPerfil']) && $userId) {
    $fotoPerfil = $_FILES['fotoPerfil'];
    $targetDir = "../img/usuario/";
    $fileName = "perfil_" . $userId . "_" . basename($fotoPerfil['name']);
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($fotoPerfil['tmp_name'], $targetFile)) {
        // Atualiza o caminho da imagem no banco de dados
        $con = Connect::getInstance();
        $stmt = $con->prepare("UPDATE clientes SET fotoPerfil = :fotoPerfil WHERE id = :id");
        $stmt->bindParam(':fotoPerfil', $fileName);
        $stmt->bindParam(':id', $userId);
        $response['success'] = $stmt->execute();
    }
}

header('Content-Type: application/json');
echo json_encode($response);
