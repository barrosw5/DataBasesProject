<?php include '../db.php'; 
if($_SESSION['tipo'] != 'aluno') header("Location: ../index.php");
?>

<h1>Portal do Aluno</h1>
<h3>Pesquisa de Empresas Disponíveis</h3>

<form method="GET">
    Filtrar por Localidade: <input type="text" name="local">
    <input type="submit" value="Filtrar">
</form>

<table border="1">
    <tr>
        <th>Empresa</th>
        <th>Localidade</th>
        <th>Telefone</th>
        <th>Detalhes</th>
    </tr>
    <?php
    $sql = "SELECT * FROM empresa WHERE 1=1";
    
    if(isset($_GET['local']) && !empty($_GET['local'])) {
        $local = mysqli_real_escape_string($conn, $_GET['local']);
        $sql .= " AND localidade LIKE '%$local%'";
    }

    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['firma'] . "</td>";
        echo "<td>" . $row['localidade'] . "</td>";
        echo "<td>" . $row['telefone'] . "</td>";
        // Link para a página de detalhes, passando o ID da empresa
        echo "<td><a href='detalhes_empresa.php?id=".$row['empresa_id']."'>Ver Estágios</a></td>";
        echo "</tr>";
    }
    ?>
</table>
<br><a href="../logout.php">Sair</a>