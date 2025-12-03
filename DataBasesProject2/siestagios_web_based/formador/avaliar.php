<?php include '../db.php'; include '../includes/header.php'; 
$aluno_id = $_GET['id'];
$formador_id = $_SESSION['user_id'];
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="form-container">
            <h3 class="mb-4 text-uppercase">Lançamento de Notas</h3>
            <form method="POST">
                <div class="row mb-3">
                    <div class="col-6"><label class="fw-bold">Nota Empresa</label><input type="number" name="n1" step="0.1" min="0" max="20" class="form-control" required></div>
                    <div class="col-6"><label class="fw-bold">Nota Escola</label><input type="number" name="n2" step="0.1" min="0" max="20" class="form-control" required></div>
                </div>
                <div class="row mb-4">
                    <div class="col-6"><label class="fw-bold">Nota Procura</label><input type="number" name="n3" step="0.1" min="0" max="20" class="form-control" required></div>
                    <div class="col-6"><label class="fw-bold">Nota Relatório</label><input type="number" name="n4" step="0.1" min="0" max="20" class="form-control" required></div>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">CALCULAR E FINALIZAR</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $n1 = $_POST['n1']; $n2 = $_POST['n2']; $n3 = $_POST['n3']; $n4 = $_POST['n4'];
                
                // calcular a media final aqui
                $final = ($n1 + $n2 + $n3 + $n4) / 4;

                // guardar tudo na base de dados
                $sql = "UPDATE estagio 
                        SET nota_empresa=$n1, nota_escola=$n2, nota_procura=$n3, nota_relatorio=$n4, nota_final=$final
                        WHERE aluno_id=$aluno_id AND formador_id=$formador_id";

                if(mysqli_query($conn, $sql)) {
                    echo "<div class='alert alert-success mt-3 text-center'>
                            <h5>Estágio Finalizado!</h5>
                            Média Final: <span class='fs-4 fw-bold'>$final</span> valores.
                            <br><a href='dashboard.php' class='btn btn-sm btn-outline-success mt-2'>Voltar</a>
                          </div>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>Erro: " . mysqli_error($conn) . "</div>";
                }
            }
            ?>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>