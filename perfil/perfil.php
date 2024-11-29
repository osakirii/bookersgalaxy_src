<?php
    session_start();
    include_once(__DIR__ . '/../config.php'); // Inclui todas as configurações e funções globais
    $con = Connect::getInstance();
    if (isset($_SESSION['cliente_id'])) {
        $userId = $_SESSION['cliente_id'];
        $nomeUsuario = $_SESSION['nomeUsuario'];

    }
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/perfil.css">
        <link rel="stylesheet" href="../css/index.css">
        <title>Perfil</title>
    </head>
    <body>
        <main id="corpo">
            <h1>MEU PERFIL</h1>

            <section id="perfil">
                <div class="perfilContainer">
                
                <img src="../img/usuario/placeholder.png" alt="placeholder.png">
                </div>
                <div class="perfilContainer">
                    <p>| <?php echo $nomeUsuario ?></p>
                    <a href="editarPerfil.php">
                        <i class="fas fa-pen-to-square"></i><p>Editar Perfil</p>
                </a>
                    <a href="">
                        <i class="fas fa-address-book"></i><p>Dados Pessoais</p>
                </a>
                </div>
                <div class="perfilContainer">
                    <a href="/bookersgalaxy/compra/carrinho.php">
                        <i class="fas fa-cart-shopping"></i><p>Carrinho</p>
                        </a>
                    <a href="#">
                        <i class="fas fa-location-dot"></i><p>Endereços</p>
                        </a>
                    <a href="pedidos.php">
                        <i class="fas fa-boxes-packing"></i><p>Pedidos</p>
                        </a>
                    <a href="favoritos.php">
                        <i class="far fa-heart"></i><p>Favoritos</p>
                        </a>
                </div>
        </section>

        <h1>VISTOS POR ÚLTIMO POR <?php echo $nomeUsuario?></h1>

            <section class="estante">
        <?php
            $livros = BuscaLivro(); // Chama a função BuscaLivro()

            // Verifica se encontrou livros
            if ($livros) {
                foreach ($livros as $livro) {
                    echo '<div class="livro style="flex-flow: row wrap;">';
                    echo '<a href="../Livro.php?id_livro=' . urlencode($livro['id_livro']) . '">';
                    echo '<img src="/bookersgalaxy/' . htmlspecialchars($livro['path']) . '" alt="Imagem de ' . htmlspecialchars($livro['Titulo']) . '">';
                    echo '</a>';
                    echo '<div class="livro-texto">';
                    echo '<p class="nomeAutor">' . htmlspecialchars($livro['Autor']) . '</p>';
                    echo '<p>' . htmlspecialchars($livro['Titulo']) . '</p>';
                    echo '<p class="valor">R$ ' . htmlspecialchars(number_format($livro['Preco'], 2, ',', '.'));
                    echo '</div></div>';
                }
            } else {
                echo 'Nenhum livro encontrado para exibir.';
            }
            ?>
        </main>
    </body>
</html>