<?php
session_start();

// Destruir la sesión
session_unset();
session_destroy();

// Verificar si existen las cookies de "nombre" y "clave"
if (!isset($_COOKIE['nombre']) && !isset($_COOKIE['clave'])) {
    // No hay cookies, asegurarse de que ninguna cookie quede establecida
    setcookie("nombre", "", time() - 3600, "/");
    setcookie("clave", "", time() - 3600, "/");
    setcookie("idioma", "", time() - 3600, "/");
}

// Redirigir al login
header('Location: index.php');
exit();
?>