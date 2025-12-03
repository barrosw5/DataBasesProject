<?php
include '../db.php';
if($_SESSION['tipo'] != 'administrativo') header("Location: ../index.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Apaga apenas o estágio do aluno
    $sql = "DELETE FROM estagio WHERE aluno_id = $id";
    if(mysqli_query($conn, $sql)) {
        header("Location: dashboard.php");
    } else {
        echo "Erro ao apagar: " . mysqli_error($conn);
    }
}
?>