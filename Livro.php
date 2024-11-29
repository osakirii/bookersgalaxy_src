<?php
session_start();
include_once(__DIR__ . '/config.php'); // Inclui todas as configurações e funções globais
if (isset($_SESSION['cliente_id'])) {
    $userId = $_SESSION['cliente_id'];
}

// Obtém o ID do livro da URL
$id_livro = isset($_GET['id_livro']) ? (int)$_GET['id_livro'] : null;
try {
    if ($id_livro !== null) {
        $livros = BuscaLivro($id_livro);

        if (!$livros) {
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
    <title>Livros Cadastrados</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=theater_comedy" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


    <script src="https://kit.fontawesome.com/4fba40120f.js" crossorigin="anonymous"></script>

    <!--LINK DO CSS -->
    <link rel="stylesheet" href="./css/livro.css">
    <link rel="stylesheet" href="./css/modulos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--LINK DO CSS -->


    <!-- LINK DO JS -->
    <script src="js/Script_Carrossel.js" defer></script>
    <!-- LINK DO JS -->
</head>

<header>
    <?php if ($livros): ?>
        <?php foreach ($livros as $livro): ?>
            <h2>DESTAQUES DE 2024 > <?php echo htmlspecialchars($livro['Titulo']); ?></h2>
        <?php endforeach; ?>
    <?php endif; ?>
</header>

<container class="containerPai">
    <aside>
        <div class="carrossel-container">
            <?php $imagens = BuscaLivro($id_livro, true); ?>
            <div class="sandwich">
                <?php if ($imagens): ?>
                    <?php foreach ($imagens as $imagem): ?>
                        <img src="<?php echo htmlspecialchars($imagem['path']); ?>"
                            class="sandwich-item"
                            alt="Imagem de <?php echo htmlspecialchars($livro['Titulo']); ?>">
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>
    </aside>
    <main> 
        <div id="imagemCentral">
            <?php
            if ($livros) {
                $primeiroLivro = isset($livros[0]['id_livro']) ? $livros[0]['id_livro'] : null;
                $imagens = BuscaLivro($id_livro, true);
                if ($imagem) {
                    echo '<img src="' . htmlspecialchars($imagem['path']) . '" alt="Imagem de ' . htmlspecialchars($livros[0]['Titulo']) . '">';
                }
            }
            ?>
        </div>

    </main>
        <!--PARTE DAS INFORMAÇÕES-->
        <div class="container_infos">
        <div class="info-box">
            <h2 class="titulo"><?php echo htmlspecialchars($livro['Titulo']); ?></h2>
            <h4 class="autor"><?php echo htmlspecialchars($livro['Autor']); ?> - <?php echo date("d/m/Y", strtotime(htmlspecialchars($livro['Data_lancamento']))); ?></h4>
        </div>

        <!-- Sinopse -->
        <div class="sinopse-container">
            <p class="psombra">
                <?php
                $sinopseCompleta = htmlspecialchars($livro['Sinopse']);
                $sinopseCurta = mb_strimwidth($sinopseCompleta, 0, 280, "...");
                ?>
                <span><?php echo $sinopseCurta; ?></span>
                <span class="sinopse-completa">
                    <?php echo mb_substr($sinopseCompleta, 180); ?>
                </span>
                <?php if (mb_strlen($sinopseCompleta) > 280): ?>
                    <button class="mostrar_mais" onclick="toggleSinopse(this)">Ler mais</button>
                <?php endif; ?>
            </p>
        </div>

        <!-- Informações funcionais com ícones e botões -->
        <div class="container_additions">
            <!-- Ícones de informações à esquerda -->
            <div class="info_column">
                <div class="info_item"><i class="bi bi-book"></i> <span><?php echo htmlspecialchars($livro['QntPaginas']); ?> Páginas</span></div>
                <div class="info_item"><i class="bi bi-pencil-square"></i> <span><?php echo htmlspecialchars($livro['NomeEditora']); ?></span></div>
                <div class="info_item"><i class="material-symbols-outlined">theater_comedy</i> <span><?php echo htmlspecialchars($livro['Genero']); ?></span></div>
                <div class="info_item"><i class="bi bi-box-seam"></i> <span><?php echo htmlspecialchars($livro['Estoque']); ?></span></div>
                <div class="info_item"><i class="bi bi-star-fill"></i> <span><?php echo htmlspecialchars($livro['Avaliacao']); ?></span></div>
            </div>

            <!-- Parte funcional à direita -->
            <div class="functional_column">
                <span id="precinho">R$<?php echo htmlspecialchars(number_format($livro['Preco'], 2, ',', '.')); ?></span>
                <?php if (isset($_SESSION['cliente_id'])): ?>
                    <button name="btn_comprar" type="submit">Comprar agora</button>
                <?php else: ?> 
                    <button name="btn_comprar" onclick="alert('Faça login para comprar')">Comprar agora</button>
                <?php endif; ?>
                <button id="favoritarBtn" class="heart-icon" title="Adicionar aos favoritos" style="height: 100px"><i class="fas fa-heart"></i></button>
                <button class="sticks" title="Adicionar ao carrinho" onclick="adicionarAoCarrinho(<?php echo htmlspecialchars($id_livro); ?>)">
                    <hr id="stick1">
                    <hr id="stick2">
                    <!--<div class="add_cart_txt">
                        <p>Adicionar ao Carrinho</p>
                    </div> NÃO MEXER-->
                </button>

            </div>
        </div>
    </div>

    
    </div>

</container>


<!--///////////////////////////////////!-->
<!--LIVROS SEMELHANTES!-->
<h2 style="margin: 50px 50px 0 50px;">SEMELHANTES A ESSE LIVRO</h2>
<div class="carousel-container">
    <button class="carousel-btn left-btn">&lt;</button>
    <div class="similar_books">
        <?php
            $livros = BuscaLivro(); // Chama a função BuscaLivro()

            if ($livros) {
                foreach ($livros as $livro) {
                    echo '<div class="book_card">';
                    echo '<a href="Livro.php?id_livro=' . urlencode($livro['id_livro']) . '">';
                    echo '<img src="/bookersgalaxy/' . htmlspecialchars($livro['path']) . '" alt="Imagem de ' . htmlspecialchars($livro['Titulo']) . '">';
                    echo '<div class="infoSemelhantes"<br>' .htmlspecialchars($livro['Titulo']) . " - " . htmlspecialchars($livro['Autor']);
                    echo "<br>R$ " . htmlspecialchars(number_format($livro['Preco'], 2, ',', '.'));
                    echo '</a>';
                    echo '</div></div>';
                }
            } else {
                echo 'Nenhum livro encontrado para exibir.';
            }
        ?>
    </div>
    <button class="carousel-btn right-btn">&gt;</button>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.similar_books');
    const leftBtn = document.querySelector('.left-btn');
    const rightBtn = document.querySelector('.right-btn');

    leftBtn.addEventListener('click', () => {
        container.scrollBy({
            left: -300, // Ajuste a distância de rolagem
            behavior: 'smooth',
        });
    });

    rightBtn.addEventListener('click', () => {
        container.scrollBy({
            left: 300, // Ajuste a distância de rolagem
            behavior: 'smooth',
        });
    });
});

</script>
</div><!--
<p></p>COMENTÁRIOS RELEVANTES</p>
<div class="comments">
    <div class="comment_box">
        <?php
        $con = Connect::getInstance();
        try {
            $stmt = $con->prepare("SELECT nome_completo,foto FROM usuario WHERE id_usuario = :id_usuario");
            $stmt->bindParam(':id_usuario', $userId, PDO::PARAM_INT);
            $stmt->execute();
            $infos_p = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($infos_p as $infos_pp) {
                echo "<div class='profile_pic'><img src='uploads/" . $infos_pp['foto'] . "' alt='Foto de perfil'></div>";
                echo "<div class='username'>" . $infos_pp['nome_completo'] . "</div>";
                echo "<img src='icons/blocked_icon.png' class='blocked_icon' alt='Ícone de bloqueio'>";
                $stmt = $con->prepare("SELECT nota,texto,data_comentario,imagem1,imagem2,imagem3,imagem4,imagem5 FROM avaliacoes");
                $stmt->execute();
                $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($comentarios as $comentario) {
                    echo "<div class='comment_date'>" . $comentario['data_comentario'] . "<br>" . $comentario['nota'] . "</div>";
                    echo "<div class='comment_text'>" . $comentario['texto'] . "</div>";
                    echo "<div class='action_buttons'><span class='material-symbols-outlined'>thumb_up</span><span class='material-symbols-outlined'>thumb_down</span></div>";
                }
            }
        } catch (Exception $e) {
            echo "Erro: " . htmlspecialchars($e->getMessage());
        }

        ?>
    </div>
</div>-->

<?php
include("modulos/footer.php");
?>


<script>
    function trocarImagemCentral(novaImagemSrc, novaLegenda) {
        const imagemCentral = document.getElementById('imagemCentral').querySelector('img');

        imagemCentral.src = novaImagemSrc;
        imagemCentral.alt = novaLegenda;
    }

    document.querySelectorAll('aside img').forEach(img => {
        img.addEventListener('click', function() {
            trocarImagemCentral(this.src, this.alt);
        });
    });

    function toggleFavorite(idLivro) {
        const userId = <?php echo json_encode($userId); ?>; // ID do usuário da sessão

        fetch('compra/carrinho.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    acao: 'favoritar',
                    user_id: userId,
                    id_livro: idLivro
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Livro favoritado com sucesso!");
                    // Atualize o ícone para refletir o estado de favorito
                    const heartIcon = document.getElementById(`heartIcon-${idLivro}`);
                    heartIcon.style.color = data.favoritado ? 'red' : 'grey';
                } else {
                    alert("Erro ao favoritar o livro.");
                }
            })
            .catch(error => console.error('Erro:', error));
    }


    // Função para adicionar item ao carrinho e armazenar no Local Storage
    function adicionarAoCarrinho(idLivro) {
        console.log("Função adicionarAoCarrinho chamada com ID:", idLivro);
        fetch('/bookersgalaxy/modulos/funcs.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    acao: 'adicionarCarrinho',
                    id_livro: idLivro
                })
            })

            .then(response => response.json())
            .then(data => {
                console.log('Resposta recebida:', data);
                if (data.success) {
                    alert("Livro adicionado ao carrinho com sucesso!");
                } else {
                    alert("Erro ao adicionar ao carrinho: " + (data.error || 'Erro desconhecido.'));
                }
            })
            .catch(error => console.error('Erro na requisição:', error));
    }




    // Função para carregar o carrinho quando a página do carrinho é aberta
    function carregarCarrinho() {
        // Recupera o carrinho do Local Storage
        let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

        // Exibe cada item na interface do carrinho
        carrinho.forEach(item => {
            // Função para criar o HTML do item na página
            exibirItemCarrinho(item);
        });
    }

    // Exemplo de uso do Local Storage ao clicar no botão
    document.querySelectorAll('.sticks').forEach(botao => {
        botao.addEventListener('click', function() {
            const livroId = this.dataset.id;
            const livroDados = {
                titulo: this.dataset.titulo,
                preco: this.dataset.preco
                // Adicione outros detalhes conforme necessário
            };
            adicionarAoCarrinho(livroId, livroDados);
        });
    });

    // Chame carregarCarrinho() quando a página do carrinho carregar
    document.addEventListener('DOMContentLoaded', carregarCarrinho);

    function toggleSinopse(button) {
        const sinopseContainer = button.closest('.sinopse-container');
        const sinopseCompleta = sinopseContainer.querySelector('.sinopse-completa');

        if (sinopseContainer.classList.contains("expandido")) {
            // Recolhe a sinopse
            sinopseContainer.classList.remove("expandido");
            sinopseCompleta.classList.remove("expandida");
            button.innerText = "Ler mais";
        } else {
            // Expande a sinopse
            sinopseContainer.classList.add("expandido");
            sinopseCompleta.classList.add("expandida");
            button.innerText = "Ler menos";
        }
    }
</script>
</body>

</html>