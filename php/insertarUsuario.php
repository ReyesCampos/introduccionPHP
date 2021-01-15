<?php

include "./conexion.php";

$nom = $_POST['nom'];
$ap = $_POST['ap'];
$email = $_POST['email'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
if($p1 != $p2){
    echo "El password es diferente";
    header("Location: ../usuarios.php?error=Los campos no coinciden");
}else{
    $p1=sha1($p1);
    $conexion->query("insert into usuarios (nombre, apellidos, email, password, img_perfil) values 
    ('$nom', '$ap', '$email', '$p1', 'default.jpg')") or die ($conexion -> error);
    header("Location: ../usuarios.php");
}
?>