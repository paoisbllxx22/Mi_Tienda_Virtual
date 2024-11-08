<?php
session_start();
include 'Fichero.php';
// Verificación de la sesión
if (!isset($_SESSION['nombre'])) { // Cambia 'usuario' por la clave de tu sesión si es diferente
    header("Location: index.php"); // Redirige a la página de inicio de sesión
    exit();
}

$idioma = $_GET['idioma']; // Cambia según el idioma deseado
$fichero = new Fichero($idioma);

$producto = isset($_GET['producto']) ? $_GET['producto'] : null;
$detalle = $producto ? $fichero->getDetalle($producto) : 'Producto no especificado.';
$imagen = $producto ? $fichero->getImagen($producto) :'Imagen no especificada.';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title><?php echo $idioma == 'en' ? 'Product Information' : 'Informacion de Producto'; ?></title>
</head>
<body>
    <header>
        <a href="mipanel.php"><?php echo $idioma == 'en' ? 'Back to product listing' : 'Volver a la lista de productos'; ?></a>
    </header>
    <div class="contenedor">
        <div class="imagen">
            <?php if ($imagen != ""): ?>
                <img src=<?php echo htmlspecialchars($imagen); ?> alt="Imagen del producto" style="width: 100%;">
            <?php else: ?>
                <img src="https://e7.pngegg.com/pngimages/70/87/png-clipart-round-red-and-white-x-mark-screenshot-area-trademark-symbol-brand-sign-error-trademark-logo-thumbnail.png" alt="Imagen no encontrada" style="width: 100%;">
            <?php endif; ?>
        </div>
        <div class="texto">
            <h1><?php echo $idioma == 'en' ? 'Product Details' : 'Detalle de Producto'; ?></h1>
            <?php if ($producto): ?>
                <h2><?php echo htmlspecialchars($producto); ?></h2>
                <p><?php echo htmlspecialchars($detalle); ?></p>
            <?php else: ?>
                <p><?php echo $idioma == 'en' ? 'Product not found' : 'Producto no encontrado'; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
