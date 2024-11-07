<?php
include_once 'connect.php';
$con = Connect::getInstance();
session_start();
if (isset($_SESSION['cliente_id'])) {
    $userId = $_SESSION['cliente_id'];
    echo $userId;
} else {
    echo "Nenhum ID de usuário encontrado na sessão.";
}

// Obtém o ID do livro da URL
$id_livro = isset($_GET['id_livro']) ? (int)$_GET['id_livro'] : null;

try {
    if ($id_livro !== null) {
        $stmt = $con->prepare("SELECT * FROM livros WHERE id_livro = :id_livro");
        $stmt->bindParam(':id_livro', $id_livro, PDO::PARAM_INT);
        $stmt->execute();

        // Recuperando os dados
        $livros = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtém um único registro

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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <!-- LINK FONTAWESOME -->
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
<!--NAVBAR!-->
<?php
include("modulos/header.php");
?>
<!--NAVBAR!-->

<header>
    <?php if ($livros): ?>
        <?php foreach ($livros as $livro): ?>
            <h2>DESTAQUES DE 2024><?php echo htmlspecialchars($livro['Titulo']); ?></h2>
        <?php endforeach; ?>
    <?php endif; ?>
</header>
<div class="main_content">
    <aside>
        <div class="carrossel-container">
            <?php
            $stmtImagem = $con->prepare("SELECT * FROM arquivos WHERE livro_id = :id_livro");
            $stmtImagem->bindParam(':id_livro', $id_livro, PDO::PARAM_INT);
            $stmtImagem->execute();
            $imagens = $stmtImagem->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <div class="carrossel">
                <button class="prev" onclick="plusSlides(-1)">
                    <div class="sticks_carosel">
                        <hr class="stick_esq">
                        <hr class="stick_dir">
                    </div>
                </button>
                <?php if ($imagens): ?>
                    <?php foreach ($imagens as $imagem): ?>
                        <img src="<?php echo htmlspecialchars($imagem['path']); ?>" class="carrossel-item"
                            alt="Imagem de <?php echo htmlspecialchars($livro['Titulo']); ?>"
                            style="max-width: 200px; cursor: pointer;">
                    <?php endforeach; ?>
                <?php endif; ?>
                <button class="next" onclick="plusSlides(1)">
                    <div class="sticks_carosel">
                        <hr class="stick_esqB">
                        <hr class="stick_dirB">
                    </div>
                </button>
            </div>

        </div>
    </aside>
    <main>
        <div id="imagemCentral">
            <?php
            if ($livros) {
                $primeiroLivro = isset($livros[0]['id_livro']) ? $livros[0]['id_livro'] : null;
                $stmtImagem = $con->prepare("SELECT * FROM arquivos WHERE livro_id = :id_livro");
                $stmtImagem->bindParam(':id_livro', $id_livro, PDO::PARAM_INT);
                $stmtImagem->execute();
                $imagem = $stmtImagem->fetch(PDO::FETCH_ASSOC);
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
                <div class="infos-box">
                    <h1><?php echo htmlspecialchars($livro['Titulo']); ?></h1>
                    <div class="info-column">
                        <h4 class="psombra"><?php echo htmlspecialchars($livro['Autor']) . "&nbsp;-&nbsp;" . htmlspecialchars($livro['Data_lancamento']); ?></h4>
                        <p class="psombra">Sinopse: <?php echo htmlspecialchars($livro['Sinopse']); ?></p>

                    </div>
                </div>

                <!--PARTE DAS INFORMAÇÕES-->

                <div class="container_additions">
                    <div class="info_column">
                        <div class="info_item">
                            <img src="icons/book_icon.png" style="width:50px;">
                            <span><?php echo htmlspecialchars($livro['QntPaginas']); ?> Páginas</span>
                        </div>
                        <div class="info_item">
                            <img src="icons/editar_icon.png" style="width: 50px;">
                            <span><?php echo htmlspecialchars($livro['Genero']); ?></span>
                        </div>
                        <div class="info_item">
                            <img src="icons/teatro_icon.png" style="width: 50px;">
                            <span><?php echo htmlspecialchars($livro['Genero']); ?></span>
                        </div>
                        <div class="info_item">
                            <img src="icons/estoque_icon.png" style="width: 50px;">
                            <span><?php echo htmlspecialchars($livro['Genero']); ?></span>
                        </div>
                        <div class="info_item">
                            <img src="icons/estrela_icon.png" style="width: 50px;">
                            <span><?php echo htmlspecialchars($livro['Genero']); ?></span>
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
                                    <button onclick="toggleFavorite()" id="favoritarBtn" name="favoritar" class="btn" type="submit">

                                        <?php
                                        if (isset($_SESSION['cliente_id'])) {
                                            $stmt = $con->prepare("SELECT estado FROM favoritos WHERE id_usuario = ? AND id_livro = ?");
                                            $stmt->execute([$userId, $id_livro]);
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
                                        } else {
                                            echo "<button onclick='alert('Faça login para favoritar este livro.')' class='btn' type='button'><i id='heartIcon' class='fas fa-heart' style='color:grey;'></i></button>";
                                        }

                                        ?>
                                    </button>
                                </form>
                            </div>
                            <button class="sticks" onclick="adicionarAoCarrinho(<?php echo htmlspecialchars($id_livro)  ?>)">
                                <hr id="stick1">
                                <hr id="stick2">
                                <div class="add_cart_txt">
                                    <p>adicionar ao carrinho</p>
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
                            // IDs específicos das imagens que você quer exibir
                            $idsDesejados = [32,33,34];

                            // Transformar o array de IDs em uma string separada por vírgulas para a query SQL
                            $idsFormatados = implode(',', $idsDesejados);
                            $stmtImagem = $con->prepare("
                            SELECT arquivos.path, livros.Titulo, livros.Autor, livros.Preco, livros.id_livro
                            FROM arquivos 
                            INNER JOIN livros ON livros.id_livro = arquivos.livro_id 
                            WHERE livros.id_livro IN ($idsFormatados)
                            GROUP BY livros.id_livro
                        ");
                        

                            $stmtImagem->execute();
                            $livros = $stmtImagem->fetchAll(PDO::FETCH_ASSOC);


                            foreach ($livros as $livro) {
                                echo '<div class="book_card">';
                                echo '<a href="listarLivros.php?id_livro=' . urlencode($livro['id_livro']) . '">';
                                echo '<img src="' . htmlspecialchars($livro['path']) . '" alt="Imagem de ' . htmlspecialchars($livro['Titulo']) . '">';
                                echo htmlspecialchars($livro['Titulo']) . " - " . htmlspecialchars($livro['Autor']);
                                echo "<br>R$ " . htmlspecialchars(number_format($livro['Preco'], 2, ',', '.'));
                                echo '</a>';
                                echo '</div>';
                            }
                            ?>
</div>

<!--LIVROS SEMELHANTES!-->
<!--///////////////////////////////////!-->
<div class="second_content">
    <div class="form_container">
        <h2 style="font-weight:500;">AVALIAÇÃO DO LIVRO</h2>
        <!-- Inicio do formulário -->
        <form method="POST" action="processa.php">

            <div class="estrelas">

                <!-- Carrega o formulário definindo nenhuma estrela selecionada -->
                <input type="radio" name="estrela" id="vazio" value="" checked>

                <!-- Opção para selecionar 1 estrela -->
                <label for="estrela_um"><i class="opcao fa"></i></label>
                <input type="radio" name="estrela" id="estrela_um" id="vazio" value="1">

                <!-- Opção para selecionar 2 estrela -->
                <label for="estrela_dois"><i class="opcao fa"></i></label>
                <input type="radio" name="estrela" id="estrela_dois" id="vazio" value="2">

                <!-- Opção para selecionar 3 estrela -->
                <label for="estrela_tres"><i class="opcao fa"></i></label>
                <input type="radio" name="estrela" id="estrela_tres" id="vazio" value="3">

                <!-- Opção para selecionar 4 estrela -->
                <label for="estrela_quatro"><i class="opcao fa"></i></label>
                <input type="radio" name="estrela" id="estrela_quatro" id="vazio" value="4">

                <!-- Opção para selecionar 5 estrela -->
                <label for="estrela_cinco"><i class="opcao fa"></i></label>
                <input type="radio" name="estrela" id="estrela_cinco" id="vazio" value="5"><br><br>

                <!-- Campo para enviar a mensagem -->
                <textarea name="mensagem" rows="4" cols="30" placeholder="Digite o seu comentário..."></textarea><br><br>

                <!-- Botão para enviar os dados do formulário -->
                <input type="submit" value="Cadastrar"><br><br>

            </div>

        </form>
        <!-- Fim do formulário -->


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
            <button type="submit">Enviar Comentário</button>
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
        fetch('./funcoes/functions.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    acao: 'adicionarCarrinho', // Adiciona a ação que o PHP deve executar
                    id_livro: idLivro
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Livro adicionado ao carrinho com sucesso!");
                    location.reload();
                } else {
                    alert("Erro ao adicionar livro ao carrinho.");
                }
            })
            .catch(error => console.error('Erro:', error));
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
</script>
</body>

</html>