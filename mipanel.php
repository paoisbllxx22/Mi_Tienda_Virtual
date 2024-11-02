<?php
session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION["nombre"])) {
    // El usuario ya ha iniciado sesión
    $nombre_usuario = $_SESSION["nombre"];
} elseif (isset($_POST['nombre']) && $_POST['nombre'] != "" && isset($_POST['clave']) && $_POST['clave'] != "") {
    // Procesar el inicio de sesión
    $_SESSION["nombre"] = $_POST["nombre"];
    $nombre_usuario = $_POST["nombre"];
    
    // Verificar si "Recordarme" está marcado
    if (isset($_POST['recordarme'])) {
        // Establecer cookies con nombre y clave, que durarán 30 días
        setcookie("nombre", $_POST["nombre"], time() + (30 * 24 * 60 * 60), "/");
        setcookie("clave", $_POST["clave"], time() + (30 * 24 * 60 * 60), "/");
    } else {
        // Si "Recordarme" no está marcado, eliminar las cookies
        setcookie("nombre", "", time() - 3600, "/");
        setcookie("clave", "", time() - 3600, "/");
    }
} else {
    // El usuario no ha iniciado sesión y no ha enviado datos de inicio de sesión
    // Redirigir al formulario de inicio de sesión
    $_SESSION['error'] = 'Debe iniciar sesión.';
    header('Location: index.php');
    exit();
}

// Manejo del idioma
if (isset($_GET['idioma'])) {
    $idioma = $_GET['idioma'];
    // Guardar el idioma en una cookie
    setcookie('idioma', $idioma, time() + (30 * 24 * 60 * 60), "/");
} elseif (isset($_COOKIE['idioma'])) {
    $idioma = $_COOKIE['idioma'];
} else {
    $idioma = 'es'; // Idioma predeterminado
}

// Continuar con el resto del código
require_once('./Fichero.php');
$ficheroInstancia = new Fichero($idioma);
$contenido = $ficheroInstancia->getContenido();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $idioma == 'en' ? 'Product List' : 'Lista de Productos'; ?></title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $idioma == 'en' ? 'Product List' : 'Lista de Productos'; ?></h1>
        <h3><?php echo $idioma == 'en' ? 'Logged User:' : 'Usuario Logeado:'; ?> <?php echo $nombre_usuario; ?></h3>
        <hr>
        <p><?php echo $idioma == 'en' ? 'Select language:' : 'Seleccione el idioma:'; ?>
            <a href="mipanel.php?idioma=es">Español</a> | 
            <a href="mipanel.php?idioma=en">English</a>
        </p>
        <p><a href="cerrarsesion.php"><?php echo $idioma == 'en' ? 'Log out' : 'Cerrar sesión'; ?></a></p>
        <ul>
            <?php
            foreach ($contenido as $item) {
                echo "<li><a href='infoproducto.php?producto=" . urlencode($item) . "'>" . htmlspecialchars($item) . "</a></li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
