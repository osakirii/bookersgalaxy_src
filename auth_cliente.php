    <?php
session_start();
require 'connect.php'; // Inclua o arquivo de conexão ao banco de dados
try {
    $conn = Connect::getInstance(); // Obtenha a instância da conexão

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obter dados do formulário
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Verificar se o cliente já existe com o email fornecido
        $stmt = $conn->prepare("SELECT id_usuario, senha FROM clientes WHERE email = ?");
        $stmt->execute([$email]);
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($cliente) {
            // Cliente encontrado, verificar a senha para login
            if (password_verify($senha, $cliente['senha'])) {
                // Senha correta, criar sessão com o ID do cliente
                $_SESSION['cliente_id'] = $cliente['id_usuario'];
                echo "Login realizado com sucesso!";
                // Redirecionar para uma página de sucesso, se necessário
                header("Location:listarLivros.php");
                exit();
            } else {
                echo "Senha incorreta.";
            }
        } else {
            // Cliente não encontrado, registrar um novo
            $nome_completo = $_POST['nome_completo'];
            $senha_hashed = password_hash($senha, PASSWORD_BCRYPT);
            $email = $_POST['email'];

            $stmt = $conn->prepare("INSERT INTO clientes (nome_completo, email, senha, telefone, cpf, foto) VALUES (?, ?, ?, ?, ?, ?)");
            if ($stmt->rowCount() > 0) {
                echo "Este e-mail já está cadastrado.";
            }else {
                $stmt->execute([$nome_completo, $email, $senha_hashed, $telefone, $cpf, $foto]);

            }

            if ($stmt) {
                $cliente_id = $conn->lastInsertId(); // Obter o ID do cliente inserido
                $_SESSION['cliente_id'] = $cliente_id; // Iniciar sessão com o ID do cliente

                // Inserir dados na tabela endereços
                $stmt_endereco = $conn->prepare("INSERT INTO enderecos (cliente_id, rua, numero, bairro, cidade, estado, cep) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt_endereco->execute([$cliente_id, $rua, $numero, $bairro, $cidade, $estado, $cep]);

                if ($stmt_endereco) {
                    echo "Cadastro realizado com sucesso!";
                    // Redirecionar para uma página de sucesso, se necessário
                } else {
                    throw new Exception("Erro ao cadastrar endereço: " . $stmt_endereco->errorInfo()[2]);
                }
            } else {
                throw new Exception("Erro ao cadastrar cliente: " . $stmt->errorInfo()[2]);
            }
        }
    }
} catch (Exception $e) {
    echo "Ocorreu um erro: " . $e->getMessage();
} finally {
    $conn = null; // Fechar a conexão
}
function validateCPF() {}
function validateEmail() {}

?>
