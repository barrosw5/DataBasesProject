<?php 
include '../db.php'; include '../includes/header.php'; 
if($_SESSION['tipo'] != 'administrativo') header("Location: ../index.php");

if(!isset($_GET['id'])) header("Location: dashboard.php");
$id_aluno = $_GET['id'];

// ir buscar dados atuais do estagio
$sql_check = "SELECT * FROM estagio WHERE aluno_id = $id_aluno";
$res_check = mysqli_query($conn, $sql_check);
$estagio = mysqli_fetch_assoc($res_check);

// protecao: se ja acabou nao deixa mexer
if($estagio['data_fim'] < date('Y-m-d')) {
    echo "<div class='container mt-5'><div class='alert alert-warning text-center'>Estágio já terminou.</div></div>";
    include '../includes/footer.php'; exit;
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="form-container">
            <h3 class="mb-4 text-uppercase">Editar Datas</h3>
            <form method="POST">
                <div class="mb-3">
                    <label class="fw-bold">Nova Data Início</label>
                    <input type="date" name="d_ini" class="form-control" value="<?php echo $estagio['data_inicio']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Nova Data Fim</label>
                    <input type="date" name="d_fim" class="form-control" value="<?php echo $estagio['data_fim']; ?>" required>
                </div>
                <button type="submit" class="btn btn-warning w-100 py-2 fw-bold">Atualizar</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $d_ini = $_POST['d_ini'];
                $d_fim = $_POST['d_fim'];

                // tentar fazer update (o trigger T2 vai validar as datas)
                $sql_upd = "UPDATE estagio SET data_inicio='$d_ini', data_fim='$d_fim' WHERE aluno_id=$id_aluno";
                
                if(mysqli_query($conn, $sql_upd)) {
                    echo "<div class='alert alert-success mt-3'>Atualizado! <a href='dashboard.php'>Voltar</a></div>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>Erro: " . mysqli_error($conn) . "</div>";
                }
            }
            ?>
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>