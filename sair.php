<?php
session_start();

// Destruir todas as sessões
session_unset();

// Destruir a sessão
session_destroy();

// Redirecionar para a página inicial deslogado
header("Location: pagina_inicial_deslogado.php");
exit();
?>
