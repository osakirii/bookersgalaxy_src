<?php
    include("callimg.php");
?>

<!--https://picsum.photos/-->
<!--<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>-->

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Categorias</title>
        <link rel="stylesheet" href="css/modulos.css">
        <script src="https://kit.fontawesome.com/7162ac436f.js" 
        crossorigin="anonymous"></script>
        <script src="js/headerfooter.js"></script>
        <style>
            #corpo button.slide{
                margin-top: 75px;
            }

            #corpo button.verde{
                background: #b3c6b8; 


            }
            #corpo button.verde:hover{
                background: #96B29D;
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
                <a href="index.php" style="border: 0; padding: 0;"><img src="<?php Src(1) ?>"></a>
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
            <a href="index.php" style="margin: 0; padding: 0; display: inline;"><img src="<?php Src(1) ?>"></a>
            <a href="#" class="daltonismo">Tenho Daltonismo</a>
            <a href="categorias.php" class="pag">Categorias</a>
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

            <h1>GÊNEROS</h1>
            <section class="carrossel">
                <a href="#"><img id="primeiro" src="https://picsum.photos/320/194"></a>
                <a href="#"><img src="https://picsum.photos/320/194"></a>
                <a href="#"><img src="https://picsum.photos/320/194"></a>
                <a href="#"><img src="https://picsum.photos/320/194"></a>
                <a href="#"><img src="https://picsum.photos/320/194"></a>
                <a href="#"><img src="https://picsum.photos/320/194"></a>
                <a href="#"><img src="https://picsum.photos/320/194"></a>
                <a href="#"><img src="https://picsum.photos/320/194"></a>
                <a href="#"><img src="https://picsum.photos/320/194"></a>
                <a href="#" id="ultimo"><img id="ultimo" src="https://picsum.photos/320/194"></a>
                <button class="slide slide-esquerda verde" onclick="esquerda(0)" type="button"><i class="fas fa-arrow-left"></i></button>
                <button class="slide slide-direita verde" onclick="direita(0)" type="button"> <i class="fas fa-arrow-right"></i></button>
            </section>

            <h1>EDITORAS</h1>
            <section class="carrossel">
                <a href="#"><img id="primeiro" src="<?php Src(7) ?>"></a>
                <a href="#"><img src="<?php Src(9) ?>"></a>
                <a href="#"><img src="<?php Src(8) ?>"></a>
                <a href="#"><img src="<?php Src(8) ?>"></a>
                <a href="#"><img src="<?php Src(8) ?>"></a>
                <a href="#"><img src="<?php Src(8) ?>"></a>
                <a href="#"><img src="<?php Src(8) ?>"></a>
                <a href="#"><img src="<?php Src(8) ?>"></a>
                <a href="#" id="ultimo"><img id="ultimo" src="https://picsum.photos/320/194"></a>
                <button class="slide slide-esquerda" onclick="esquerda(1)" type="button"><i class="fas fa-arrow-left"></i></button>
                <button class="slide slide-direita" onclick="direita(1)" type="button"> <i class="fas fa-arrow-right"></i></button>
            </section>

            <H1>AUTORES</H1>
            <section class="carrossel">
                <a href="#"><img id="primeiro" src="https://picsum.photos/320/194"></a>
                <a href="#"><img src="https://picsum.photos/320/194"></a>
                <a href="#"><img src="https://picsum.photos/320/194"></a>
                <a href="#"><img src="https://picsum.photos/320/194"></a>
                <a href="#"><img src="https://picsum.photos/320/194"></a>
                <a href="#"><img src="https://picsum.photos/320/194"></a>
                <a href="#"><img src="https://picsum.photos/320/194"></a>
                <a href="#"><img src="https://picsum.photos/320/194"></a>
                <a href="#"><img src="https://picsum.photos/320/194"></a>
                <a href="#" id="ultimo"><img id="ultimo" src="https://picsum.photos/320/194"></a>
                <button class="slide slide-esquerda" onclick="esquerda(2)" type="button"><i class="fas fa-arrow-left"></i></button>
                <button class="slide slide-direita" onclick="direita(2)" type="button"> <i class="fas fa-arrow-right"></i></button>
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
            function direita(i){
        document.getElementsByClassName('carrossel')[i].scrollLeft += 368;
        }
        function esquerda(i){
        document.getElementsByClassName('carrossel')[i].scrollLeft -= 368;
        }
       </script>
    </body>
</html>