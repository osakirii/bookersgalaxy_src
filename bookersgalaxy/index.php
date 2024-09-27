<?php
    include("callimg.php");
?>
<!--https://picsum.photos/-->
<!--<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>-->

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booker's Galaxy</title>
        <link rel="stylesheet" href="css/modulos.css">
        <link rel="stylesheet" href="css/index.css">
        <script src="https://kit.fontawesome.com/7162ac436f.js" 
        crossorigin="anonymous"></script>
        <script src="js/headerfooter.js"></script>
        <style>
            #corpo button.slide{
                margin-top: 141px;
            }
        </style>
    </head>

    <body>
        <div id="loadingscreen">
            <h1>Booker's Galaxy</h1>
            <h2>Carregando...</h2>
        <img src="<?php Src(2) ?>">
    </div>
        <nav id="navbar">
            <div id="nav-content">
                <a href="javascript:void(0)" id="closebtn" onclick="closeNav()"><i class="fas fa-xmark"></i></a>
                <a href="index.php" style="padding: 0; border: 0;"><img src="<?php Src(1) ?>"></a>
                <a href="#">Tenho Daltonismo</a>
                <a href="categorias.php">Categorias</a>
                <a href="#">Lançamentos</a>
                <a href="#">Favoritos</a>
                <a href="#">Carrinho</a>
                <a href="#">Meu perfil</a>
            </div>
            <div id="nav-rodape">
                <a href="#">Configurações</a>
                <a href="#">Ajuda</a>
                <a href="#">Fale Conosco</a>
            </div>
        </nav>
        <div id="escuro"></div>
        <div id="header-gradiente"></div>
       <header id="header">
            <a href="index.php" style="margin: 0; padding: 0; display: inline;"><img src="<?php Src(1)?>"></a>
            <a href="#" class="daltonismo">Tenho Daltonismo</a>
            <a href="categorias.php">Categorias</a>
            <form id="headerform">
                <input size="40" onfocus="pesquisafocus()" onblur="pesquisablur()"><button type="submit"><i class="fas fa-magnifying-glass"></i></button>
            </form>
            <div id="header-container">
                <a href="#"><i class="fas fa-cart-shopping"></i></a>
                <a href="#"><i class="far fa-circle-user"></i></a>
                <a href="#" onclick="openNav()"><i class="fas fa-bars bars"></i></a>
            </div>
        </header>

        <main id="corpo">
            <img style="width: 200px; height: auto;" src="<?php Src(6) ?>">

            <h1>TOP 10 DO MÊS</h1>
            <section class="carrossel">
                <a href="#"><img id="primeiro" src="<?php Src(3) ?>"></a>
                <a href="#"><img src="<?php Src(4) ?>"></a>
                <a href="#"><img src="<?php Src(5) ?>"></a>
                <a href="#"><img src="<?php Src(3) ?>"></a>
                <a href="#"><img src="<?php Src(3) ?>"></a>
                <a href="#"><img src="<?php Src(3) ?>"></a>
                <a href="#"><img src="<?php Src(3) ?>"></a>
                <a href="#"><img src="<?php Src(3) ?>"></a>
                <a href="#"><img src="<?php Src(3) ?>"></a>
                <a href="#" id="ultimo"><img id="ultimo" src="<?php Src(3) ?>"></a>
                <button class="slide slide-esquerda" onclick="slidee()" type="button"><i class="fas fa-arrow-left"></i></button>
                <button class="slide slide-direita" onclick="slided()" type="button"> <i class="fas fa-arrow-right"></i></button>
            </section>

            <h1>DESTAQUES DE 2023</h1>
              <section class="estante">
                <div class="livro">
                    <a href="#"><img src="https://picsum.photos/141/216"></a>
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
                    <button class="ir-direita" type="button" onclick="direita(1)"> <i class="fas fa-arrow-right"></i></button>
              </section>
        </main>
       <footer id="footer">
            <div id="footer-conclusao">
                <p>Nós da Booker's Galaxy, adoramos servir você da melhor maneira possível.<br>
                Esperamos que tenha aproveitado nossos serviços e que volte mais vezes. Até a próxima!!! </p>
            </div>
            <div id="footer-categorias">
                <h1>CATEGORIAS</h1>
                <a href="#">Ficção</a>
                <a href="#">Ação</a>
                <a href="#">Horror</a>
                <a href="#">Romance</a>
                <a href="#">Mistério</a>
            </div>
            <div id="footer-booksters">
                <h1>BOOKSTERS</h1>
                <a href="#">Termos de Uso</a>
                <a href="#">Entrega</a>
                <a href="#">Sobre</a>
                <a href="#">Política de Privacidade</a>
            </div>
            <div id="footer-inscreva">
                <h1>INSCREVA-SE</h1>
                <p>Inscreva-se em nosso site para não perder nenhuma promoção.</p>
                <p class="footer-email">livrariadaibm@gmail.com</p>
                <a href="#" class="footer-email">Inscrever-se</a>
            </div>
       </footer>
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