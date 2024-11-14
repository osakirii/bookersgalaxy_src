<?php
session_start();
include_once(__DIR__ . '/../config.php'); // Inclui todas as configurações e funções globais
$con = Connect::getInstance();
$_SESSION['user_id'] = 11;
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    echo "Nenhum ID de usuário encontrado na sessão.";
}

try {
    if ($userId !== null) {
        $stmt = $con->prepare("
        SELECT livros.id_livro, livros.titulo, livros.autor, livros.preco, arquivos.path AS imagem_caminho
        FROM livros
        INNER JOIN favoritos ON favoritos.id_livro = livros.id_livro
        LEFT JOIN arquivos ON arquivos.livro_id = livros.id_livro
        WHERE favoritos.id_usuario = :id_usuario
        GROUP BY livros.id_livro
    ");
        $stmt->bindParam(':id_usuario', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $livrosFavoritos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtém todos os livros favoritados pelo usuário

        if (!$livrosFavoritos) {
            echo "Livro não encontrado.";
        }
    } else {
        echo "ID do livro não fornecido.";
    }
} catch (PDOException $e) {
    echo "Erro: " . htmlspecialchars($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos</title>
    <link rel="stylesheet" href="./css/modulos.css">
    <link rel="stylesheet" href="./css/favoritos.css">
    <!--ICONES-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


</head>

<body>


    <main>
        <div class="loved_books">
            <label style="text-align:initial">MEUS FAVORITOS</label>
            <?php foreach ($livrosFavoritos as $livro): ?>
                <div class="box_favorite">
                    <img src="<?php echo $livro['imagem_caminho']; ?>" alt="Capa do livro">
                    <div class="livro-info">
                        <input type="hidden" value=" <?php echo $livro['id_livro']; ?>">
                        <h4><?php echo $livro['titulo']; ?> - <?php echo $livro['autor']; ?></h4>
                        <p>R$ <?php
                        $idLivro = $livro['id_livro'];
                        echo number_format($livro['preco'], 2, ',', '.'); ?></p>
                    </div>
                    <div class="acoes">
                        <form action="./funcoes/functions.php" method="post">
                            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($userId); ?>">
                            <input type="hidden" name="id_livro" value="<?php echo htmlspecialchars($idLivro); ?>">
                            <button onclick="toggleFavorite()" id="favoritarBtn" name="favoritar" class="btn" type="submit">
                                <?php
                                $stmt = $con->prepare("SELECT estado FROM favoritos WHERE id_usuario = ? AND id_livro = ?");
                                $stmt->execute([$userId, $idLivro]);
                                if ($stmt->rowCount() > 0) {

                                    $favoritado = $stmt->fetchColumn(); // Pega o valor do  (0 ou 1)
                                    if ($favoritado) {
                                        echo "<i id='heartIcon' class='fas fa-heart' style='color:red;'></i>";
                                    } else {
                                        echo "<i id='heartIcon' class='fas fa-heart' style='color:grey;'></i>";
                                    }
                                } else {
                                    echo "<i id='heartIcon' class='fas fa-heart' style='color:grey;'></i>";
                                }
                                ?>
                            </button>
                            <button class="carrinho"><i class="fas fa-shopping-cart"></i></button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="box_carousels">
            <label>VISUALIZADOS RECENTEMENTE</label>
            <div class="box_carousel">
                <span class="material-symbols-outlined" onclick="moveCarousel(-1)">
                    arrow_left_alt
                </span>
                <div class="carousel_track">
                    <?php foreach ($livrosFavoritos as $livro):
                        echo "<div class='livro-info'>";
                        echo '<a href="listarLivros.php?id_livro=' . urlencode($livro['id_livro']) . '">';
                        echo "<img src='" . $livro['imagem_caminho'] . "' alt='Capa do livro'>";
                        echo "<h4>" . $livro['titulo'] . $livro['autor'] . "</h4>";
                        echo "<p>R$ " . number_format($livro['preco'], 2, ',', '.') . "</p>";
                        echo "</a> </div>";

                    endforeach; ?>
                </div>
                <span id="seta_direita" class="material-symbols-outlined" style="margin-right:340px;"
                    onclick="moveCarousel(1)">
                    arrow_forward
                </span>
            </div>

            <label>RETIRADOS DOS FAVORITOS</label>
            <div class="box_carousel">
                <span class="material-symbols-outlined" onclick="moveCarousel(-1)">
                    arrow_left_alt
                </span>
                <div class="carousel_track">
                    <?php foreach ($livrosFavoritos as $livro):
                        echo "<div class='livro-info'>";
                        echo '<a href="listarLivros.php?id_livro=' . urlencode($livro['id_livro']) . '">';
                        echo "<img src='" . $livro['imagem_caminho'] . "' alt='Capa do livro'>";
                        echo "<h4>" . $livro['titulo'] . $livro['autor'] . "</h4>";
                        echo "<p>R$ " . number_format($livro['preco'], 2, ',', '.') . "</p>";
                        echo "</a> </div>";

                    endforeach; ?>
                </div>
                <span id="seta_direita" class="material-symbols-outlined" onclick="moveCarousel(1)">
                    arrow_forward
                </span>
            </div>
        </div>
    </main>

    <?php
    include("../modulos/footer.php");
    ?>
    <script>
        let currentIndex = 0;
        let itemWidth = 240; // Valor padrão

        function checkScreenWidth() {
            const mediaQuery = window.matchMedia("(max-width: 768px)");
            itemWidth = mediaQuery.matches ? 190 : 240; // Define a largura dependendo da tela
            moveCarousel(0); // Reseta a posição do carrossel
        }

        function moveCarousel(direction) {
            const track = document.querySelector('.carousel_track');
            const items = document.querySelectorAll('.carousel_track .livro-info');
            const visibleItems = 3; // Número de itens visíveis
            const maxIndex = items.length - visibleItems;

            // Atualiza o índice com base na direção e limita o valor
            currentIndex += direction;
            if (currentIndex < 0) currentIndex = maxIndex;
            if (currentIndex > maxIndex) currentIndex = 0;

            // Calcula o deslocamento e aplica a transformação
            const offset = currentIndex * -itemWidth;
            track.style.transform = `translateX(${offset}px)`;
        }

        checkScreenWidth();
        // Adiciona um listener para detectar mudanças no tamanho da tela
        window.addEventListener("resize", checkScreenWidth);

        // Adiciona os eventos de clique para os botões de navegação
        document.querySelector('#seta_esquerda').addEventListener('click', () => moveCarousel(-1));
        document.querySelector('#seta_direita').addEventListener('click', () => moveCarousel(1));

        function toggleFavorite(idLivro) {
            const userId = <?php echo json_encode($userId); ?>; // Adapte isso para pegar o ID do usuário correto
            const heartIcon = document.getElementById(`btnh1-${idLivro}`);

            fetch('./funcoes/functions.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `user_id=${userId}&id_livro=${idLivro}&favoritar=1`,
            })
                .then(response => response.text())

                .catch(error => console.error('Error:', error));
        }
    </script>
</body>

</html>