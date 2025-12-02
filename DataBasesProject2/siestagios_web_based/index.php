<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>SI Estágios - Login</title></head>
<body>
    <center>
        <h2>Bem-vindo ao SI Estágios</h2>
        <form method="POST" action="">
            Login: <input type="text" name="login" required><br><br>
            Password: <input type="password" name="pass" required><br><br>
            <input type="submit" value="Entrar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $login = mysqli_real_escape_string($conn, $_POST['login']);
            $pass = mysqli_real_escape_string($conn, $_POST['pass']);

            // Consulta para verificar utilizador
            $sql = "SELECT utilizador_id, nome, tipo FROM utilizador WHERE login='$login' AND password='$pass'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['user_id'] = $row['utilizador_id'];
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['tipo'] = $row['tipo'];

                // Redirecionamento baseado no tipo de utilizador
                if($row['tipo'] == 'administrativo') header("Location: admin/dashboard.php");
                elseif($row['tipo'] == 'aluno') header("Location: aluno/dashboard.php");
                elseif($row['tipo'] == 'formador') header("Location: formador/dashboard.php");
            } else {
                echo "<p style='color:red'>Login ou Password incorretos.</p>";
            }
        }
        ?>
    </center>
</body>
</html>