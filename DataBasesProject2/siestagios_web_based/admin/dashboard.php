<?php include '../db.php'; 
if($_SESSION['tipo'] != 'administrativo') header("Location: ../index.php");
?>

<h1>Gestão de Estágios (Admin)</h1>
<p>Bem-vindo, <?php echo $_SESSION['nome']; ?> | <a href="../logout.php">Sair</a></p>

<a href="inserir_estagio.php"><button>Registar Novo Estágio</button></a>
<a href="inserir_aluno.php"><button>Registar Novo Aluno</button></a>

<table border="1" cellpadding="5">
    <tr>
        <th>Aluno</th>
        <th>Empresa</th>
        <th>Data Início</th>
        <th>Data Fim</th>
        <th>Ações</th>
    </tr>
    <?php
    $sql = "SELECT e.*, u.nome as nome_aluno, emp.firma 
            FROM estagio e 
            JOIN aluno a ON e.aluno_id = a.utilizador_id
            JOIN utilizador u ON a.utilizador_id = u.utilizador_id
            JOIN estabelecimento est ON e.estabelecimento_id = est.estabelecimento_id 
                AND e.estabelecimento_empresa_id = est.empresa_id
            JOIN empresa emp ON est.empresa_id = emp.empresa_id";
    
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['nome_aluno'] . "</td>";
        echo "<td>" . $row['firma'] . "</td>";
        echo "<td>" . $row['data_inicio'] . "</td>";
        echo "<td>" . $row['data_fim'] . "</td>";
        
        // Validação: Só permite apagar se a data de fim for futura (estágio não terminado)
        $hoje = date('Y-m-d');
        if($row['data_fim'] >= $hoje) {
            echo "<td><a href='apagar_estagio.php?aid=".$row['aluno_id']."&eid=".$row['estabelecimento_id']."'>Apagar</a></td>";
        } else {
            echo "<td>Finalizado (Bloqueado)</td>";
        }
        echo "</tr>";
    }
    ?>
</table>