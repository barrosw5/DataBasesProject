<?php include '../db.php'; 
$aluno_id = $_GET['id'];
$formador_id = $_SESSION['user_id'];
?>

<h3>Avaliação de Estágio</h3>

<form method="POST">
    Nota Empresa (0-20): <input type="number" name="n1" step="0.1" required><br>
    Nota Escola (0-20): <input type="number" name="n2" step="0.1" required><br>
    Nota Procura (0-20): <input type="number" name="n3" step="0.1" required><br>
    Nota Relatório (0-20): <input type="number" name="n4" step="0.1" required><br><br>
    <input type="submit" value="Calcular e Finalizar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $n3 = $_POST['n3'];
    $n4 = $_POST['n4'];

    // Cálculo automático da Média (Requisito 3.1)
    $final = ($n1 + $n2 + $n3 + $n4) / 4;

    // Atualizar na Base de Dados
    $sql = "UPDATE estagio 
            SET nota_empresa=$n1, nota_escola=$n2, nota_procura=$n3, nota_relatorio=$n4, nota_final=$final
            WHERE aluno_id=$aluno_id AND formador_id=$formador_id";

    if(mysqli_query($conn, $sql)) {
        echo "<h3>Estágio finalizado com sucesso!</h3>";
        echo "<p>Média Final Calculada: <b>$final</b> valores.</p>";
        echo "<a href='dashboard.php'>Voltar à lista</a>";
    } else {
        echo "Erro ao gravar notas: " . mysqli_error($conn);
    }
}
?>