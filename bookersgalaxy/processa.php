<?php

// Incluir o arquivo com a conexão com banco de dados
include_once './connect.php';
$con = Connect::getInstance();

// Definir fuso horário de São Paulo
date_default_timezone_set('America/Sao_Paulo');

// Acessar o IF quando é selecionado ao menos uma estrela
if (!empty($_POST['estrela'])) {

    // Receber os dados do formulário
    $estrela = filter_input(INPUT_POST, 'estrela', FILTER_DEFAULT);
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_DEFAULT);

    // Criar a QUERY cadastrar no banco de dados
    $query_avaliacao = "INSERT INTO avaliacoes (nota, texto, data_comentario) VALUES (:nota, :texto, :data_comentario)";

    // Preparar a QUERY
    $cad_avaliacao = $con->prepare($query_avaliacao);

    // Substituir os links pelo valor
    $cad_avaliacao->bindParam(':nota', $estrela, PDO::PARAM_INT);
    $cad_avaliacao->bindParam(':texto', $mensagem, PDO::PARAM_STR);
    $cad_avaliacao->bindParam(':data_comentario', date("Y-m-d" ));

    // Acessa o IF quando cadastrar corretamente
    if ($cad_avaliacao->execute()) {

        // Criar a mensagem de erro
        $_SESSION['msg'] = "<p style='color: green;'>Avaliação cadastrar com sucesso.</p>";

        // Redirecionar o usuário para a página inicial
        header("Location: listarLivros.php");
    } else {

        // Criar a mensagem de erro
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Avaliação não cadastrar.</p>";

        // Redirecionar o usuário para a página inicial
        header("Location: listarLivros.php");
    }
} else {

    // Criar a mensagem de erro
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Necessário selecionar pelo menos 1 estrela.</p>";

    // Redirecionar o usuário para a página inicial
    header("Location: listarLivros.php");
}
