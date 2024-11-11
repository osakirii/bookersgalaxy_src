<?php
session_start();
include("../connect.php");
header('Content-Type: application/json');

class CarrinhoFunc
{
    public function obterIdLivro()
    {
        return isset($_GET['id']) && is_numeric($_GET['id']) ? (int) $_GET['id'] : null;
    }

    public function adicionarCarrinho($idLivro)
    {
        if (isset($idLivro)) {
            // Inicializa a sessão do carrinho, se ainda não existir
            if (!isset($_SESSION['carrinho'])) {
                $_SESSION['carrinho'] = [];
            }

            // Verifica se o livro já está no carrinho para evitar duplicação
            if (!in_array($idLivro, $_SESSION['carrinho'])) {
                $_SESSION['carrinho'][] = $idLivro;
            }

            // Retornar sucesso e conteúdo do carrinho para debug
            echo json_encode(['success' => true, 'carrinho' => $_SESSION['carrinho']]);
        } else {
            echo json_encode(['success' => false, 'error' => 'ID do livro não fornecido.']);
        }
    }


    public function toggleFavorite($idLivro, $idUsuario)
    {
        // Código para favoritar o livro (exemplo básico)
        return json_encode(['success' => true, 'message' => 'Livro favoritado com sucesso!']);
    }
}

// Instancia a classe CarrinhoFunc
$func = new CarrinhoFunc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    // Ação para adicionar ao carrinho
    if (isset($data['acao']) && $data['acao'] === 'adicionarCarrinho') {
        if (isset($data['id_livro'])) {
            $func->adicionarCarrinho($data['id_livro']);
        } else {
            echo json_encode(['success' => false, 'error' => 'ID do livro não fornecido.']);
        }
    }
    // Ação para favoritar
    if (isset($data['acao']) && $data['acao'] === 'favoritar') {
        if (isset($data['user_id']) && isset($data['id_livro'])) {
            $idUsuario = $data['user_id'];
            $idLivro = $data['id_livro'];
            $resultado = $func->toggleFavorite($idLivro, $idUsuario);
            echo $resultado;
        } else {
            echo json_encode(['success' => false, 'error' => 'ID do usuário ou do livro não fornecido.']);
        }
    }
}
