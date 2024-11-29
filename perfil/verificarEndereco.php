<?php
include_once('../connect.php');

session_start();
$con = Connect::getInstance();
if (isset($_SESSION['cliente_id'])) {
    $userId = $_SESSION['cliente_id'];
    $nomeUsuario = $_SESSION['nomeUsuario'];
}   

$clienteId = $_SESSION['cliente_id'];
// Verifica se o usuário tem um endereço registrado
$stmt = $pdo->prepare("
    SELECT 1 
    FROM moradia m
    JOIN enderecos_cliente e ON e.Id_enderecoCli = m.Id_EnderecoCli
    WHERE m.id_usuario = :cliente_id
    LIMIT 1
");
$stmt->bindParam(':cliente_id', $clienteId, PDO::PARAM_INT);
$stmt->execute();

// Se encontrar um endereço registrado, retorna true
$temEndereco = $stmt->rowCount() > 0;

// Retorna a resposta em formato JSON
return json_encode(['temEndereco' => $temEndereco]);
