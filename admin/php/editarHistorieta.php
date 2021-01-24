<?php
    include "./conexion.php";

    $nom = $_POST['nom'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $id = $_POST['id'];

    $nombre = $_FILES['imagen']['name'];
    $temp = explode(".",$nombre);
    $extension = end($temp);
    $nombreFinal = time().".".$extension;

    if($nombre==""){
        $conexion -> query("update historias set
        nombre='$nom',
        autor='$autor',
        genero='$genero' where id='$id'") or die ($conexion ->error);
        header("Location: ../historietas.php?success=Actualizado correctamente");
    }else{
        if($extension == 'jpg' || $extension == 'png' || $extension == 'PNG'){
            if(move_uploaded_file($_FILES['imagen']['tmp_name'], "../img/historietas/".$nombreFinal)){
                $conexion -> query("update historias set
                nombre='$nom',
                autor='$autor',
                genero='$genero',
                portada='$nombreFinal' where id='$id'") or die ($conexion ->error);
                header("Location: ../historietas.php?success=Actualizado correctamente");
            }else{
                header("Location: ../historietas.php?error=Ocurrió un error al subir la imagen");
            }
        }else{
            header("Location: ../historietas.php?error=Tipo de archivo no válido");
        }
}
    die();

?>