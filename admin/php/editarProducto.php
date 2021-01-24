<?php
    include "./conexion.php";

    $nom = $_POST['nom'];
    $precio = $_POST['precio'];
    $inventario = $_POST['inventario'];
    $id = $_POST['id'];

    $nombre = $_FILES['imagen']['name'];
    $temp = explode(".",$nombre);
    $extension = end($temp);
    $nombreFinal = time().".".$extension;

    if($nombre==""){
        $conexion -> query("update productos set
        nombre='$nom',
        precio='$precio',
        inventario='$inventario' where id='$id'") or die ($conexion ->error);
        header("Location: ../productos.php?success=Actualizado correctamente");
    }else{
        if($extension == 'jpg' || $extension == 'png' || $extension == 'PNG'){
            if(move_uploaded_file($_FILES['imagen']['tmp_name'], "../img/productos/".$nombreFinal)){
                $conexion -> query("update productos set
                nombre='$nom',
                precio='$precio',
                inventario='$inventario',
                imagen='$nombreFinal' where id='$id'") or die ($conexion ->error);
                header("Location: ../productos.php?success=Actualizado correctamente");
            }else{
                header("Location: ../productos.php?error=Ocurrió un error al subir la imagen");
            }
        }else{
            header("Location: ../productos.php?error=Tipo de archivo no válido");
        }
}
    die();

?>