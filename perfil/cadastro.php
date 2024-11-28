<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Login_NvConta.css">
    <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/6aeb91bd3f.js" crossorigin="anonymous"></script>
    <title>Nova Conta</title>
</head>

<body>
    <main>
        <div class="Pai1">
            <h3>NOVA CONTA</h3>
            <form action="/bookersgalaxy/perfil/back_auth.php" method="POST">
            <div class="grid-container">
            <input type="hidden" name="action" value="register">
                <p>Nome Completo<br><input required id="nomeCompleto" name="nomeCompleto" type="text" size="20"></p>
                <p>Nome de Usuário<br><input required id="nomeUsuario" name="nomeUsuario" type="text" size="20"></p>
                <p>Email<br><input required id="email" name="email" type="text" size="20"></p>
                <p>Senha<br><input required id="senha" name="senha" type="password" size="20"></p>
                <p>Telefone<br><input required id="telefone" name="telefone" type="text" size="20" oninput="mascaraTelefone(this)" maxlength="15"></p>
                <p>Confirme sua Senha<br><input required id="confSenha" name="confSenha" type="password" size="20"></p>
                <p>CPF<br><input required id="cpf" name="cpf" type="text" size="20" oninput="mascaraCPF(this)" maxlength="14"></p>
                <p id="checkbox">Li e acordo com os Termos <input type="checkbox" name="checkbox" required id="checkbox"></p>
            </div>
            <div class="btns">
                <button class="BTazul" onclick="window.history.back()">Voltar</button>
                <button class="BTverde" onclick="realizarCadastro()">Finalizar Cadastro</button>
            </div><br><br>
            <form></form>
        </div>
    </main>
    <script>

        // MASCARA CPF
        function mascaraCPF(campo) {
            let valor = campo.value.replace(/\D/g, '');
            if (valor.length <= 3) {
                campo.value = valor;
            } else if (valor.length <= 6) {
                campo.value = valor.replace(/(\d{3})(\d{0,3})/, '$1.$2');
            } else if (valor.length <= 9) {
                campo.value = valor.replace(/(\d{3})(\d{3})(\d{0,3})/, '$1.$2.$3');
            } else {
                campo.value = valor.replace(/(\d{3})(\d{3})(\d{3})(\d{0,2})/, '$1.$2.$3-$4');
            }
        }

        // MASCARA TELEFONE
        function mascaraTelefone(campo) {
            let valor = campo.value.replace(/\D/g, '');
            if (valor.length <= 2) {
                campo.value = valor.replace(/(\d{2})/, '($1');
            } else if (valor.length <= 6) {
                campo.value = valor.replace(/(\d{2})(\d{5})/, '($1) $2');
            } else {
                campo.value = valor.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
            }
        }
    </script>
</body>
</html>
