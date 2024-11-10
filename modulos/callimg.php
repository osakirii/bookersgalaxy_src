<?php
    include_once(__DIR__ . '/../config.php'); // Inclui todas as configurações e funções globais

    $con = Connect::getInstance();
    function Busca($id)
    {

        global $pdo;

        $stmt = $pdo->prepare("SELECT path FROM arquivossite WHERE id = :id"); // Confirme se 'path' é o nome correto do campo
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($mostrar = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return "/bookersgalaxy/" . $mostrar['path']; // Adiciona o caminho base manualmente
        } else {
            echo 'Deu erro no callimg';
        }
    }
    function BuscaLivro($id_livro = null, $todasImagens = false){
        global $pdo;
        
        // Define a consulta base, incluindo o nome da editora
        $sql = "
            SELECT 
                arquivos.path,  
                livros.Titulo, 
                livros.Autor, 
                livros.Data_lancamento,
                livros.QntPaginas,
                livros.Sinopse,
                livros.Preco, 
                livros.id_livro,
                genero.Genero AS Genero,
                editora.nome AS NomeEditora
            FROM arquivos 
            INNER JOIN livros 
                ON livros.id_livro = arquivos.livro_id 
            INNER JOIN genero 
                ON livros.id_categoria = genero.id_categoria
            INNER JOIN editora
                ON livros.id_editora = editora.id_editora
        ";
    
        // Adiciona a condição para buscar imagens de capa ou todas as imagens
        $sql .= " WHERE ";
        if (!$todasImagens) {
            $sql .= "arquivos.is_capa = 1 AND ";
        }
    
        // Adiciona a condição para um livro específico, se fornecido
        if ($id_livro !== null) {
            $sql .= "livros.id_livro = :id_livro";
        } else {
            $sql .= "1"; // Evita erro de SQL
        }
    
        $sql .= " LIMIT 15"; // Limite opcional
    
        $stmtImagem = $pdo->prepare($sql);
    
        // Associa o id_livro, se aplicável
        if ($id_livro !== null) {
            $stmtImagem->bindParam(':id_livro', $id_livro, PDO::PARAM_INT);
        }
        
        // Executa a consulta
        $stmtImagem->execute();
        
        // Retorna os resultados
        return $stmtImagem->fetchAll(PDO::FETCH_ASSOC);
    }
    



    ?>
