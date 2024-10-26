<?php
session_start();
if(!isset($_SESSION["nombre"])){
    header('Location: index.php');
}
?> 
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>

    <h1>Categoría: Zapatos</h1>
    <h3>Usuario Logeado: <?php echo $_SESSION["nombre"] ?></h3>
    <hr>
    <p><a href="mipanel.php"> Ir a Panel Principal </a></p>
    <p><a href="cerrarsesion.php"> Cerrar sesión</a></p>
    <br>
 
    </body>
</html>
