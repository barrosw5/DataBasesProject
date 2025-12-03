<?php 
include '../db.php'; include '../includes/header.php'; 
if($_SESSION['tipo'] != 'administrativo') header("Location: ../index.php");

// Receber ID do aluno (parte da chave primária do estágio)
if(!isset($_GET['id'])) header("Location: dashboard.php");
$id_aluno = $_GET['id'];

// Verificar se o estágio existe e se ainda está a decorrer
$sql_check = "SELECT * FROM estagio WHERE aluno_id = $id_aluno";
$res_check = mysqli_query($conn, $sql_check);
$estagio = mysqli_fetch_assoc($res_check);

if(!$estagio) {
    echo "<div class='alert alert-danger'>Estágio não encontrado.</div>";
    exit;
}

// Bloqueio de segurança: Se já acabou, não deixa editar
if($estagio['data_fim'] < date('Y-m-d')) {
    echo "<div class='container mt-5'><div class='alert alert-warning text-center'>
            <h3><i class='fas fa-lock'></i> Estágio Finalizado</h3>
            Não é possível editar estágios que já terminaram.
            <br><a href='dashboard.php' class='btn btn-dark mt-3'>Voltar</a>
          </div></div>";
    include '../includes/footer.php';
    exit;
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="form-container">
            <h3 class="mb-4 text-uppercase">Editar Datas do Estágio</h3>
            
            <form method="POST">
                <div class="alert alert-info">
                    A editar estágio do aluno ID: <b><?php echo $id_aluno; ?></b>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Nova Data Início</label>
                    <input type="date" name="d_ini" class="form-control" value="<?php echo $estagio['data_inicio']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Nova Data Fim</label>
                    <input type="date" name="d_fim" class="form-control" value="<?php echo $estagio['data_fim']; ?>" required>
                </div>
                
                <button type="submit" class="btn btn-warning w-100 py-2 fw-bold">Atualizar Datas</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $d_ini = $_POST['d_ini'];
                $d_fim = $_POST['d_fim'];

                // Atualização simples
                $sql_upd = "UPDATE estagio SET data_inicio='$d_ini', data_fim='$d_fim' WHERE aluno_id=$id_aluno";
                
                if(mysqli_query($conn, $sql_upd)) {
                    echo "<div class='alert alert-success mt-3'>Estágio atualizado! <a href='dashboard.php'>Voltar</a></div>";
                } else {
                    // Aqui vai disparar o Trigger T2 se a data inicio > fim
                    echo "<div class='alert alert-danger mt-3'>Erro: " . mysqli_error($conn) . "</div>";
                }
            }
            ?>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>