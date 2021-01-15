<?php
$servidor="localhost";
$nombreBD="tienda";
$usuario="root";
$pass="";
$conexion = new mysqli($servidor, $usuario, $pass, $nombreBD);
if($conexion -> connect_error){
    die("No se pudo conectar a la base de datos");
}
?>