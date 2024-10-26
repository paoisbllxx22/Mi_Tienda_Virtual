<?php
session_start();
if($_POST['nombre'] != "" && $_POST['clave'] != "") {
    $_SESSION["nombre"] = $_POST["nombre"];
}else{
    header('Location: index.php');
}
 var_dump($_POST);
?>
<!DOCTYPE html>

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

    <h3>Usuario Logeado: <?php echo $_SESSION["nombre"] ?></h3>
    <hr>
    <p><a href="mipanel.php"> Ir a Panel Principal </a></p>
    <p><a href="cerrarsesion.php"> Cerrar sesión</a></p>
    <br>
 
    </body>
</html>