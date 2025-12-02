<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "siestagios2_v1"; // Nome exato da BD no ficheiro .sql

// Criar a ligação
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar a ligação
if (!$conn) {
    die("Falha na ligação: " . mysqli_connect_error());
}

// Suporte para acentos e cedilhas
mysqli_set_charset($conn, "utf8");

// Iniciar sessões em todas as páginas que incluam este ficheiro
session_start();
?>