<?php
session_start();
include 'Fichero.php';
// Verificación de la sesión
if (!isset($_SESSION['nombre'])) { // Cambia 'usuario' por la clave de tu sesión si es diferente
    header("Location: index.php"); // Redirige a la página de inicio de sesión
    exit();
}

$idioma = 'es'; // Cambia según el idioma deseado
$fichero = new Fichero($idioma);

$producto = isset($_GET['producto']) ? $_GET['producto'] : null;
$detalle = $producto ? $fichero->getDetalle($producto) : 'Producto no especificado.';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Información del Producto</title>
</head>
<body>
    <h1>Detalles del Producto</h1>
    <?php if ($producto): ?>
        <h2><?php echo htmlspecialchars($producto); ?></h2>
        <p><?php echo htmlspecialchars($detalle); ?></p>
    <?php else: ?>
        <p>Producto no encontrado.</p>
    <?php endif; ?>

    <a href="mipanel.php">Volver a la lista de productos</a>
</body>
</html>
