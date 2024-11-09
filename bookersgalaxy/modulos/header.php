<?php
include_once("callimg.php");
if (isset($_COOKIE['filtro_daltonismo'])) {
    $filtroDaltonismo = $_COOKIE['filtro_daltonismo'];
    echo '<body class="' . htmlspecialchars($filtroDaltonismo) . '">';
} else {
    echo '<body>';
}

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
            <a href="index.php"><img src="<?php echo Busca(1) ?>"></a>
            <a href="#">Tenho Daltonismo</a>
            <a href="categorias.php">Categorias</a>
            <a href="#">Lançamentos</a>
            <a href="favoritos.php">Favoritos</a>
            <a href="carrinho.php">Carrinho</a>
            <a href="#">Meu perfil</a>
        </div>
        <div id="nav-rodape">
            <?php
            if (isset($_SESSION['Nivel_acesso']) && $_SESSION['Nivel_acesso'] == 1) {
                echo '<a href="adm.php"><i class="fas fa-laptop-code"></i> Administração</a>';
            }
            ?>
            <a href="adm.php"><i class="fas fa-laptop-code"></i> Administração</a>
            <a href="#"><i class="fas fa-gear"></i> Configurações</a>
            <a href="#"><i class="far fa-circle-question"></i> Ajuda</a>
            <a href="#"><i class="far fa-comments"></i> Fale Conosco</a>
        </div>
    </nav>

    <div id="escuro"></div>

    <div id="header-gradiente"></div>

    <header id="header">
        <a href="index.php" style="margin: 0; padding : 0;"><img src="<?php echo Busca(1) ?>"></a>
        <div>
            <label for="filtro-daltonismo">Tenho Daltonismo:</label>
            <select id="filtro-daltonismo">
                <option value="">Normal</option>
                <option value="correcaopro-protanopia">Correção para Protanopia</option>
                <option value="correcaopro-deuteranopia">Correção para Deuteranopia</option>
                <option value="correcaopro-tritanopia">Correção para Tritanopia</option>
                <option value="correcaopro-monocromacia">Correção para Monocromacia</option>
            </select>
        </div>
        <a href="categorias.php">Categorias</a>
        <form id="headerform">
            <input size="40" id="searchbar" onfocus="pesquisafocus()" onblur="pesquisablur()"><button type="submit" onclick="openSearchBar()"><i class="fas fa-magnifying-glass"></i></button>
        </form>
        <div id="header-container">
            <a href="carrinho.php"><i class="fas fa-cart-shopping"></i></a>
            <a href="#"><i class="far fa-circle-user"></i></a>
            <a href="#" id="header-bars" onclick="openNav()"><i class="fas fa-bars bars"></i></a>
        </div>
    </header>
    <script>
        // Captura o elemento do seletor
        const seletorFiltro = document.getElementById('filtro-daltonismo');

        // Aplica a preferência armazenada, se houver
        const filtroSalvo = localStorage.getItem('filtro-daltonismo');
        if (filtroSalvo) {
            document.body.classList.add(filtroSalvo);
            seletorFiltro.value = filtroSalvo;
        }

        seletorFiltro.addEventListener('change', function(event) {
            document.body.className = ''; // Remove filtros anteriores
            if (event.target.value) {
                document.body.classList.add(event.target.value);
                localStorage.setItem('filtro-daltonismo', event.target.value); // Salva no localStorage
                setCookie('filtro_daltonismo', event.target.value, 7); // Salva em cookie (expira em 7 dias)
            } else {
                localStorage.removeItem('filtro-daltonismo');
                setCookie('filtro_daltonismo', "", -1); // Deleta o cookie
            }
        });

        function setCookie(name, value, days) {
            let expires = "";
            if (days) {
                const date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }
    </script>
</body>

</html>