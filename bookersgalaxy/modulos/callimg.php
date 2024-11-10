    <?php
include_once(__DIR__ . '/../config.php'); // Inclui todas as configurações e funções globais

    $con = Connect::getInstance();
    function Busca($id) {

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
    function BuscaLivro(){
        global $pdo;
        
        // Prepare a query para buscar os dados
        $stmtImagem = $pdo->prepare("
            SELECT 
                arquivos.path, 
                livros.Titulo, 
                livros.Autor, 
                livros.Preco, 
                livros.id_livro
            FROM arquivos 
            INNER JOIN livros 
                ON livros.id_livro = arquivos.livro_id 
            WHERE arquivos.is_capa = 1
        ");
        
        // Executa a consulta
        $stmtImagem->execute();
        
        // Obtém os resultados da consulta
        return $stmtImagem->fetchAll(PDO::FETCH_ASSOC);

    }
    
    ?>
