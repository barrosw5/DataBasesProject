<?php 
include 'db.php'; 
$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $pass = $_POST['pass'];

    if(empty($login) || empty($pass)) {
        $erro = "Preenche todos os campos.";
    } else {
        $sql = "SELECT utilizador_id, nome, tipo FROM utilizador WHERE login='$login' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['utilizador_id'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['tipo'] = $row['tipo'];

            if($row['tipo'] == 'administrativo') header("Location: admin/dashboard.php");
            elseif($row['tipo'] == 'aluno') header("Location: aluno/dashboard.php");
            elseif($row['tipo'] == 'formador') header("Location: formador/dashboard.php");
            exit();
        } else {
            $erro = "Dados incorretos!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Login // SI Estágios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;800&display=swap" rel="stylesheet">
    <style>
        :root { --blue-dark: #0a192f; --blue-main: #007bff; --blue-light: #4cc9f0; --white: #ffffff; }
        body { background-color: var(--blue-dark); font-family: 'Kanit', sans-serif; height: 100vh; display: flex; align-items: center; justify-content: center; overflow: hidden; }
        .shape { position: absolute; z-index: 0; opacity: 0.8; border: 3px solid var(--blue-dark); }
        .shape-1 { top: -10%; left: -10%; width: 60vw; height: 60vw; background: var(--blue-main); clip-path: polygon(0 0, 100% 0, 0 100%); }
        .shape-2 { bottom: -20%; right: -10%; width: 50vw; height: 50vw; background: var(--blue-light); clip-path: circle(50% at 50% 50%); }
        .login-card { background: var(--white); padding: 50px 40px; width: 100%; max-width: 450px; border: 4px solid var(--blue-dark); box-shadow: 15px 15px 0 var(--blue-light); z-index: 10; }
        .btn-login { background: var(--blue-dark); color: var(--white); width: 100%; padding: 15px; font-weight: 800; text-transform: uppercase; border: 3px solid var(--blue-dark); margin-top: 20px; transition: 0.2s; }
        .btn-login:hover { background: var(--blue-main); box-shadow: 6px 6px 0 var(--blue-light); transform: translate(-3px, -3px); }
        .alert-error { margin-top: 20px; padding: 10px; background: #ffe0e3; color: #ff4757; border: 3px solid #ff4757; font-weight: bold; text-align: center; }
    </style>
</head>
<body>
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    <div class="login-card">
        <h1 style="font-weight: 800; font-size: 3.5rem; color: var(--blue-dark); line-height: 0.9;">SI<br>Estágios</h1>
        <p style="font-weight: 600; color: var(--blue-main); letter-spacing: 2px; border-bottom: 3px solid var(--blue-dark); padding-bottom: 10px;">// ACESSO AO SISTEMA</p>
        <form method="POST">
            <div class="mb-3">
                <label class="fw-bold">UTILIZADOR</label>
                <input type="text" name="login" class="form-control" style="border: 3px solid var(--blue-dark); padding: 15px; background: #f0f8ff;" required>
            </div>
            <div class="mb-3">
                <label class="fw-bold">PASSWORD</label>
                <input type="password" name="pass" class="form-control" style="border: 3px solid var(--blue-dark); padding: 15px; background: #f0f8ff;" required>
            </div>
            <button type="submit" class="btn-login">Entrar ▶</button>
        </form>
        <?php if(!empty($erro)): ?><div class="alert-error">❌ <?php echo $erro; ?></div><?php endif; ?>
    </div>
</body>
</html>