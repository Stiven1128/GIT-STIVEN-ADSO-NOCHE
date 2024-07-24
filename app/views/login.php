<?php
include('../includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password)) {
        if (is_admin()) {
            header('Location: index.html');
        } elseif (is_employee()) {
            header('Location: index.html');
        }
        exit();
    } else {
        $error = "Usuario o Contraseña invalida.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../../public/css/login.css">
    <style type="text/css"></style>
</head>
<body>

    <form action="login.php" method="post">
    <div id="contenedor">
                
                <div id="contenedorcentrado">
                    <div id="login">
                        
                            <label for="usuario">Usuario</label>
                            <input id="usuario" type="text" name="username" placeholder="Usuario" required>
                            
                            <label for="password">Contraseña</label>
                            <input id="password" type="password" placeholder="contraseña" name="password" required>
                            
                            <?php if (isset($error)): ?>
                            <p style="color: red;"><?php echo $error; ?></p>
                            <?php endif; ?>

                            <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                        
                        
                    </div>
                    <div id="derecho">
                        <div class="titulo">
                            Bienvenido
                        </div>
                        <hr>
                        <div class="pie-form">
                            <a href="#">¿Perdiste tu contraseña?</a>
                            <a href="#">¿No tienes Cuenta? Registrate</a>
                            <hr>
                            <a href="#">« Volver</a>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</body>
</html>
