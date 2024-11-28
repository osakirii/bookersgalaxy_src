<?php
include_once(__DIR__ . '/../config.php'); // Configuração e funções globais
$con = Connect::getInstance(); // Instância da conexão com o banco de dados

// Função para buscar autores
function BuscaAutor($id_autor = null) {
    global $con;
    try {
        if ($id_autor) {
            $stmt = $con->prepare("SELECT * FROM autor WHERE ID_autor = ?");
            $stmt->execute([$id_autor]);
        } else {
            $stmt = $con->prepare("SELECT * FROM autor");
            $stmt->execute();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
        return [];
    }
}

// Busca todos os autores
$autores = BuscaAutor();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibição de Autores</title>
    <link rel="stylesheet" href="../css/tabela.css">
    <style>
        /* Estilo da tabela */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        textarea {
            background-color: transparent;
            border: 1px solid transparent;
            color: #000;
            width: 100%;
            resize: none;
            height: 80px;
        }
    </style>
</head>

<body>

    <main>
        <h1>Lista de Autores</h1>
        <?php if (!empty($autores)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data de Nascimento</th>
                        <th>Nacionalidade</th>
                        <th>Biografia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($autores as $autor): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($autor['ID_autor']); ?></td>
                            <td><?php echo htmlspecialchars($autor['nome']); ?></td>
                            <td><?php echo htmlspecialchars($autor['data_nascimento']); ?></td>
                            <td><?php echo htmlspecialchars($autor['nacionalidade']); ?></td>
                            <td style="width: 400px;"><textarea readonly><?php echo htmlspecialchars($autor['bio']); ?></textarea></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum autor encontrado.</p>
        <?php endif; ?>
    </main>

</body>

</html>
