<?php include '../db.php'; include '../includes/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="form-container">
            <h2 class="mb-4 text-uppercase">Novo Aluno</h2>
            <form method="POST">
                <div class="mb-3"><label class="fw-bold">Nome Completo</label><input type="text" name="nome" class="form-control" required></div>
                <div class="mb-3"><label class="fw-bold">Username</label><input type="text" name="login" class="form-control" required></div>
                <div class="mb-3"><label class="fw-bold">Password</label><input type="password" name="pass" class="form-control" required></div>
                <div class="row">
                    <div class="col-md-6 mb-3"><label class="fw-bold">ID Turma</label><input type="number" name="turma" class="form-control" required></div>
                    <div class="col-md-6 mb-3"><label class="fw-bold">Nº Aluno</label><input type="number" name="num" class="form-control" required></div>
                </div>
                <button type="submit" class="btn btn-success w-100 py-2">Criar Aluno</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nome = $_POST['nome']; $login = $_POST['login'];
                $pass = $_POST['pass']; $turma = $_POST['turma']; $num = $_POST['num'];

                // 1. inserir na tabela utilizador primeiro
                $sql_u = "INSERT INTO utilizador (login, password, nome, tipo) VALUES ('$login', '$pass', '$nome', 'aluno')";
                if(mysqli_query($conn, $sql_u)) {
                    // ir buscar o id que acabou de ser criado
                    $last_id = mysqli_insert_id($conn);
                    // 2. inserir na tabela aluno com esse id
                    $sql_a = "INSERT INTO aluno (turma_id, utilizador_id, numero) VALUES ($turma, $last_id, $num)";
                    if(mysqli_query($conn, $sql_a)) echo "<div class='alert alert-success mt-3'>Aluno registado!</div>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>Erro: " . mysqli_error($conn) . "</div>";
                }
            }
            ?>
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>