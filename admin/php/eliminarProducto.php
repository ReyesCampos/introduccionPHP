<?php
include "./conexion.php";

$id = $_POST['id'];
$conexion -> query("delete from productos where id = $id") or die ($conexion ->error);
header("Location: ./../productos.php");
?>