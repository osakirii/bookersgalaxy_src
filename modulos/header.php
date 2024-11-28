<?php
if (isset($_SESSION['cliente_id'])) {
    $userId = $_SESSION['cliente_id'];
    $nomeUsuario = $_SESSION['nomeUsuario'];
}

if (!function_exists('Busca')) {
    include_once("callimg.php"); // Inclui `functions.php` se `Busca` não estiver definida
}
if (isset($_COOKIE['filtro_daltonismo'])) {
    $filtroDaltonismo = $_COOKIE['filtro_daltonismo'];
    echo '<body class="' . htmlspecialchars($filtroDaltonismo) . '">';
} else {
    echo '<body>';
}

?>

<html lang="pt-br"><!--PRATICAMENTE RESPONSIVO -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modulos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=contrast" />
        <script src="https://kit.fontawesome.com/7162ac436f.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/6aeb91bd3f.js" crossorigin="anonymous"></script>
    <script src="js/modulos.js"></script>

    <style>
        /* ajustando responsividade dos ícones e 
        da barra de pesquisa */
            .icones{
                background: none;
                border: none;
                padding: 0;
                margin: 0;
            }

            @media (max-width: 1120px){
                #header #headerform.pesquisa{
                    display: none;
                }
            }

            @media(max-width: 1290px) {
                .icones {
                    display: none;
                }
            }

            #header-bars{
                margin: 0;
                padding: 0;
            }

            @media(max-width: 780px) {
                #header a.categ{
                    display: none;
                }
            }

            @media(max-width: 640x) {
                #opcoes{
                    display: none;
                }
            }

            @media(max-width: 640px) {
                #filtro-daltonismo{
                    width: 20vw;
                    height: auto;
                }
            }
            
    </style>
</head>

<body>

    <nav id="navbar">
        <div id="nav-content">
            <a href="javascript:void(0)" id="closebtn" onclick="closeNav()"><i class="fas fa-xmark"></i></a>
            <a href="/bookersgalaxy/index.php"><img src="<?php echo Busca(1) ?>"></a>
            <a href="#">Tenho Daltonismo</a>
            <a href="categorias.php">Categorias</a>
            <a href="#">Lançamentos</a>
            <a href="/bookersgalaxy/perfil/favoritos.php">Favoritos</a>
            <a href="/bookersgalaxy/compra/carrinho.php">Carrinho</a>
            <a href="/bookersgalaxy/modulos/logout.php">Sair</a>
            <?php 
            if(isset($userId)){
                echo "<a href='/bookersgalaxy/perfil/perfil.php'>Meu perfil</a>";
            }
            else{
                echo "<a href='/bookersgalaxy/perfil/login_cad.php'>Meu perfil</a>";
             }
            
            ?>
        </div>
        <div id="nav-rodape">
            <?php
            if (isset($_SESSION['Nivel_acesso']) && $_SESSION['Nivel_acesso'] == 1) {
                echo '<a href="/bookersgalaxy/adm.php"><i class="fas fa-laptop-code"></i> Administração</a>';
            }
            ?>
            <a href="#"><i class="fas fa-gear"></i> Configurações</a>
            <a href="#"><i class="far fa-circle-question"></i> Ajuda</a>
            <a href="#"><i class="far fa-comments"></i> Fale Conosco</a>
        </div>
    </nav>

    <div id="escuro"></div>

    <div id="header-gradiente"></div>

    <header id="header">
        <a href="/bookersgalaxy/index.php" style="margin: 0; padding : 0;"><img src="<?php echo Busca(1) ?>"></a>
        <div id="headerCookies">
            <div div="alterarCores">
                <label id="opcoes" for="filtro-daltonismo" style="font-size: 18px;
                    padding:5px; color: #1D1E1D;">Alterar Cores:</label>
                <select id="filtro-daltonismo" style="margin: 0 15px 10px 0">
                    <option value="">Padrão</option>
                    <option value="correcaopro-protanopia">Protanopia</option><!--Manter SEM "correção para ..."-->
                    <option value="correcaopro-deuteranopia">Deuteranopia</option>
                    <option value="correcaopro-tritanopia">Tritanopia</option>
                    <option value="correcaopro-monocromacia">Monocromacia</option>
                </select>
            </div>
        </div>
        <a class="categ" href="/bookersgalaxy/categorias.php">Categorias</a>
        <form class="pesquisa" id="headerform">
            <input size="40" id="searchbar" onfocus="pesquisafocus()" onblur="pesquisablur()"><button type="submit" onclick="openSearchBar()"><i class="fas fa-magnifying-glass"></i></button>
        </form>
        <div id="header-container">
            <button class="icones">
                <a href="/bookersgalaxy/compra/carrinho.php"><i class="fas fa-cart-shopping"></i></a>
                <?php 
                if(isset($userId)){
                    echo "<a href='/bookersgalaxy/perfil/perfil.php'><i class='far fa-circle-user'></i></a>";
                }
                else{
                    echo "<a href='/bookersgalaxy/perfil/login_cad.php'><i class='far fa-circle-user'></i></a>";
                 }
                 ?>
            </button>
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
        const body = document.querySelector('body');
    const tamanhoPadrao = 20; // Tamanho base da fonte
    
    function ajustarFonte(direcao) {
        let tamanhoAtual = parseFloat(window.getComputedStyle(body).fontSize);
        let novoTamanho = tamanhoAtual + direcao;
        body.style.fontSize = novoTamanho + 'px';
        localStorage.setItem('fonteTamanho', novoTamanho); // Armazena o ajuste no localStorage
    }

    // Aplica tamanho armazenado ao recarregar
    window.addEventListener('load', () => {
        let fonteSalva = localStorage.getItem('fonteTamanho');
        if (fonteSalva) {
            body.style.fontSize = fonteSalva + 'px';
        }
    });
    function toggleContraste() {
        document.body.classList.toggle('alto-contraste');
        localStorage.setItem('contrasteAtivo', document.body.classList.contains('alto-contraste'));
    }

    // Aplica o contraste armazenado ao recarregar
    window.addEventListener('load', () => {
        if (localStorage.getItem('contrasteAtivo') === 'true') {
            document.body.classList.add('alto-contraste');
        }
    });
    function resetarFonte() {
    body.style.fontSize = '16px';  // Define o tamanho da fonte para o padrão
    localStorage.removeItem('fonteTamanho'); // Remove o ajuste de tamanho salvo
    setCookie('filtro_daltonismo', "", -1); // Opcional: se desejar também limpar o cookie
}
    </script>
</body>

</html>
