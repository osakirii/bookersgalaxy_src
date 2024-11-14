<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link rel="stylesheet" href="../css/Login_NvConta.css">
    <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/7162ac436f.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6aeb91bd3f.js" crossorigin="anonymous"></script>
    <title>Nova Conta</title>
</head>

<body>
    <main>
    <div class="Pai1">
                    <h3>NOVA CONTA</h3>
                <div class="grid-container">
                    <p> Telefone<br><input id="name" name="txtUsuario" type="text" size="20"></p>
                    <p> CPF<br><input id="email" name="txtEmail" type="text" size="20"></p>
                    <p> Foto<br><input name="txtSenha" type="password" size="20">
                    <p> <br><input id="senha" name="txtConfSenha" type="password" size="20"></p>
                </div>
                <div class="btns">
                    <button class="BTverde" onclick="window.location.href='/bookersgalaxy/perfil/login_cad.php'">Voltar</button></a>
                    <button class="BTazul" onclick="window.location.href='cad_next.php'">Próximo</button><br>
                </div>
            </div>
        </div>
    </main>
    <script>
    function adicionarAoCarrinho(idLivro) {
        console.log("Função adicionarAoCarrinho chamada com ID:", idLivro);
        fetch('/bookersgalaxy/perfil/back_auth.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    acao: 'cadastro',
                })
            })

            .then(response => response.json())
            .then(data => {
                console.log('Resposta recebida:', data);
                if (data.success) {
                    alert("Livro adicionado ao carrinho com sucesso!");
                } else {
                    alert("Erro ao adicionar ao carrinho: " + (data.error || 'Erro desconhecido.'));
                }
            })
            .catch(error => console.error('Erro na requisição:', error));
    }


    </script>
</body>
</html>