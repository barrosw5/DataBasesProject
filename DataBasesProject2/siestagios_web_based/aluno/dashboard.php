<?php 
include '../db.php'; include '../includes/header.php'; 
if($_SESSION['tipo'] != 'aluno') header("Location: ../index.php");
?>

<div class="row mb-4">
    <div class="col-md-8"><h1 class="display-6 fw-bold text-uppercase">Pesquisa de Empresas</h1></div>
    <div class="col-md-4">
        <form method="GET" class="d-flex">
            <input type="text" name="local" class="form-control me-2" placeholder="Localidade...">
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>

<div class="row">
    <?php
    $sql = "SELECT * FROM empresa WHERE 1=1";
    if(isset($_GET['local']) && !empty($_GET['local'])) {
        $local = mysqli_real_escape_string($conn, $_GET['local']);
        $sql .= " AND localidade LIKE '%$local%'";
    }
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title fw-bold text-primary">'.$row['firma'].'</h4>
                        <p class="card-text"><i class="fas fa-map-marker-alt text-danger me-2"></i>'.$row['localidade'].'</p>
                        <p class="card-text"><i class="fas fa-phone me-2"></i>'.$row['telefone'].'</p>
                        <a href="detalhes_empresa.php?id='.$row['empresa_id'].'" class="btn btn-primary w-100 mt-3">Ver Detalhes</a>
                    </div>
                </div>
              </div>';
    }
    ?>
</div>

<?php include '../includes/footer.php'; ?>