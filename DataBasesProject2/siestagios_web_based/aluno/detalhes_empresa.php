<?php include '../db.php'; include '../includes/header.php'; 
$empresa_id = $_GET['id'];
?>

<a href="dashboard.php" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Voltar</a>
<h2 class="mb-4 text-uppercase fw-bold">Detalhes dos Estágios</h2>

<div class="table-container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Estabelecimento</th>
                <th>Responsável</th>
                <th>Transporte</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT est.nome_comercial, est.morada, est.localidade,
                           resp.nome as nome_resp, resp.email,
                           t.meio_transporte, t.linha
                    FROM estabelecimento est
                    JOIN responsavel resp ON est.responsavel_id = resp.responsavel_id
                    LEFT JOIN servido s ON est.estabelecimento_id = s.estabelecimento_id AND est.empresa_id = s.estabelecimento_empresa_id
                    LEFT JOIN transporte t ON s.transporte_id = t.transporte_id
                    WHERE est.empresa_id = $empresa_id";

            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><b>".$row['nome_comercial']."</b><br><small>".$row['morada'].", ".$row['localidade']."</small></td>";
                    echo "<td>".$row['nome_resp']."<br><small class='text-muted'>".$row['email']."</small></td>";
                    echo "<td>".($row['meio_transporte'] ? "<span class='badge bg-success'>".$row['meio_transporte']."</span> ".$row['linha'] : "N/A")."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='text-center'>Sem informação disponível.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>