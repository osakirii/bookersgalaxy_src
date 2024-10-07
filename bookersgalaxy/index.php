<?php
    include("modulos/loadingscreen.php");
    include("modulos/header.php");
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booker's Galaxy</title>
        <link rel="stylesheet" href="css/modulos.css">
        <link rel="stylesheet" href="css/index.css">
        <script src="https://kit.fontawesome.com/7162ac436f.js" 
        crossorigin="anonymous"></script>
        <script src="js/modulos.js"></script>
        <style>
            #corpo button.slide{
                margin-top: 141px;
            }
        </style>
    </head>
    <body>
        <main id="corpo">
            <img style="width: 300px; height: auto;" src="<?php Src(6) ?>">

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

        <?php
            include("modulos/footer.php");
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