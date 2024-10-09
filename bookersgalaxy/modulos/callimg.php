<?php 
    function Src($id){ 
        include_once("connect.php");

        $results = $mysqli->query("SELECT * from arquivos where id = $id") or die($mysqli->error);
        $mostrar = $results->fetch_assoc();
        echo $mostrar['path'];
    }
?>