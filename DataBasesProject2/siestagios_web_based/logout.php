<?php
session_start();
// apagar todas as variaveis da sessao
session_destroy();
// mandar de volta para a pagina inicial
header("Location: index.php");
exit();
?>