    <?php
    session_start();
    include_once(__DIR__ . '/../config.php'); // Inclui todas as configurações e funções globais
    file_put_contents('log.txt', "Requisição recebida: " . json_encode($_POST) . "\n", FILE_APPEND);
    if (isset($_COOKIE['filtro_daltonismo'])) {
    $filtroDaltonismo = $_COOKIE['filtro_daltonismo'];
    echo '<body class="' . htmlspecialchars($filtroDaltonismo) . '">';
} else {
    echo '<body>';
}

    // Verifica se a requisição para remover um livro foi enviada
    if (isset($_POST['acao']) && $_POST['acao'] === 'removerDoCarrinho' && isset($_POST['id_livro'])) {
        $idLivro = (int) $_POST['id_livro'];

        // Remove o ID do livro da sessão 'carrinho'
        if (isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = array_diff($_SESSION['carrinho'], [$idLivro]);
        }

        echo json_encode(['success' => true]);
        exit;
    }
    if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
        // Criar uma lista de IDs seguros
        $idsLivros = implode(',', array_map('intval', $_SESSION['carrinho']));
        $livrosCarrinho = BuscaLivro($idsLivros,FALSE);
    }
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Favoritos</title>
        <link rel="stylesheet" href="../css/modulos.css">
        <link rel="stylesheet" href="../css/carrinho.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    </head>

    <body>
        <main>
            <div class="loved_books">
                <label style="text-align:initial">MEU CARRINHO</label>
                
                <?php

                if (!empty($livrosCarrinho)): ?>
                    <?php foreach ($livrosCarrinho as $livro): ?>
                        <div class="box_favorite" data-id="<?php echo $livro['id_livro']; ?>">
                        <?php
                            if ($livro) {
                                    echo '<div class="book_card">';
                                    echo '<a href="Livro.php?id_livro=' . urlencode($livro['id_livro']) . '">';
                                    echo '<img src="/bookersgalaxy/' . htmlspecialchars($livro['path']) . '" alt="Imagem de ' . htmlspecialchars($livro['Titulo']) . '">';
                                    echo htmlspecialchars($livro['Titulo']) . " - " . htmlspecialchars($livro['Autor']);
                                    echo "<br>R$ " . htmlspecialchars(number_format($livro['Preco'], 2, ',', '.'));
                                    echo '</a>';
                                    echo '</div>';
                            } else {
                                echo 'Nenhum livro encontrado para exibir.';
                            }
                            ?>
                            <div class="acoes">
                                <button class="favorite-btn" onclick="toggleFavorite(this, <?php echo htmlspecialchars(json_encode($livro)); ?>)">
                                    <div class="icon-box"></div>
                                </button>
                                <button class="remove-btn" onclick="removeFromCart(<?php echo $livro['id_livro']; ?>)"><span class="material-symbols-outlined">delete</span></button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-cart">
                        <p>Adicione livros ao seu carrinho!</p>
                        <a href="../index.php" class="home-button">Voltar para a Home</a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="selected_books">
                <label>SELECIONADOS</label>
                <div id="selectedItems"></div>
            </div>
        </main>

        <?php 
            include("../modulos/footer.php");
        ?>


        <script>
            function toggleFavorite(button, livro) {    
                const iconBox = button.querySelector('.icon-box');
                const isFavorited = iconBox.getAttribute('data-favorited') === 'true';
                iconBox.setAttribute('data-favorited', !isFavorited);

                if (!isFavorited) {
                    // Adiciona a box do livro no lado direito se ela não existir
                    if (!document.getElementById(`selected-${livro.id_livro}`)) {
                        addBookToSelected(livro);
                    }
                } else {
                    // Remove a box de seleção do lado direito para o livro desmarcado
                    removeBookFromSelected(livro.id_livro);
                }
            }

            function addBookToSelected(livro) {
                const selectedItems = document.getElementById('selectedItems');

                // Evita duplicação de boxes para o mesmo livro
                if (document.getElementById(`selected-${livro.id_livro}`)) return;

                // Cria a estrutura da box do livro selecionado
                const bookContainer = document.createElement('div');
                bookContainer.id = `selected-${livro.id_livro}`;
                bookContainer.classList.add('selected-book');

                // Inclui a imagem, informações e seletor de quantidade
                bookContainer.innerHTML = `
        <img src="${livro.arquivos_path}" alt="Capa do livro" style="width: 50px; height: 75px;">
        <div class="livro-info">
            <h4>${livro.titulo} - ${livro.autor}</h4>
            <p>R$ ${Number(livro.preco).toFixed(2).replace('.', ',')}</p>
            <label>Quantidade:</label>
            <input type="number" min="1" value="1" class="quantidade" data-id="${livro.id_livro}">
        </div>
    `;

                selectedItems.appendChild(bookContainer);
            }

            function removeBookFromSelected(livroId) {
                const selectedBook = document.getElementById(`selected-${livroId}`);
                if (selectedBook) {
                    selectedBook.remove();
                }
            }

            function removeFromCart(livroId) {
                fetch('./carrinho.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: `acao=removerDoCarrinho&id_livro=${livroId}`
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Remove o livro da interface do carrinho
                            const favoriteBook = document.querySelector(`.box_favorite[data-id="${livroId}"]`);
                            if (favoriteBook) {
                                favoriteBook.remove();
                            }

                            // Remove também a box no lado direito (selecionados)
                            removeBookFromSelected(livroId);
                        } else {
                            alert("Erro ao remover o livro do carrinho.");
                        }
                    })
                    .catch(error => console.error('Erro:', error));
            }
        </script>
    </body>

    </html>