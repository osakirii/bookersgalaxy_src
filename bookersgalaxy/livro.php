<?php
    include("modulos/loadingscreen.php");
    include("modulos/header.php");
?>

<!--https://picsum.photos/-->
<!--<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>-->

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Livro</title>
        <link rel="stylesheet" href="css/modulos.css">
        <link rel="stylesheet" href="css/livro.css">
        <script src="https://kit.fontawesome.com/7162ac436f.js" 
        crossorigin="anonymous"></script>
        <script src="js/modulos.js"></script>
    </head>

    <body>
        <main id="corpo">
            
            <section id="livro">
                <div id="galeria">
                    <i class="fas fa-chevron-up arrow"></i>
                    <img src="<?php Src(10) ?>">
                    <img src="<?php Src(11) ?>">
                    <img src="<?php Src(12) ?>">
                    <img src="<?php Src(13) ?>">
                    <i class="fas fa-chevron-down arrow"></i>
                </div>
                <div id="imagem">
                </div>
            </section>

        </main>
        
        <?php
            include("modulos/footer.php"); 
        ?>

       <script>

       </script>
    </body>
</html>