<?php 
    function Src($id){ 
        include("connect.php");

        $results = $mysqli->query("SELECT * from arquivos where id = $id") or die($mysqli->error);
        $mostrar = $results->fetch_assoc();
        echo $mostrar['path'];
    }
?>