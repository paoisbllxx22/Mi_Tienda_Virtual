<?php
session_start();
$error = '';
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BestBuy - Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenido a BestBuy!</h1>
        <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="mipanel.php">
            <fieldset>
                <label for="nombre">Usuario:</label><br>
                <input type="text" id="nombre" name="nombre" value="<?php echo isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : ''; ?>"><br>
                <label for="clave">Clave:</label><br>
                <input type="password" id="clave" name="clave" value="<?php echo isset($_COOKIE['clave']) ? $_COOKIE['clave'] : ''; ?>">
                <br>
                <input type="checkbox" name="recordarme" <?php echo isset($_COOKIE['nombre']) ? 'checked' : ''; ?>> Recordarme
                <br><br>
                <input type="submit" value="Enviar">
            </fieldset>
        </form>
    </div>
</body>
</html>
