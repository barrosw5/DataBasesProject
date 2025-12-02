<?php include '../db.php'; 
$empresa_id = $_GET['id'];
?>

<h3>Detalhes dos Estágios da Empresa</h3>
<a href="dashboard.php">Voltar</a>

<?php
// Query complexa para ir buscar os dados todos exigidos no ponto 2.2 do enunciado
$sql = "SELECT est.nome_comercial, est.morada, est.localidade,
               resp.nome as nome_resp, resp.cargo, resp.telemovel, resp.email,
               t.meio_transporte, t.linha
        FROM estabelecimento est
        JOIN responsavel resp ON est.responsavel_id = resp.responsavel_id
        LEFT JOIN servido s ON est.estabelecimento_id = s.estabelecimento_id AND est.empresa_id = s.estabelecimento_empresa_id
        LEFT JOIN transporte t ON s.transporte_id = t.transporte_id
        WHERE est.empresa_id = $empresa_id";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Estabelecimento</th><th>Morada</th><th>Responsável</th><th>Transporte</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['nome_comercial']."</td>";
        echo "<td>".$row['morada']." - ".$row['localidade']."</td>";
        echo "<td>".$row['nome_resp']." (".$row['cargo'].")<br>".$row['email']."</td>";
        echo "<td>". ($row['meio_transporte'] ? $row['meio_transporte']." - ".$row['linha'] : "Sem info") ."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Não há detalhes de estabelecimentos para esta empresa.</p>";
}
?>