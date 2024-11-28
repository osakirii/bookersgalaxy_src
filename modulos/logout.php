<?php
session_start();  // Inicia a sessão

// Destrói todas as variáveis de sessão
session_unset();  // Limpa todas as variáveis de sessão

// Destrói a sessão completamente
session_destroy();  // Destroi a sessão

// Redireciona para a página de login (ou qualquer outra página)
header("Refresh:0; url=/bookersgalaxy/index.php");  // Pode ser a página de login ou outra página
exit();
?>