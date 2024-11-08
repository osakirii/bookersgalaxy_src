<<<<<<< HEAD
<?php
function Busca($id) {
    global $pdo; 
    
    $stmt = $pdo->prepare("SELECT path FROM arquivos WHERE id = :id"); // Confirme se 'path' é o nome correto do campo
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $mostrar = [];
    if ($mostrar = $stmt->fetch(PDO::FETCH_ASSOC)) {
        return $mostrar; // Retorna o array com 'id_livro' e 'path'

    } else {
        return[
            'path'=>$mostrar['path'],
            'id_livro'=>$mostrar['id_livro']
        ];    }
}
?>
=======
<?php
function Busca($id) {
    global $pdo; 
    
    $stmt = $pdo->prepare("SELECT path FROM arquivos WHERE id = :id"); // Confirme se 'path' é o nome correto do campo
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    if ($mostrar = $stmt->fetch(PDO::FETCH_ASSOC)) {
        return $mostrar['path'];
    } else {
        return '../img/icons/blocked_icon.png'; // Caminho para imagem padrão
    }
}
?>
>>>>>>> 70a5a7598c8c2a87cfa34de9530ee513efdcc22e
