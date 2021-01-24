<?php

include "./conexion.php";

$nom = $_POST['nom'];
$autor = $_POST['autor'];
$genero = $_POST['genero'];

    $nombre = $_FILES['imagen']['name'];
    $temp = explode(".",$nombre);
    $extension = end($temp);
    $nombreFinal = time().".".$extension;

    if($extension == 'jpg' || $extension == 'png' || $extension == 'PNG'){
        if(move_uploaded_file($_FILES['imagen']['tmp_name'], "../img/historietas/".$nombreFinal)){
            $conexion->query("
            insert into historias (nombre, autor, genero, portada) 
            values ('$nom', '$autor', '$genero', '$nombreFinal')
            ") or die ($conexion ->error);
            header("Location: ../historietas.php");
        }else{
            header("Location: ../historietas.php?error=Ocurrió un error al subir la imagen");
        }
    }else{
        header("Location: ../historietas.php?error=Tipo de archivo no válido");
    }
    die();

    
?>