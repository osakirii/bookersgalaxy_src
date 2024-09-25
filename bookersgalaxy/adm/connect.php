<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db = "bookersgalaxy";

$mysqli = new mysqli($hostname, $username, $password, $db);
if ($mysqli->connect_errno){
  echo "Falha ao conectar: (". $mysqli->connect_errno . ") ". $mysqli->connect_error;
}
?>