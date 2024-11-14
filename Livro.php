<?php
session_start();
include_once(__DIR__ . '/config.php'); // Inclui todas as configurações e funções globais


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

<div class="main_content">
    <aside>
        <div class="carrossel-container">
            <?php $imagens = BuscaLivro($id_livro, true); ?>
            <div class="carrossel">
                <?php if ($imagens): ?>
                    <?php foreach ($imagens as $imagem): ?>
                        <img src="<?php echo htmlspecialchars($imagem['path']); ?>"
                            class="carrossel-item"
                            alt="Imagem de <?php echo htmlspecialchars($livro['Titulo']); ?>">
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <button class="prev" onclick="plusSlides(-1)">
                <div class="sticks_carosel">
                    <hr class="stick_esq">
                    <hr class="stick_dir">
                </div>
            </button>

            <button class="next" onclick="plusSlides(1)">
                <div class="sticks_carosel">
                    <hr class="stick_esqB">
                    <hr class="stick_dirB">
                </div>
            </button>
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
        <?php if ($livros): ?>
            <?php foreach ($livros as $livro): ?>
                <div class="info-box">
                    <h2 class="psombra">
                        <?php echo htmlspecialchars($livro['Titulo']); ?>
                    </h2>

                    <!-- Sinopse com container rolável -->
                    <div class="sinopse-container">
                        <p class="psombra">
                            <?php
                            $sinopseCompleta = htmlspecialchars($livro['Sinopse']);
                            $sinopseCurta = mb_strimwidth($sinopseCompleta, 0, 2180, "...");
                            ?>
                            <span><?php echo $sinopseCurta; ?></span>
                            <span class="sinopse-completa">
                                <?php echo mb_substr($sinopseCompleta, 180); ?> <!-- Usa mb_substr para pegar o restante -->
                            </span>

                            <?php if (mb_strlen($sinopseCompleta) > 20): ?>
                                <button class="mostrar_mais" onclick="toggleSinopse(this)">Ler mais</button>
                            <?php endif; ?>
                        </p>
                    </div>

                    <!-- Outros conteúdos e botões -->
                    <div class="container_additions">
                        <!-- Conteúdo adicional -->
                    </div>
                </div>



                <!--PARTE DAS INFORMAÇÕES-->

                <div class="container_additions">
                    <div class="info_column">
                        <div class="info_item">
                            <i class="bi bi-book"></i> <span><?php echo htmlspecialchars($livro['QntPaginas']); ?> Páginas</span>
                        </div>
                        <div class="info_item">
                            <i class="bi bi-pencil-square"></i>
                            <span><?php echo htmlspecialchars($livro['NomeEditora']); ?></span>
                        </div>
                        <div class="info_item">

                            <span class="material-symbols-outlined">theater_comedy</span>
                            <span><?php echo htmlspecialchars($livro['Genero']); ?></span>
                        </div>
                        <div class="info_item">
                            <i class="bi bi-box-seam"></i> <span><?php echo htmlspecialchars($livro['']); ?></span>
                        </div>
                        <div class="info_item">
                            <i class="bi bi-star-fill"></i>
                            <span><?php echo htmlspecialchars($livro['  ']); ?></span>
                        </div>
                    </div>

                    <!--PARTE FUNCIONAL !-->
                    <div class="functional_column">
                        <span>R$ <?php echo htmlspecialchars(number_format($livro['Preco'], 2, ',', '.')); ?></span>
                        <?php if (isset($_SESSION['cliente_id'])): ?>
                            <button name="btn_comprar" type="submit">Comprar agora</button>
                        <?php else: ?>
                            <button name="btn_comprar" onclick="alert('Faça login para comprar')">Comprar agora</button>
                        <?php endif; ?>

                        <div class="icon_sticks_container">
                            <div class="btns">
                                <form action="./funcoes/functions.php" method="post">
                                    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($userId); ?>">
                                    <input type="hidden" name="id_livro" value="<?php echo htmlspecialchars($id_livro); ?>">
                                    <button onclick="toggleFavorite(<?php echo htmlspecialchars($id_livro); ?>)" id="favoritarBtn" name="favoritar" class="btn" type="button">

                                        <?php
                                        if (isset($_SESSION['cliente_id'])) {
                                            $stmt = $con->prepare("SELECT estado FROM favoritos WHERE id_usuario = ? AND id_livro = ?");
                                            $stmt->execute([$userId, $id_livro]);
                                            if ($stmt->rowCount() > 0) {
                                                $favoritado = $stmt->fetchColumn(); // Pega o valor do  (0 ou 1)
                                                if ($favoritado) {
                                                    echo "<i id='heartIcon-{$id_livro}' class='fas fa-heart' style='color:red;'></i>";
                                                } else {
                                                    echo "<i id='heartIcon' class='fas fa-heart' style='color:grey;'></i>";
                                                }
                                            } else {
                                                echo "<i id='heartIcon' class='fas fa-heart' style='color:grey;'></i>";
                                            }
                                        } else {
                                            echo "<button onclick='alert('Faça login para favoritar este livro.')' class='btn' type='button'><i id='heartIcon' class='fas fa-heart' style='color:grey;'></i></button>";
                                        }

                                        ?>
                                    </button>
                                </form>
                            </div>
                            <button class="sticks" onclick="adicionarAoCarrinho(<?php echo htmlspecialchars($id_livro); ?>)">
                                <hr id="stick1">
                                <hr id="stick2">
                                <div class="add_cart_txt">
                                    <p>Adicionar ao Carrinho</p>
                                </div>
                            </button>


                        </div>
                    </div>
                    <!--PARTE FUNCIONAL !-->

                </div>
    </div>
</div>
<?php endforeach; ?>
<?php endif; ?>


<!--///////////////////////////////////!-->
<!--LIVROS SEMELHANTES!-->

<h2 style="font-weight:500;">SEMELHANTES A ESSE LIVRO</h2>
<div class="similar_books"><?php
                            $livros = BuscaLivro(); // Chama a função BuscaLivro()

                            if ($livros) {
                                foreach ($livros as $livro) {
                                    echo '<div class="book_card">';
                                    echo '<a href="Livro.php?id_livro=' . urlencode($livro['id_livro']) . '">';
                                    echo '<img src="/bookersgalaxy/' . htmlspecialchars($livro['path']) . '" alt="Imagem de ' . htmlspecialchars($livro['Titulo']) . '">';
                                    echo htmlspecialchars($livro['Titulo']) . " - " . htmlspecialchars($livro['Autor']);
                                    echo "<br>R$ " . htmlspecialchars(number_format($livro['Preco'], 2, ',', '.'));
                                    echo '</a>';
                                    echo '</div>';
                                }
                            } else {
                                echo 'Nenhum livro encontrado para exibir.';
                            }
                            ?>
</div>

<!--LIVROS SEMELHANTES!-->
<!--///////////////////////////////////!-->
<div class="second_content">
    <!--///////////////////////////////////!-->

    <div class="form_container">
        <!--

        <h2 style="font-weight:500;">AVALIAÇÃO DO LIVRO</h2>
      <form method="POST" action="processa.php">

            <div class="estrelas">

                <input type="radio" name="estrela" id="vazio" value="" checked>

                <label for="estrela_um"><i class="opcao fa"></i></label>
                <input type="radio" name="estrela" id="estrela_um" id="vazio" value="1">

                <label for="estrela_dois"><i class="opcao fa"></i></label>
                <input type="radio" name="estrela" id="estrela_dois" id="vazio" value="2">

                <label for="estrela_tres"><i class="opcao fa"></i></label>
                <input type="radio" name="estrela" id="estrela_tres" id="vazio" value="3">

                <label for="estrela_quatro"><i class="opcao fa"></i></label>
                <input type="radio" name="estrela" id="estrela_quatro" id="vazio" value="4">

                <label for="estrela_cinco"><i class="opcao fa"></i></label>
                <input type="radio" name="estrela" id="estrela_cinco" id="vazio" value="5"><br><br>

                <textarea name="mensagem" rows="4" cols="30" placeholder="Digite o seu comentário..."></textarea><br><br>

                <input type="submit" value="Cadastrar"><br><br>

            </div>
        </form>
        -->

        <form method="POST" enctype="multipart/form-data" onsubmit="return addComent(event, <?php echo htmlspecialchars($id_livro); ?>)">
            <p style="width:75%;">X% dos clientes gostaram de ‘Drácula’.<br><br>
                Qual foi a sua experiência durante a leitura desse livro? Faça também a sua avaliação!</p>
            <div class="form_group">
                <textarea id="texto_comentario" name="texto" rows="4" placeholder="Escreva seu comentario!" required></textarea>
            </div>

            <div class="form_group">
                <label>Imagens (Máximo de 5)</label>
                <input type="file" name="imagens[]" accept="image/*" multiple>
            </div>
            <div class="form_group">
                <button onclick="addComent(<?php echo htmlspecialchars($id_livro); ?>)">Enviar Comentário</button>
            </div>
        </form>
    </div>

    <div class="image_container">
        <h2>Imagens do Livro</h2>
        <img src="imagem_do_livro_1.jpg" alt="Imagem do Livro 1" class="book_image">
        <img src="imagem_do_livro_2.jpg" alt="Imagem do Livro 2" class="book_image">
    </div>
</div>
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
</div>

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

    function addComent(event, idLivro) {
        event.preventDefault(); // Evita o recarregamento da página

        const form = event.target; // O próprio formulário
        const formData = new FormData(form); // Captura todos os dados do formulário
        formData.append('acao', 'enviarComentario'); // Adiciona a ação específica
        formData.append('id_livro', idLivro);

        fetch('modulos/funcs.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Comentário enviado com sucesso!");
                    // Aqui você pode atualizar o DOM, mostrar uma mensagem de sucesso, etc.
                } else {
                    alert("Erro ao enviar o comentário: " + data.error);
                }
            })
            .catch(error => console.error('Erro:', error));
    }


    const stars = document.querySelectorAll('.star-rating label');
    stars.forEach(star => {
        star.addEventListener('mouseover', () => {
            const value = star.previousElementSibling.value;
            stars.forEach(s => {
                s.style.color = '#f39c12'; // Define a cor das estrelas
            });
            for (let i = value; i < stars.length; i++) {
                stars[i].style.color = '#ddd'; // Estrelas após a selecionada ficam vazias
            }
        });

        star.addEventListener('mouseout', () => {
            stars.forEach(s => {
                s.style.color = ''; // Reseta as cores
            });
            // Verifica se a estrela foi clicada e mantém a cor
            const checkedStar = document.querySelector('input[name="nota"]:checked');
            if (checkedStar) {
                const index = Array.from(stars).indexOf(star);
                if (index < stars.length) {
                    for (let i = 0; i <= index; i++) {
                        stars[i].style.color = '#f39c12'; // Preenche até a estrela selecionada
                    }
                }
            }
        });

        star.addEventListener('click', () => {
            const value = star.previousElementSibling.value;
            // Mantém as estrelas cheias até a estrela clicada
            stars.forEach((s, index) => {
                s.style.color = index < value ? '#f39c12' : '#ddd';
            });
        });
    });

    // Lógica para meia estrela
    const halfStar = document.getElementById('half-star');
    halfStar.addEventListener('mouseover', () => {
        stars.forEach(s => {
            s.style.color = '#f39c12'; // Meia estrela
        });
        halfStar.style.color = '#f39c12'; // Meia estrela cheia
    });

    halfStar.addEventListener('mouseout', () => {
        stars.forEach(s => {
            s.style.color = ''; // Reseta as cores
        });
        // Verifica se a meia estrela foi clicada
        const checkedStar = document.querySelector('input[name="nota"]:checked');
        if (checkedStar && checkedStar.value === '0.5') {
            stars.forEach(s => {
                s.style.color = '#f39c12'; // Preenche a meia estrela
            });
        }
    });

    halfStar.addEventListener('click', () => {
        stars.forEach(s => {
            s.style.color = '#ddd'; // Reseta todas as estrelas
        });
        halfStar.style.color = '#f39c12'; // Preenche a meia estrela
    });

    // Função para adicionar item ao carrinho e armazenar no Local Storage
    function adicionarAoCarrinho(idLivro) {
        console.log("Adicionando ao carrinho:", idLivro);
        fetch('/bookersgalaxy/modulos/funcs.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    acao: 'adicionarCarrinho',
                    id_livro: idLivro
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Resposta do servidor:', data);
                if (data.success) {
                    alert("Livro adicionado ao carrinho com sucesso!");
                    // Atualize o carrinho no localStorage, se necessário
                } else {
                    alert("Erro: " + (data.error || 'Erro desconhecido.'));
                }
            })
            .catch(error => console.error('Erro ao adicionar ao carrinho:', error));
    }




    // Função para carregar o carrinho quando a página do carrinho é aberta
    // Função para carregar o carrinho e exibir na página
    function carregarCarrinho() {
        fetch('../compra/carrinho.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'acao=listarCarrinho'
            })
            .then(response => response.json())
            .then(data => {
                const carrinhoContainer = document.querySelector('.loved_books');
                carrinhoContainer.innerHTML = ''; // Limpa o conteúdo anterior

                if (data.success && data.livros && data.livros.length > 0) {
                    // Itera sobre os livros e exibe cada um na interface
                    data.livros.forEach(livro => {
                        const livroElement = document.createElement('div');
                        livroElement.classList.add('box_favorite');
                        livroElement.setAttribute('data-id', livro.id_livro);

                        // Adiciona o HTML do livro com imagem, título, autor, preço e quantidade
                        livroElement.innerHTML = `
                    <img src="${livro.imagem_caminho}" alt="Capa do livro">
                    <div class="livro-info">
                        <h4>${livro.titulo} - ${livro.autor}</h4>
                        <p>R$ ${Number(livro.preco).toFixed(2).replace('.', ',')}</p>
                        <p>Quantidade: ${livro.quantidade}</p>
                    </div>
                    <div class="acoes">
                        <button class="remove-btn" onclick="removerDoCarrinho(${livro.id_livro})"><span class="material-symbols-outlined">delete</span></button>
                    </div>
                `;

                        // Adiciona o livro ao container do carrinho
                        carrinhoContainer.appendChild(livroElement);
                    });
                } else {
                    console.log("O carrinho está vazio.");
                    carrinhoContainer.innerHTML = '<p>O carrinho está vazio.</p>';
                }
            })
            .catch(error => console.error('Erro ao carregar o carrinho:', error));
    }

    // Chama a função para carregar o carrinho quando a página termina de carregar
    document.addEventListener('DOMContentLoaded', carregarCarrinho);



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