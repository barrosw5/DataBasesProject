<?php 
include '../db.php'; include '../includes/header.php'; 
if($_SESSION['tipo'] != 'aluno') header("Location: ../index.php");
?>

<div class="row mb-4">
    <div class="col-md-6"><h1 class="display-6 fw-bold text-uppercase">Pesquisa de Empresas</h1></div>
    <div class="col-md-6">
        <form method="GET" class="d-flex gap-2">
            <input type="text" name="local" class="form-control" placeholder="Localidade..." value="<?php echo isset($_GET['local']) ? $_GET['local'] : ''; ?>">
            
            <select name="ramo" class="form-select">
                <option value="">Todos os Ramos</option>
                <?php
                // ir buscar os ramos a bd para preencher o select
                $sql_ramos = "SELECT * FROM ramo_atividade";
                $res_ramos = mysqli_query($conn, $sql_ramos);
                while($r = mysqli_fetch_assoc($res_ramos)) {
                    $selected = (isset($_GET['ramo']) && $_GET['ramo'] == $r['ramo_atividade_id']) ? 'selected' : '';
                    echo "<option value='".$r['ramo_atividade_id']."' $selected>".$r['descricao']."</option>";
                }
                ?>
            </select>
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>

<div class="row">
    <?php
    // query base com joins para apanhar os ramos
    $sql = "SELECT DISTINCT e.*, r.descricao as nome_ramo 
            FROM empresa e 
            JOIN trabalha t ON e.empresa_id = t.empresa_id
            JOIN ramo_atividade r ON t.ramo_atividade_id = r.ramo_atividade_id
            WHERE 1=1";

    // se escreveu localidade, adicionar filtro
    if(isset($_GET['local']) && !empty($_GET['local'])) {
        $local = mysqli_real_escape_string($conn, $_GET['local']);
        $sql .= " AND e.localidade LIKE '%$local%'";
    }

    // se escolheu ramo, adicionar filtro
    if(isset($_GET['ramo']) && !empty($_GET['ramo'])) {
        $ramo = mysqli_real_escape_string($conn, $_GET['ramo']);
        $sql .= " AND t.ramo_atividade_id = '$ramo'";
    }

    $result = mysqli_query($conn, $sql);

    // mostrar cartoes se houver resultados
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title fw-bold text-primary">'.$row['firma'].'</h4>
                            <p class="mb-1"><span class="badge bg-secondary">'.$row['nome_ramo'].'</span></p>
                            <p class="card-text text-muted"><i class="fas fa-map-marker-alt me-2"></i>'.$row['localidade'].'</p>
                            <a href="detalhes_empresa.php?id='.$row['empresa_id'].'" class="btn btn-primary w-100 mt-3">Ver Detalhes</a>
                        </div>
                    </div>
                  </div>';
        }
    } else {
        echo "<div class='alert alert-warning'>nenhuma empresa encontrada.</div>";
    }
    ?>
</div>

<?php include '../includes/footer.php'; ?>