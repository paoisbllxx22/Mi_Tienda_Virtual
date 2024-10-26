<?php
session_start();
//require lo monta en memoria pero si en una segunda pagina lo pone se vuelve a cargar
require_once('./Fichero.php');
$ficheroInstancia = new Fichero();
$contenido = $ficheroInstancia->getContenido();
var_dump($contenido);


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

    <h1>Bienvenido</h1>
    <h3>Usuario Logeado: <?php echo $_SESSION["nombre"] ?></h3>
    <hr>
    <p><a href="otrapagina.php"> Calzado </a></p>
    <p><a href="cerrarsesion.php"> Cerrar sesión</a></p>
    <br>
    <ul>

    <?php
    foreach ($contenido as $item) {
        echo "<li>" . $item . "</li>";
    }
    ?>
    </ul> 
    <br>
    </body>
</html>