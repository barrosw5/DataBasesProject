<?php include '../db.php'; ?>
<h3>Registar Novo Aluno</h3>
<form method="POST">
    Nome: <input type="text" name="nome" required><br>
    Login: <input type="text" name="login" required><br>
    Password: <input type="password" name="pass" required><br>
    ID Turma: <input type="number" name="turma" required><br>
    Número Aluno: <input type="number" name="num" required><br><br>
    <input type="submit" value="Criar Aluno">
</form>
<a href="dashboard.php">Voltar</a>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $turma = $_POST['turma'];
    $num = $_POST['num'];

    // 1. Inserir na tabela UTILIZADOR
    $sql_u = "INSERT INTO utilizador (login, password, nome, tipo) VALUES ('$login', '$pass', '$nome', 'aluno')";
    
    if(mysqli_query($conn, $sql_u)) {
        $last_id = mysqli_insert_id($conn); // Pega o ID criado
        
        // 2. Inserir na tabela ALUNO
        $sql_a = "INSERT INTO aluno (turma_id, utilizador_id, numero) VALUES ($turma, $last_id, $num)";
        if(mysqli_query($conn, $sql_a)) {
            echo "<p style='color:green'>Aluno criado com sucesso!</p>";
        } else {
            echo "Erro ao criar detalhes do aluno: " . mysqli_error($conn);
        }
    } else {
        echo "Erro ao criar utilizador: " . mysqli_error($conn);
    }
}
?>