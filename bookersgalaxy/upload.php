<?php
    include("connect.php");

    // Instancia a conexão usando a classe Connect
    $pdo = Connect::getInstance();

    // Deletar arquivo
    if (isset($_GET['deletar'])) {
        $id = intval($_GET['deletar']);
        
        // Obtém o arquivo para exclusão segura do disco e do banco
        $sql_query = $pdo->prepare("SELECT * FROM arquivossite WHERE id = :id");
        $sql_query->bindParam(':id', $id, PDO::PARAM_INT);
        $sql_query->execute();
        $arquivo = $sql_query->fetch(PDO::FETCH_ASSOC);

        if ($arquivo && unlink($arquivo['path'])) {
            // Deleta o registro do banco
            $delete_query = $pdo->prepare("DELETE FROM arquivossite WHERE id = :id");
            $delete_query->bindParam(':id', $id, PDO::PARAM_INT);
            if ($delete_query->execute()) {
                echo "<p>Arquivo excluído com sucesso.</p>";
            }
        } else {
            echo "<p>Falha ao excluir o arquivo.</p>";
        }
    }

    // Upload de arquivo
    if (isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];

        if ($arquivo['error']) {
            die("Falha ao enviar arquivo.");
        }

        if ($arquivo['size'] > 2097152) {
            die("Arquivo muito grande! Max: 2MB");
        }

        $folder = "img/";
        $archiveName = $arquivo['name'];
        $newArchiveName = uniqid();
        $extension = strtolower(pathinfo($archiveName, PATHINFO_EXTENSION));

        if (!in_array($extension, ['jpg', 'png', 'jpeg', 'gif'])) {
            die("Tipo de arquivo inaceitável! Apenas .jpg, .png, .jpeg ou .gif");
        }

        $path = $folder . $newArchiveName . "." . $extension;

        if (move_uploaded_file($arquivo['tmp_name'], $path)) {
            echo '<p>Arquivo enviado com sucesso. Para acessá-lo, clique <a target="_blank" href="' . htmlspecialchars($path) . '">aqui</a>. </p>';

            // Inserir no banco de dados usando PDO e protegendo contra SQL injection
            $insert_query = $pdo->prepare("INSERT INTO arquivossite (nome, path, data_upload) VALUES (:nome, :path, NOW())");
            $insert_query->bindParam(':nome', $archiveName, PDO::PARAM_STR);
            $insert_query->bindParam(':path', $path, PDO::PARAM_STR);

            if (!$insert_query->execute()) {
                echo "<p>Falha ao salvar registro no banco de dados.</p>";
            }
        } else {
            echo "<p>Falha ao mover o arquivo.</p>";
        }
    }

    // Consulta para listar arquivos
    $sql_query = $pdo->query("SELECT * FROM arquivossite");

    include_once("modulos/loadingscreen.php");
    include_once("modulos/header.php");   
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booker's Galaxy: Upload</title>
        <link rel="stylesheet" href="css/modulos.css">
        <script src="https://kit.fontawesome.com/7162ac436f.js" crossorigin="anonymous"></script>
        <script src="js/modulos.js"></script>
    </head>
    <body>
        <main id="corpo">
            <br><br>
            <form method="post" enctype="multipart/form-data" action="">
                <p><label for="">Selecione o arquivo:</label>
                <input name="arquivo" type="file"></p>
                <button name="upload" type="submit">Enviar arquivo</button> 
            </form>
            <br><br><br><br>
            <table border="1" cellpadding="10">
                <thead>
                    <th>Preview</th>
                    <th>Id</th>
                    <th>Arquivo</th>
                    <th>Data de Envio</th>
                    <th></th>
                </thead>
                <tbody>
                <?php while ($arquivo = $sql_query->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><img height="100" src="<?php echo htmlspecialchars($arquivo['path']); ?>" alt="<?php echo htmlspecialchars($arquivo['nome']); ?>"></td>
                        <td><?php echo '<p>' . htmlspecialchars($arquivo['id']) . '</p>'; ?></td>
                        <td><a target="_blank" href="<?php echo htmlspecialchars($arquivo['path']); ?>"> <?php echo htmlspecialchars($arquivo['nome']); ?></a></td>
                        <td><?php echo date("d/m/Y H:i", strtotime($arquivo['data_upload'])); ?></td>
                        <td><a href="upload.php?deletar=<?php echo htmlspecialchars($arquivo['id']); ?>">Deletar</a></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </body>
</html>
