<html>
    <head>

        <style>
            .Pai1{
                display: flex;
                justify-content: center;
                align-items: center;
                width: 20%;
                flex-direction: column;
                background-color: #fdfdfd;
                border-radius: 15px;
                box-shadow: 0px 4px 4px 0px rgba(28, 28, 28, 0.2);
                font-family: "Josefin Sans", sans-serif;
                position: relative;
                margin: 1vw;
                padding: 1vw;
            }
        </style>
    </head>

    <?php
    ob_start();
    session_start();
    include_once(__DIR__ . '/../config.php');

    $pdo = Connect::getInstance();
    if (!$pdo) {
        die('Erro ao inicializar conexão PDO');
    }

    // Verifica se a requisição é POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Identifica a ação (login ou registro)
        $action = $_POST['action'];

        // Função de Registro
        if ($action === 'register') {
            // Dados do formulário de registro
            $nomeCompleto = $_POST['nomeCompleto'];
            $nomeUsuario = $_POST['nomeUsuario'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $cpf = $_POST['cpf'];
            $senha = $_POST['senha'];
            $confSenha = $_POST['confSenha'];

            // Verifica se as senhas coincidem
            if ($senha !== $confSenha) {
                echo "As senhas não coincidem.";
                exit();
            }

            // Cria o usuário
            try {
                $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO clientes (nome_completo, nome_usuario, email, senha, telefone, CPF) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$nomeCompleto, $nomeUsuario, $email, $senhaHash, $telefone, $cpf]);

                // Redireciona para a página inicial
                $_SESSION['cliente_id'] = $pdo->lastInsertId(); // ID gerado pelo banco de dados
                $_SESSION['nomeUsuario'] = $nomeUsuario;
                $_SESSION['nomeCompleto'] = $nomeCompleto;
                $_SESSION['email'] = $email;
                header("Location: /bookersgalaxy/index.php");
                ob_end_flush();
                exit();
            } catch (PDOException $e) {
                echo "Erro ao criar usuário: " . $e->getMessage();
                exit();
            }
        }
        // Função de Login
        elseif ($action === 'login') {
            $email = $_POST['txtEmail'];
            $senha = $_POST['txtSenha'];

            // Consulta o usuário com base no email
            $stmt = $pdo->prepare("SELECT id_usuario, nome_usuario, senha FROM clientes WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se o usuário existe e a senha está correta
            if ($user && password_verify($senha, $user['senha'])) {
                // Armazena os dados do usuário na sessão
                $_SESSION['cliente_id'] = $user['id_usuario'];
                $_SESSION['nomeUsuario'] = $user['nome_usuario'];

                // Redireciona para a página inicial
                header("Location: /bookersgalaxy/index.php");
                exit();
            } else {
                // Exibe mensagem de erro
                echo "<br><br><br><br><center><div class=Pai1>
                <i> Email e/ou senha incorreto(s).</i>
                <a href='login.php'>Voltar</a>
                </div>";
            }
        } else {
            echo "Ação inválida.";
            exit();
        } 
    } else {
        echo "Método de requisição inválido.";
        exit();
    }
    ?>
</html>