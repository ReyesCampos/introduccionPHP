<?php
include "./conexion.php";

$id = $_POST['id'];
$conexion -> query("delete from historias where id = $id") or die ($conexion ->error);
header("Location: ./../historietas.php");
?>