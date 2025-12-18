<?php include '../db.php'; include '../includes/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="form-container">
            <h2 class="mb-4 text-uppercase">Registar Novo Estágio</h2>
            <form method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Data Início</label>
                        <input type="date" name="d_ini" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Data Fim</label>
                        <input type="date" name="d_fim" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3"><label class="fw-bold">ID Aluno</label><input type="number" name="id_aluno" class="form-control" required></div>
                <div class="mb-3"><label class="fw-bold">ID Empresa</label><input type="number" name="id_empresa" class="form-control" required></div>
                <div class="mb-3"><label class="fw-bold">ID Estabelecimento</label><input type="number" name="id_estab" class="form-control" required></div>
                <div class="mb-3"><label class="fw-bold">ID Formador</label><input type="number" name="id_form" class="form-control" required></div>
                
                <button type="submit" class="btn btn-primary w-100 py-2">Confirmar Registo</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // receber os dados do formulario
                $d_ini = $_POST['d_ini']; $d_fim = $_POST['d_fim'];
                $aluno = $_POST['id_aluno']; $emp = $_POST['id_empresa'];
                $estab = $_POST['id_estab']; $form = $_POST['id_form'];
                
                // chamar a procedure P1 criada no sql
                $sql = "CALL P1('$d_ini', '$d_fim', $aluno, $emp, $estab, $form)";
                
                // executar e ver se correu bem
                if(mysqli_query($conn, $sql)) echo "<div class='alert alert-success mt-3'><b>Sucesso!</b> Estágio criado.</div>";
                else echo "<div class='alert alert-danger mt-3'><b>Erro:</b> " . mysqli_error($conn) . "</div>";
            }
            ?>
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>