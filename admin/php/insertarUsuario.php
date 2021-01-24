<?php

include "./conexion.php";

$nom = $_POST['nom'];
$ap = $_POST['ap'];
$email = $_POST['email'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];

    $nombre = $_FILES['imagen']['name'];
    $temp = explode(".",$nombre);
    $extension = end($temp);
    $nombreFinal = time().".".$extension;
    
if($p1 != $p2){
    echo "El password es diferente";
    header("Location: ../usuarios.php?error=Los campos no coinciden");
}else{
    if($extension == 'jpg' || $extension == 'png' || $extension == 'PNG'){
        if(move_uploaded_file($_FILES['imagen']['tmp_name'], "../img/users/".$nombreFinal)){
            $p1=sha1($p1);
            $conexion->query("insert into usuarios (nombre, apellidos, email, password, img_perfil) values 
            ('$nom', '$ap', '$email', '$p1', '$nombreFinal')") or die ($conexion ->error);
            header("Location: ../usuarios.php?success=Se agregó correctamente");
        }else{
            header("Location: ../usuarios.php?error=Ocurrió un error al subir la imagen");
        }
    }else{
        header("Location: ../usuarios.php?error=Tipo de archivo no válido");
    }
    die();
    

}
?>