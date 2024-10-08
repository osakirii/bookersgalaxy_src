<?php
    include_once("modulos/loadingscreen.php");
    include_once("modulos/header.php");
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Categorias</title>
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
       <?php
            include_once("modulos/footer.php"); 
       ?>

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