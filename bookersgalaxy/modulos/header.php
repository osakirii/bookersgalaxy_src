<?php
    include_once("callimg.php");
 ?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/modulos.css">
        <script src="https://kit.fontawesome.com/7162ac436f.js" 
        crossorigin="anonymous"></script>
        <script src="js/modulos.js"></script>
    </head>
    <body>
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
                <a href="upload.php"><i class="fas fa-laptop-code"></i> Administração</a>
                <a href="#"><i class="fas fa-gear"></i> Configurações</a>
                <a href="#"><i class="far fa-circle-question"></i> Ajuda</a>
                <a href="#"><i class="fas fa-info"></i> Fale Conosco</a>
            </div>
        </nav>

        <div id="escuro"></div>

        <div id="header-gradiente"></div>

       <header id="header">
            <a href="index.php" style="margin: 0; padding: 0; display: inline;"><img src="<?php Src(1)?>"></a>
            <a href="#" class="daltonismo">Tenho Daltonismo</a>
            <a href="categorias.php">Categorias</a>
            <form id="headerform">
                <input size="40" id="searchbar" onfocus="pesquisafocus()" onblur="pesquisablur()"><button type="submit" onclick="openSearchBar()"><i class="fas fa-magnifying-glass"></i></button>
            </form>
            <div id="header-container">
                <a href="#"><i class="fas fa-cart-shopping"></i></a>
                <a href="#"><i class="far fa-circle-user"></i></a>
                <a href="#" onclick="openNav()"><i class="fas fa-bars bars"></i></a>
            </div>
        </header>
    </body>
</html>