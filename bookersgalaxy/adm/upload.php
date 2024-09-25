<?php
    include("connect.php");

    if (isset($_GET['deletar'])){

        $id = intval($_GET['deletar']);
        $sql_query = $mysqli->query("SELECT * FROM arquivos WHERE id = $id") or die($mysqli->error);
        $arquivo = $sql_query->fetch_assoc();

        if(unlink($arquivo['path'])){
           $accepted = $mysqli->query("DELETE FROM arquivos WHERE id = $id") or die($mysqli->error);
                if($accepted){
                    echo "<p>Arquivo excluído com sucesso.</p>";
                }
           
        }
    }

    if(isset($_FILES['arquivo'])){
        $arquivo = $_FILES['arquivo'];

        if($arquivo['error']){
            die("Falha ao enviar arquivo.");
        }

        if($arquivo['size'] > 2097152){
            die("Arquivo muito grande!!! Max: 2MB");
        }

        $folder = "img/";
        $archiveName = $arquivo['name'];
        $newArchiveName = uniqid();
        $extension = strtolower(pathinfo($archiveName, PATHINFO_EXTENSION));

        if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg'){
            die("Tipo de arquivo inaceitável!! Apenas .jpg, .png ou .jpeg");

        }

        $path = $folder . $newArchiveName. ".". $extension;

        $accepted = move_uploaded_file($arquivo['tmp_name'], $path);
        if($accepted){
            echo '<p>Arquivo enviado com sucesso. Para acessá-lo, clique <a target="_blank" href="img/'.$newArchiveName.".".$extension.'">aqui</a>. </p>';

            $mysqli->query("INSERT INTO arquivos (nome, path, data_upload) VALUES ('$archiveName', '$path', NOW())") or die($mysqli->error);
        } else {
            echo "<p>Falha ao enviar arquivo.</p>";
        }
    }

    $sql_query = $mysqli->query("SELECT * FROM arquivos") or die ($mysqli->error);
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booker's Galaxy</title>
        <link rel="stylesheet" href="css/modulos.css">
        <script src="https://kit.fontawesome.com/7162ac436f.js" 
        crossorigin="anonymous"></script>
        <script src="js/headerfooter.js"></script>
    </head>

    <body>
        <div id="loadingscreen">
                <h1>Booker's Galaxy</h1>
                <h2>Carregando...</h2>
            <img src="img/book loading.gif">
        </div>
        <div id="header-gradiente"></div>
        <main id="corpo">
            <form method="post" enctype="multipart/form-data" action="">
                <p><label for="">Selecione o arquivo</label>
                <input name="arquivo" type="file"></p>
                <button name="upload" type="submit">Enviar arquivo</button> 
            </form>
            <br><br><br><br>
            <table border="1" cellpadding="10">
                <thead>
                    <th>Preview</th>
                    <th>Arquivo</th>
                    <th>Data de Envio</th>
                    <th></th>
                </thead>
                <tbody>
                <?php
                        while($arquivo = $sql_query->fetch_assoc()){

                    ?>
                    <tr>
                        <td><img height="50" src="<?php echo $arquivo['path']; ?>" alt="<?php echo $arquivo['nome']; ?>"></td>
                        <td><a target="_blank" href="<?php echo $arquivo['path']; ?>"> <?php echo $arquivo['nome']; ?></a></td>
                        <td><?php echo date("d/m/Y H:i", strtotime($arquivo['data_upload'])); ?></td>
                        <td><a href="upload.php?deletar=<?php echo $arquivo['id']; ?>">Deletar</a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
                    
        </main>

        
    </body>
</html>