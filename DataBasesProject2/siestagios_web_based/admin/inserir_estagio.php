<?php include '../db.php'; ?>
<h3>Registar Estágio (Via Procedure P1)</h3>
<form method="POST">
    Data Início: <input type="date" name="d_ini" required><br>
    Data Fim: <input type="date" name="d_fim" required><br>
    ID Aluno: <input type="number" name="id_aluno" required> (Consulte a tabela Alunos)<br>
    ID Empresa: <input type="number" name="id_empresa" required><br>
    ID Estabelecimento: <input type="number" name="id_estab" required><br>
    ID Formador: <input type="number" name="id_form" required><br><br>
    <input type="submit" value="Registar">
</form>
<a href="dashboard.php">Voltar</a>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $d_ini = $_POST['d_ini'];
    $d_fim = $_POST['d_fim'];
    $aluno = $_POST['id_aluno'];
    $emp = $_POST['id_empresa'];
    $estab = $_POST['id_estab'];
    $form = $_POST['id_form'];

    // Chama a Stored Procedure P1
    $sql = "CALL P1('$d_ini', '$d_fim', $aluno, $emp, $estab, $form)";
    
    if(mysqli_query($conn, $sql)) {
        echo "<p style='color:green'>Estágio registado com sucesso!</p>";
    } else {
        echo "<p style='color:red'>Erro (possivelmente dados inválidos): " . mysqli_error($conn) . "</p>";
    }
}
?>