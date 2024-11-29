<?php
session_start();
include_once('/bookersgalaxy/config.php');

if (!isset($_SESSION['cliente_id'])) {
    echo json_encode(['success' => false, 'error' => 'Faça login para favoritar livros.']);
    exit;
}

$clienteId = $_SESSION['cliente_id'];
$data = json_decode(file_get_contents('php://input'), true);
$livroId = $data['livro_id'] ?? null;

if (!$livroId) {
    echo json_encode(['success' => false, 'error' => 'Livro não identificado.']);
    exit;
}

try {
    $con = Connect::getInstance();

    // Verifica se o livro já está nos favoritos
    $query = $con->prepare("SELECT estado FROM favoritos WHERE id_usuario = ? AND id_livro = ?");
    $query->execute([$clienteId, $livroId]);
    $favorito = $query->fetch();

    if ($favorito) {
        // Alterna o estado: ativa (1) ou remove (0)
        $novoEstado = $favorito['estado'] ? 0 : 1;
        $update = $con->prepare("UPDATE favoritos SET estado = ?, data_adicao = NOW() WHERE id_usuario = ? AND id_livro = ?");
        $update->execute([$novoEstado, $clienteId, $livroId]);

        $mensagem = $novoEstado ? 'Livro adicionado aos favoritos!' : 'Livro removido dos favoritos.';
        echo json_encode(['success' => true, 'message' => $mensagem]);
    } else {
        // Adiciona o livro aos favoritos
        $insert = $con->prepare("INSERT INTO favoritos (id_usuario, id_livro, estado, data_adicao) VALUES (?, ?, 1, NOW())");
        $insert->execute([$clienteId, $livroId]);
        echo json_encode(['success' => true, 'message' => 'Livro adicionado aos favoritos!']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Erro no banco de dados: ' . $e->getMessage()]);
}
