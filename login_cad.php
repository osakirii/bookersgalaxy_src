
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ou Cadastro</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Josefin Sans', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f3f4f6;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            text-align: center;
        }

        h2 {
            margin-bottom: 1rem;
            color: #333;
            font-weight: 600;
        }

        form {
            display: none;
            transition: opacity 0.3s ease;
        }

        form.active {
            display: block;
        }

        label {
            display: block;
            text-align: left;
            color: #555;
            margin: 0.5rem 0 0.2rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #5a67d8;
            outline: none;
        }

        button {
            width: 100%;
            padding: 0.8rem;
            margin-top: 0.5rem;
            border: none;
            border-radius: 4px;
            color: white;
            background: #5a67d8;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #434190;
        }

        .toggle-btn {
            background: transparent;
            color: #5a67d8;
            border: none;
            cursor: pointer;
            margin-top: 1rem;
            transition: color 0.3s;
        }

        .toggle-btn:hover {
            color: #434190;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 id="form-title">Login</h2>
        
        <!-- Formulário de Login -->
        <form id="login-form" class="active" action="auth_cliente.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <button type="submit">Entrar</button>
            <button type="button" class="toggle-btn" onclick="toggleForms()">Criar conta</button>
        </form>

        <!-- Formulário de Cadastro -->
        <form id="register-form" action="auth_cliente.php" method="POST" enctype="multipart/form-data">
            <label for="nome_completo">Nome Completo:</label>
            <input type="text" id="nome_completo" name="nome_completo" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>

            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" required>

            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" maxlength="14"  oninput="mascaraCPF(this)" required>

            <label for="foto">Foto:</label>
            <input type="file" name="foto" accept="image/*">

            <!-- Endereço -->
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" onblur="buscarEndereco()" required>

            <label for="rua">Rua:</label>
            <input type="text" id="rua" name="rua" required>

            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero">

            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" required>

            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" required>

            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" required>

            <button type="submit">Cadastrar</button>
            <button type="button" class="toggle-btn" onclick="toggleForms()">Tenho login</button>
        </form>
    </div>

    <script>
        function toggleForms() {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const formTitle = document.getElementById('form-title');

            if (loginForm.classList.contains('active')) {
                loginForm.classList.remove('active');
                registerForm.classList.add('active');
                formTitle.textContent = 'Cadastro';
            } else {
                registerForm.classList.remove('active');
                loginForm.classList.add('active');
                formTitle.textContent = 'Login';
            }
        }
        function buscarEndereco() {
            const cep = document.getElementById('cep').value.replace(/\D/g, '');

            if (cep.length === 8) {
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            document.getElementById('rua').value = data.logradouro;
                            document.getElementById('bairro').value = data.bairro;
                            document.getElementById('cidade').value = data.localidade;
                            document.getElementById('estado').value = data.uf;
                        } else {
                            alert('CEP não encontrado.');
                        }
                    })
                    .catch(error => {
                        alert('Erro ao buscar o CEP.');
                        console.error(error);
                    });
            } else {
                alert('CEP inválido.');
            }
        }
        function mascaraCPF(input) {
            // Remove todos os caracteres não numéricos
            let valor = input.value.replace(/\D/g, '');

            // Aplica a máscara
            valor = valor.replace(/(\d{3})(\d)/, '$1.$2'); // Coloca o primeiro ponto
            valor = valor.replace(/(\d{3})(\d)/, '$1.$2'); // Coloca o segundo ponto
            valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Coloca o traço

            input.value = valor; // Atualiza o valor do input
        }
    </script>
</body>
</html>
