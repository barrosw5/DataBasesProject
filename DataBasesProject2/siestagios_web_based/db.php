<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "siestagios2_v1"; // nome exato da BD no ficheiro .sql

// criar a ligacao a base de dados
$conn = mysqli_connect($servername, $username, $password, $dbname);

// verificar se a ligacao falhou
if (!$conn) {
    die("falha na ligacao: " . mysqli_connect_error());
}

// forcar os caracteres especiais para nao dar erro nos acentos
mysqli_set_charset($conn, "utf8");

// iniciar a sessao aqui para ficar disponivel em todo o lado
session_start();
?>