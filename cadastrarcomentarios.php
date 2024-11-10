<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['cliente_id'])) {
    echo "Você precisa estar logado para visualizar os comentários.";
    exit();
}

$cliente_id = $_SESSION['cliente_id']; // ID do cliente logado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $con = Connect::getInstance();

    // Receber dados do formulário
    $cliente_id = $_POST['cliente_id'];
    $livro_id = $_POST['livro_id'];
    $nota = $_POST['nota'];
    $texto = $_POST['texto'];
    $data_comentario = $_POST['data_comentario'];

    // Pasta onde as imagens serão salvas
    $uploadDir = 'uploads/';
    $imagens = [];

    // Processar as imagens
    if (!empty($_FILES['imagens']['name'][0])) {
        $totalImagens = min(count($_FILES['imagens']['name']), 5);
        
        for ($i = 0; $i < $totalImagens; $i++) {
            $imagemNome = basename($_FILES['imagens']['name'][$i]);
            $imagemPath = $uploadDir . uniqid() . "_" . $imagemNome;
            if (move_uploaded_file($_FILES['imagens']['tmp_name'][$i], $imagemPath)) {
                $imagens[] = $imagemPath;
            }
        }
    }

    // Preparar e executar a query de inserção
    try {
        $stmt = $con->prepare("INSERT INTO avaliacoes (cliente_id, livro_id, nota, texto, data_comentario, imagem1, imagem2, imagem3, imagem4, imagem5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $cliente_id,
            $livro_id,
            $nota,
            $texto,
            $data_comentario,
            $imagens[0] ?? null,
            $imagens[1] ?? null,
            $imagens[2] ?? null,
            $imagens[3] ?? null,
            $imagens[4] ?? null,
        ]);

        echo "Comentário cadastrado com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao cadastrar o comentário: " . htmlspecialchars($e->getMessage());
    }
}
?>
