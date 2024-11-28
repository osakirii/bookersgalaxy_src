<?php
include_once(__DIR__ . '/../config.php'); // Configuration and global functions
$con = Connect::getInstance(); // Database connection instance

// Fetch editoras based on criteria
$stmt = $con->prepare("SELECT * FROM editora");
$stmt->execute();
$editoras = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibição de Editoras</title>
    <link rel="stylesheet" href="../css/tabela.css">
    <style>
        /* Table styling */
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
    </style>
</head>

<body>

    <main>
        <h1>Lista de Editoras</h1>
        <?php if (!empty($editoras)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>País</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>CNPJ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($editoras as $editora): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($editora['id_editora']); ?></td>
                            <td><?php echo htmlspecialchars($editora['nome']); ?></td>
                            <td><?php echo htmlspecialchars($editora['pais']); ?></td>
                            <td><?php echo htmlspecialchars($editora['email']); ?></td>
                            <td><?php echo htmlspecialchars($editora['telefone']); ?></td>
                            <td><?php echo htmlspecialchars($editora['cnpj']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhuma editora encontrada.</p>
        <?php endif; ?>
    </main>

</body>

</html>
