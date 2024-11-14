<?php
session_start();
include_once(__DIR__ . '/../config.php');
$con = Connect::getInstance();

$response = ['success' => false];
$userId = $_SESSION['cliente_id'];
$updates = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica e sanitiza cada campo
    if (!empty($_POST['nome'])) $updates['nome'] = $_POST['nome'];
    if (!empty($_POST['biografia'])) $updates['biografia'] = $_POST['biografia'];
    if (!empty($_POST['email'])) $updates['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (!empty($_POST['sexo'])) $updates['sexo'] = $_POST['sexo'];
    if (!empty($_POST['telefone'])) $updates['telefone'] = $_POST['telefone'];
    if (!empty($_POST['daltonismo'])) $updates['daltonismo'] = $_POST['daltonismo'];
    if (!empty($_POST['senha']) && $_POST['senha'] === $_POST['confirmarSenha']) {
        $updates['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    }
    if (!empty($_POST['endereco_principal'])) $updates['endereco_principal'] = $_POST['endereco_principal'];
    if (!empty($_POST['cidade_estado_principal'])) $updates['cidade_estado_principal'] = $_POST['cidade_estado_principal'];
    if (!empty($_POST['cep_principal'])) $updates['cep_principal'] = $_POST['cep_principal'];
    if (!empty($_POST['endereco_secundario'])) $updates['endereco_secundario'] = $_POST['endereco_secundario'];
    if (!empty($_POST['cidade_estado_secundario'])) $updates['cidade_estado_secundario'] = $_POST['cidade_estado_secundario'];
    if (!empty($_POST['cep_secundario'])) $updates['cep_secundario'] = $_POST['cep_secundario'];

    // Upload de imagem, se fornecida
    if (isset($_FILES['fotoPerfil']) && $_FILES['fotoPerfil']['error'] === UPLOAD_ERR_OK) {
        $fotoPerfil = $_FILES['fotoPerfil'];
        $targetDir = "../img/usuario/";
        $fileName = "perfil_" . $userId . "_" . basename($fotoPerfil['name']);
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($fotoPerfil['tmp_name'], $targetFile)) {
            $updates['fotoPerfil'] = $fileName;
        }
    }

    // Executa a atualização no banco de dados
    if (!empty($updates)) {
        $query = "UPDATE clientes SET ";
        foreach ($updates as $field => $value) {
            $query .= "$field = :$field, ";
        }
        $query = rtrim($query, ', ') . " WHERE id = :id";
        $stmt = $con->prepare($query);
        foreach ($updates as $field => &$value) {
            $stmt->bindParam(":$field", $value);
        }
        $stmt->bindParam(":id", $userId);
        $response['success'] = $stmt->execute();
    }
}

header('Content-Type: application/json');
echo json_encode($response);
