<?php
    include_once("modulos/loadingscreen.php");
    include_once("modulos/header.php");
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Livro</title>
        <link rel="stylesheet" href="css/livro.css">
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
                    <img src="<?php Src(10) ?>">
                </div>
            </section>

        </main>
        
        <?php
            include_once("modulos/footer.php"); 
        ?>

       <script>

       </script>
    </body>
</html>