<?php
include "./conexion.php";

$id = $_POST['id'];
$conexion -> query("delete from usuarios where id = $id") or die ($conexion ->error);
header("Location: ./../usuarios.php");
?>