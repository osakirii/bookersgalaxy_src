<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lilita+One&family=Montaga&family=Squada+One&display=swap');

        button{
            border: none;
            background-color: #fff;
            font-family: "Josefin Sans", sans-serif;
            font-size: medium;
        }

        #op{
            padding: 10px;
            width: auto;
            border-radius: 25px;
        }

        #op:hover{
            background-color: lightgray;
        }

        .dropbtn {
            background-color: #6bc1f3;
            color: black;
            padding: 16px;
            font-size: 16px;
            border: none;
            border-radius: 20px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        .dropbtn:hover {
            box-shadow: none;
        }

        .dropup {
            position: fixed;
            z-index: 99; 
            bottom: 0;
            right: 0;
        }

        .dropup-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 160px;
            bottom: 50px;
            z-index: 1;
        }

        .dropup-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropup-content a:hover {
            background-color: #ccc
        }

        .dropup:hover .dropup-content {
            display: block;
        }

        .dropup:hover .dropbtn {
            background-color: #5296bd;
        }
    </style>
</head>

<body>

    <div class="dropup">
        <button class="dropbtn">Alterar fonte</button>
        <div class="dropup-content">
            <button id="op" onclick="ajustarFonte(1)">Aumentar Fonte</button>
            <button id="op" onclick="ajustarFonte(-1)">Diminuir Fonte</button>
            <button id="op" onclick="resetarFonte()">Fonte Original</button>
            <button id="op" onclick="toggleContraste()">Alto Contraste</button>
        </div>
    </div>

    <script>
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
            body.style.fontSize = '16px'; // Define o tamanho da fonte para o padrão
            localStorage.removeItem('fonteTamanho'); // Remove o ajuste de tamanho salvo
            setCookie('filtro_daltonismo', "", -1); // Opcional: se desejar também limpar o cookie
        }
    </script>
</body>

</html>