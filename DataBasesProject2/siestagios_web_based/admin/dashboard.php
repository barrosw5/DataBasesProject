<?php 
include '../db.php';
include '../includes/header.php'; 
if($_SESSION['tipo'] != 'administrativo') header("Location: ../index.php");
?>

<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h1 class="display-5 fw-bold text-uppercase" style="text-shadow: 2px 2px 0 var(--blue-light);">Gestão Admin</h1>
    </div>
    <div class="col-md-6 text-end">
        <a href="inserir_estagio.php" class="btn btn-primary btn-lg me-2"><i class="fas fa-plus"></i> Estágio</a>
        <a href="inserir_aluno.php" class="btn btn-success btn-lg"><i class="fas fa-user-plus"></i> Aluno</a>
    </div>
</div>

<div class="table-container">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th>Aluno</th>
                <th>Empresa</th>
                <th>Período</th>
                <th>Estado</th>
                <th class="text-end">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT e.*, u.nome as nome_aluno, emp.firma 
                    FROM estagio e 
                    JOIN aluno a ON e.aluno_id = a.utilizador_id
                    JOIN utilizador u ON a.utilizador_id = u.utilizador_id
                    JOIN estabelecimento est ON e.estabelecimento_id = est.estabelecimento_id AND e.estabelecimento_empresa_id = est.empresa_id
                    JOIN empresa emp ON est.empresa_id = emp.empresa_id";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)) {
                $hoje = date('Y-m-d');
                $ativo = ($row['data_fim'] >= $hoje);
                echo "<tr>";
                echo "<td class='fw-bold'>" . $row['nome_aluno'] . "</td>";
                echo "<td class='text-primary fw-bold'>" . $row['firma'] . "</td>";
                echo "<td>" . $row['data_inicio'] . " <i class='fas fa-arrow-right mx-1 text-muted'></i> " . $row['data_fim'] . "</td>";
                if($ativo) {
                    echo "<td><span class='badge bg-success'>DECORRER</span></td>";
                    echo "<td class='text-end'><a href='apagar.php?id=".$row['aluno_id']."' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i></a></td>";
                } else {
                    echo "<td><span class='badge bg-secondary'>FIM</span></td>";
                    echo "<td class='text-end'><span class='text-muted fw-bold'>BLOQUEADO</span></td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>