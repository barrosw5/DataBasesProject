<?php include '../db.php'; 
if($_SESSION['tipo'] != 'formador') header("Location: ../index.php");
$id_formador = $_SESSION['user_id'];
?>

<h1>Portal do Formador</h1>
<p>Os meus estagiários:</p>

<table border="1">
    <tr>
        <th>Aluno</th>
        <th>Empresa</th>
        <th>Nota Final Atual</th>
        <th>Ação</th>
    </tr>
    <?php
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
        echo "<td>".$row['nome']."</td>";
        echo "<td>".$row['firma']."</td>";
        echo "<td>".($row['nota_final'] ? $row['nota_final'] : "Não avaliado")."</td>";
        echo "<td><a href='avaliar.php?id=".$row['aluno_id']."'>Avaliar / Finalizar</a></td>";
        echo "</tr>";
    }
    ?>
</table>
<br><a href="../logout.php">Sair</a>