<?php
session_start();
include_once(__DIR__ . '/../config.php');

// Verifique se a sessão do carrinho está configurada corretamente
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Log da requisição para depuração
file_put_contents('log.txt', "Requisição recebida: " . json_encode($_POST) . "\n", FILE_APPEND);

if (isset($_POST['acao']) && $_POST['acao'] === 'removerDoCarrinho' && isset($_POST['id_livro'])) {
    $idLivro = (int) $_POST['id_livro'];

    // Remova o ID do livro da sessão
    if (isset($_SESSION['carrinho'][$idLivro])) {
        unset($_SESSION['carrinho'][$idLivro]);
    }

    echo json_encode(['success' => true]);
    exit;
}

// Listar itens no carrinho com segurança
if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
    $idsLivros = implode(',', array_map('intval', array_keys($_SESSION['carrinho'])));

    // Executar apenas se houver livros no carrinho
    if ($idsLivros) {
        $stmt = $con->prepare("
            SELECT livros.id_livro, livros.titulo, livros.autor, livros.preco, MIN(arquivos.path) AS arquivo_path
            FROM livros
            LEFT JOIN arquivos ON arquivos.livro_id = livros.id_livro
            WHERE livros.id_livro IN ($idsLivros)
            GROUP BY livros.id_livro
        ");
        $stmt->execute();
        $livrosCarrinho = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $livrosCarrinho = [];
    }
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
    <main id="corpo">
        <div id="main">
            <!-- Área de livros no carrinho -->
        <div class="loved_books">
            <label style="text-align:initial"><h2>CARRINHO</h2></label>

            <?php if (!empty($livrosCarrinho)): ?>
                <?php foreach ($livrosCarrinho as $livro): ?>
                    <div class="box_favorite" data-id="<?php echo $livro['id_livro']; ?>">
                        <img src="<?php echo "../" . $livro['arquivo_path']; ?>" alt="Capa do livro">
                        <div class="livro-info">
                            <h4><?php echo htmlspecialchars($livro['titulo']); ?> - <?php echo htmlspecialchars($livro['autor']); ?></h4>
                            <p>R$ <?php echo number_format($livro['preco'], 2, ',', '.'); ?></p>
                        </div>
                        <div class="acoes">
                            <button class="favorite-btn" onclick="toggleFavorite(this, <?php echo htmlspecialchars(json_encode($livro)); ?>)">
                                <div class="icon-box"></div>
                            </button>
                            <button class="remove-btn" onclick="removeFromCart(<?php echo $livro['id_livro']; ?>)">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="empty-cart">
                    <p>Adicione livros ao seu carrinho!</p>
                    <a href="/bookersgalaxy/index.php" class="home-button">Voltar para a Home</a>
                </div>
            <?php endif; ?>
        </div>
        
        <div id="selecionados">
        <!-- Área de livros selecionados -->
        <div class="selected_books">
            <label>SELECIONADOS</label>
            <div id="selectedItems"></div>

        </div>
        <!-- Formulário para envio dos livros selecionados -->
        <form id="checkoutForm" action="finalizar.php" method="POST">
                <input type="hidden" name="selected_books" id="selectedBooksInput">
                <button type="submit">Prosseguir Compra</button>
            </form>
    </div>
</div>
        
    </main>
    <script>
        const selectedBooks = {}; // Certifique-se de que o objeto é inicializado com a letra "S" maiúscula

        function toggleFavorite(button, livro) {
            const iconBox = button.querySelector('.icon-box');
            const isFavorited = iconBox.getAttribute('data-favorited') === 'true';
            iconBox.setAttribute('data-favorited', !isFavorited);

            if (!isFavorited) {
                addBookToSelected(livro);
            } else {
                removeBookFromSelected(livro.id_livro);
            }

            updateSelectedBooksInput();
        }

        function addBookToSelected(livro) {
            // Evita duplicação: se o livro já está selecionado, não o adiciona novamente
            if (!selectedBooks[livro.id_livro]) {
                selectedBooks[livro.id_livro] = {
                    ...livro,
                    quantidade: 1
                }; // Adiciona livro com quantidade padrão 1
            }

            // Verifica se o livro já está exibido na área de selecionados
            if (!document.getElementById(`selected-${livro.id_livro}`)) {
                const selectedItems = document.getElementById('selectedItems');

                // Cria o contêiner do livro selecionado
                const bookContainer = document.createElement('div');
                bookContainer.id = `selected-${livro.id_livro}`;
                bookContainer.classList.add('selected-book');

                // Define a estrutura HTML do livro selecionado
                bookContainer.innerHTML = `
                    <img src="../${livro.arquivo_path}" alt="Capa do livro" style="width: 50px; height: 75px;">
                    <div class="livro-info">
                        <h4>${livro.titulo} - ${livro.autor}</h4>
                        <p>R$ ${Number(livro.preco).toFixed(2).replace('.', ',')}</p>
                        <label>Quantidade:</label>
                        <input type="number" min="1" width="20px" value="1" class="quantidade" data-id="${livro.id_livro}" onchange="updateQuantity(${livro.id_livro}, this.value)">
                    </div>
                `;

                // Adiciona o contêiner do livro ao elemento de livros selecionados
                selectedItems.appendChild(bookContainer);
            }

            updateSelectedBooksInput(); // Atualiza o campo oculto do formulário com os dados dos livros selecionados
        }

        function removeBookFromSelected(livroId) {
            delete selectedBooks[livroId];
            const selectedBook = document.getElementById(`selected-${livroId}`);
            if (selectedBook) {
                selectedBook.remove(); // Remove o elemento do DOM
            }
            updateSelectedBooksInput();
        }

        function updateQuantity(livroId, quantidade) {
            if (selectedBooks[livroId]) {
                selectedBooks[livroId].quantidade = parseInt(quantidade);
                updateSelectedBooksInput();
            }
        }

        function updateSelectedBooksInput() {
            document.getElementById('selectedBooksInput').value = JSON.stringify(Object.values(selectedBooks));
        }
    </script>
</body>

</html>