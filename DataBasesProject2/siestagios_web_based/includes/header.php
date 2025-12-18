<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI Estágios | Blue Tech</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;600;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --blue-dark: #0a192f;
            --blue-main: #007bff;
            --blue-light: #4cc9f0;
            --blue-pale: #e3f2fd;
            --white: #ffffff;
            --border-width: 3px;
            --shadow-dist: 5px;
        }

        body {
            background-color: var(--blue-pale);
            background-image: 
                linear-gradient(45deg, var(--blue-light) 25%, transparent 25%, transparent 75%, var(--blue-light) 75%, var(--blue-light)),
                linear-gradient(45deg, var(--blue-light) 25%, transparent 25%, transparent 75%, var(--blue-light) 75%, var(--blue-light));
            background-size: 40px 40px;
            background-position: 0 0, 20px 20px;
            background-blend-mode: soft-light;
            font-family: 'Kanit', sans-serif;
            color: var(--blue-dark);
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background-color: var(--white) !important;
            border-bottom: var(--border-width) solid var(--blue-dark);
            box-shadow: 0 var(--shadow-dist) 0 var(--blue-main);
            padding: 1rem 0;
            margin-bottom: 40px;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.8rem;
            color: var(--blue-main) !important;
            text-transform: uppercase;
            text-shadow: 2px 2px 0 var(--blue-dark);
        }

        .nav-link {
            color: var(--blue-dark) !important;
            font-weight: 600;
            text-transform: uppercase;
            margin: 0 10px;
            transition: 0.2s;
        }

        .nav-link:hover {
            color: var(--blue-main) !important;
            transform: translateY(-2px);
        }

        /* CARDS & FORMS */
        .card, .form-container {
            border: var(--border-width) solid var(--blue-dark);
            border-radius: 0;
            box-shadow: var(--shadow-dist) var(--shadow-dist) 0 var(--blue-dark);
            background: var(--white);
            padding: 20px;
        }

        /* BOTÕES */
        .btn {
            border: var(--border-width) solid var(--blue-dark);
            border-radius: 0;
            font-weight: 800;
            text-transform: uppercase;
            box-shadow: 3px 3px 0 var(--blue-dark);
            transition: all 0.1s;
        }

        .btn:hover {
            transform: translate(-2px, -2px);
            box-shadow: 5px 5px 0 var(--blue-dark);
        }

        .btn-primary { background-color: var(--blue-main); color: var(--white); }
        .btn-success { background-color: var(--blue-light); color: var(--blue-dark); }
        .btn-danger { background-color: #ff4757; color: white; }

        /* TABELAS */
        .table-container {
            background: white;
            border: var(--border-width) solid var(--blue-dark);
            box-shadow: var(--shadow-dist) var(--shadow-dist) 0 var(--blue-light);
            padding: 20px;
        }
        .table thead th {
            background-color: var(--blue-dark);
            color: var(--white);
            text-transform: uppercase;
        }
        .table-hover tbody tr:hover {
            background-color: var(--blue-pale);
            color: var(--blue-main);
            font-weight: bold;
        }
        
        /* Inputs */
        .form-control {
            border: 2px solid var(--blue-dark);
            border-radius: 0;
            background-color: #f8f9fa;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: var(--blue-main);
            background-color: #fff;
        }
    </style>
</head>
<body>

<?php if(isset($_SESSION['user_id'])): ?>
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#"><i class="fas fa-layer-group me-2"></i>SI Estágios</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto ms-4">
        <?php if($_SESSION['tipo'] == 'administrativo'): ?>
            <li class="nav-item"><a class="nav-link" href="../admin/dashboard.php">Gestão Admin</a></li>
        <?php elseif($_SESSION['tipo'] == 'aluno'): ?>
            <li class="nav-item"><a class="nav-link" href="../aluno/dashboard.php">Empresas</a></li>
        <?php elseif($_SESSION['tipo'] == 'formador'): ?>
            <li class="nav-item"><a class="nav-link" href="../formador/dashboard.php">Minhas Turmas</a></li>
        <?php endif; ?>
      </ul>
      <div class="d-flex align-items-center">
        <div class="bg-white px-3 py-1 border border-3 border-dark fw-bold me-3" style="box-shadow: 3px 3px 0 var(--blue-light);">
            <i class="fas fa-user-circle me-2"></i><?php echo $_SESSION['nome']; ?>
        </div>
        <a href="../logout.php" class="btn btn-danger btn-sm">SAIR</a>
      </div>
    </div>
  </div>
</nav>
<?php endif; ?>

<div class="container pb-5">