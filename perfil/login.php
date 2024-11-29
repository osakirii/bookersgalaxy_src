<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link rel="stylesheet" href="../css/Login_NvConta.css">
    <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/7162ac436f.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6aeb91bd3f.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>
    <main>
        <div class="Pai1">
            <ul>
                <h1>FAZER LOGIN</h1>
            </ul>
            <form method="POST" action="/bookersgalaxy/perfil/back_auth.php">
                <input type="hidden" name="action" value="login">

                <p> Email<br><input name="txtEmail" type="text" size="20"></p>
<!--                <div class="esqueci">
                    <h2><a href="./OUTRAS PARTES/WhatsApp Image 2024-03-25 at 16.49.43.jpeg">Esqueceu a Senha?</a></h2>
                </div>
-->
                <p> Senha<br><input name="txtSenha" type="password" size="20" placeholder=""><br>
                    <i class="fas fa-eye Eye"></i>
                </p>
                <div class="btns">
                    <button class="BTazul" type="button" onclick="window.history.back()">Voltar</button>
                    <button class="BTverde" type="submit">LOGIN</button>

                </div>
            </form>
            


            <h2><a href="cadastro.php">Criar uma nova Conta</a>

        </div>
    </main>
</body>

</html>