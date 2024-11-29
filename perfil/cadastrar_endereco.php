<?php
// Arquivo de conexão com o banco de dados
$host = 'localhost';   // Alterar para o seu host
$dbname = 'bookersgalaxy'; // Nome do banco de dados
$username = 'root';     // Nome do usuário do banco

// Conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
    exit;
}

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $estado = $_POST['Estado'];
    $cidade = $_POST['Cidade'];
    $rua = $_POST['Rua'];
    $cep = $_POST['CEP'];
    $numero = $_POST['Numero'];
    $complemento = $_POST['complemento'];
    
    // ID do usuário (supondo que o ID do usuário esteja armazenado na sessão ou em outra variável)
    session_start();
    $id_usuario = $_SESSION['cliente_id']; // Substitua por como o ID do usuário é armazenado (ex: $_SESSION ou $_POST)

    try {
        // Inicia a transação
        $pdo->beginTransaction();

        // Prepara a query para inserção no banco de dados (tabela enderecos_cliente)
        $sql = "INSERT INTO enderecos_cliente (Estado, Cidade_Cli, Rua, CEP, Numero, Complemento) 
                VALUES (:estado, :cidade, :rua, :cep, :numero, :complemento)";

        $stmt = $pdo->prepare($sql);

        // Vincula os parâmetros
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':complemento', $complemento);

        // Executa a query
        $stmt->execute();

        // Obtém o último ID inserido (Id_enderecoCli auto_increment)
        $id_endereco = $pdo->lastInsertId();

        // Agora insere na tabela 'moradia' associando o endereço ao usuário
        $sql_moradia = "INSERT INTO moradia (Id_EnderecoCli, id_usuario) 
                        VALUES (:id_endereco, :id_usuario)";
        
        $stmt_moradia = $pdo->prepare($sql_moradia);
        $stmt_moradia->bindParam(':id_endereco', $id_endereco);
        $stmt_moradia->bindParam(':id_usuario', $id_usuario);

        // Executa a inserção na tabela 'moradia'
        $stmt_moradia->execute();

        // Comita a transação
        $pdo->commit();

        // Redireciona para a página principal
        header('Location: /bookersgalaxy/perfil/pedidos.php');
        exit;
    } catch (Exception $e) {
        // Se ocorrer um erro, faz o rollback
        $pdo->rollBack();
        echo "Erro ao cadastrar o endereço: " . $e->getMessage();
    }
} else {
    // Se o método não for POST, redireciona para a raiz
    header('Location: /');
    exit;
}
?>
