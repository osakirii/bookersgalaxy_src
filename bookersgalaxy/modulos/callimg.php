<?php 
function Src($id) { 
    include("connect.php");

    // Prepare a consulta com PDO para evitar SQL injection
    $stmt = $pdo->prepare("SELECT * FROM arquivos WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Vincula o parâmetro de forma segura
    $stmt->execute();

    // Obtém o resultado e exibe o campo 'path' se encontrado
    $mostrar = $stmt->fetch(PDO::FETCH_ASSOC);
    return $mostrar['path'] ?? 'Arquivo não encontrado.'; // Exibe o caminho ou mensagem padrão
}
?>