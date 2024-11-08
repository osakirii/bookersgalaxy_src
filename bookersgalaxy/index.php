<?php
    include_once("modulos/loadingscreen.php");
    include_once("modulos/header.php");

?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booker's Galaxy</title>
        <link rel="stylesheet" href="css/index.css">
        <style>
            #corpo button.slide{
                margin-top: 141px;
            }
        </style>
    </head>
    <body>
        <main id="corpo">
            <img style="width: 200px; height: auto;" src="<?php echo Busca(6)['path']?>">
            <h1>TOP 10 DO MÊS</h1>
            <section class="carrossel">
            <?php
                            $idsDesejados = [32,33,34];

                            // Transformar o array de IDs em uma string separada por vírgulas para a query SQL
                            $idsFormatados = implode(',', $idsDesejados);
                            $stmtImagem = $pdo->prepare("
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
                <button class="slide slide-esquerda" onclick="slidee()" type="button"><i class="fas fa-arrow-left"></i></button>
                <button class="slide slide-direita" onclick="slided()" type="button"> <i class="fas fa-arrow-right"></i></button>
            </section>

            <h1>DESTAQUES DE 2023</h1>
              <section class="estante">
                <div class="livro">
                    <a href="livro.php"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p class="nomeAutor">Robert Pattinson</p>
                        <p>O chamado de Cthulhu e outros contos Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt molestiae nisi asperiores eveniet expedita quidem facere officia, commodi distinctio? Aperiam consectetur voluptatum odio debitis doloribus dignissimos natus magni fuga sunt.</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p class="nomeAutor">Robert Pattinson</p>
                        <p>O chamado de Cthulhu e outros contos lor</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p class="nomeAutor">Robert Pattinson</p>
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p class="nomeAutor">Robert Pattinson</p>
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p class="nomeAutor">Robert Pattinson</p>
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p class="nomeAutor">Robert Pattinson</p>
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p class="nomeAutor">Robert Pattinson</p>
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p class="nomeAutor">Robert Pattinson</p>
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p class="nomeAutor">Robert Pattinson</p>
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p class="nomeAutor">Robert Pattinson</p>
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p class="nomeAutor">Robert Pattinson</p>
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p class="nomeAutor">Robert Pattinson</p>
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                    <button class="ir-esquerda" type="button" onclick="esquerda(0)"><i class="fas fa-arrow-left"></i></button>
                    <button class="ir-direita" type="button" onclick="direita(0)"> <i class="fas fa-arrow-right"></i></button>
              </section>

              <h1>DESTAQUES DE 2023</h1>
              <section class="estante">
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p>O chamado de Cthulhu e outros contos lor</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
                    <div class="livro-texto">
                        <p>O chamado de Cthulhu e outros contos</p>
                        <p class="valor">R$ 30,00</p>
                    </div>
                </div>
                    <button class="ir-esquerda" type="button" onclick="esquerda(1)"><i class="fas fa-arrow-left"></i></button>
                    <button class="ir-direita" type="button" onclick="direita(1)"><i class="fas fa-arrow-right"></i></button>
              </section>
        </main>

        <?php
            include_once("modulos/footer.php");
         ?>
       <script>

    function slidee(){
        document.getElementsByClassName("carrossel")[0].scrollLeft -= 444;
    }
    function slided(){
        document.getElementsByClassName("carrossel")[0].scrollLeft += 444;
    }

    function direita(i){
        document.getElementsByClassName('estante')[i].scrollLeft += 400;
    }
    function esquerda(i){
        document.getElementsByClassName('estante')[i].scrollLeft -= 400;
    }
          </script>
    </body>
</html>