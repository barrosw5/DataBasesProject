<?php 
include '../db.php'; include '../includes/header.php'; 
if($_SESSION['tipo'] != 'formador') header("Location: ../index.php");
// ir buscar o id do formador a sessao
$id_formador = $_SESSION['user_id'];
?>

<h1 class="display-6 fw-bold text-uppercase mb-4">Meus Estagiários</h1>

<div class="table-container">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th>Aluno</th>
                <th>Empresa</th>
                <th>Nota Final</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // filtrar apenas alunos deste formador
            $sql = "SELECT e.aluno_id, u.nome, emp.firma, e.nota_final 
                    FROM estagio e
                    JOIN aluno a ON e.aluno_id = a.utilizador_id
                    JOIN utilizador u ON a.utilizador_id = u.utilizador_id
                    JOIN estabelecimento est ON e.estabelecimento_id = est.estabelecimento_id AND e.estabelecimento_empresa_id = est.empresa_id
                    JOIN empresa emp ON est.empresa_id = emp.empresa_id
                    WHERE e.formador_id = $id_formador";

            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td class='fw-bold'>".$row['nome']."</td>";
                echo "<td>".$row['firma']."</td>";
                echo "<td>".($row['nota_final'] ? "<span class='badge bg-success text-dark fs-6'>".$row['nota_final']."</span>" : "<span class='badge bg-secondary'>Pendente</span>")."</td>";
                echo "<td><a href='avaliar.php?id=".$row['aluno_id']."' class='btn btn-primary btn-sm'>Avaliar</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>