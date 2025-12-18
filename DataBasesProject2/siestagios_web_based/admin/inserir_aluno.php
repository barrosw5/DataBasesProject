<?php include '../db.php'; include '../includes/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="form-container">
            <h2 class="mb-4 text-uppercase">Novo Aluno</h2>
            <form method="POST">
                <div class="mb-3"><label class="fw-bold">ID Utilizador (Manual)</label><input type="number" name="u_id" class="form-control" required></div>
                
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
                $u_id = $_POST['u_id']; // Captura o ID manual inserido
                $nome = $_POST['nome']; $login = $_POST['login'];
                $pass = $_POST['pass']; $turma = $_POST['turma']; $num = $_POST['num'];

                // 1. Inserir na tabela utilizador incluindo o utilizador_id fornecido
                $sql_u = "INSERT INTO utilizador (utilizador_id, login, password, nome, tipo) VALUES ($u_id, '$login', '$pass', '$nome', 'aluno')";
                
                if(mysqli_query($conn, $sql_u)) {
                    // 2. Inserir na tabela aluno utilizando o mesmo $u_id fornecido acima
                    $sql_a = "INSERT INTO aluno (turma_id, utilizador_id, numero) VALUES ($turma, $u_id, $num)";
                    if(mysqli_query($conn, $sql_a)) {
                        echo "<div class='alert alert-success mt-3'>Aluno $u_id registado com sucesso!</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3'>Erro nos detalhes do aluno: " . mysqli_error($conn) . "</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger mt-3'>Erro no utilizador: " . mysqli_error($conn) . "</div>";
                }
            }
            ?>
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>