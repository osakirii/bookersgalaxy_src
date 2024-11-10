<?php
// Define o caminho base para o projeto
if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '/');
}
define('BASE_URL_IMG', '/bookersgalaxy/img/');
if (!defined('BASE_URL')) {
    define('BASE_URL', '/bookersgalaxy/'); // Ajuste para o caminho raiz do projeto
}

// Inclua o arquivo de conexão uma vez
include_once(BASE_PATH . "connect.php");
include_once(BASE_PATH . "modulos/callimg.php");
include_once(BASE_PATH."modulos/loadingscreen.php");
include_once(BASE_PATH . "modulos/header.php");

// Inclua funções universais (por exemplo, o arquivo `callimg.php` com a função `Busca`)
?>
