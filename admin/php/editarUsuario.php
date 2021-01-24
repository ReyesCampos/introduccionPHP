<?php
    include "./conexion.php";

    $nom = $_POST['nom'];
    $ap = $_POST['ap'];
    $email = $_POST['email'];
    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];
    $id = $_POST['id'];
    
        $nombre = $_FILES['imagen']['name'];
        $temp = explode(".",$nombre);
        $extension = end($temp);
        $nombreFinal = time().".".$extension;

        if(trim($p1)=="" && trim($p2)==""){
            if($nombre==""){
                $conexion -> query("update usuarios set
                nombre='$nom',
                apellidos='$ap',
                email='$email' where id=$id") or die ($conexion ->error);
                header("Location: ../usuarios.php?success=Actualizado correctamente");
            }else{
                if($extension == 'jpg' || $extension == 'png' || $extension == 'PNG'){
                    if(move_uploaded_file($_FILES['imagen']['tmp_name'], "../img/users/".$nombreFinal)){
                        $conexion -> query("update usuarios set
                        nombre='$nom',
                        apellidos='$ap',
                        email='$email',
                        img_perfil='$nombreFinal' where id=$id") or die ($conexion ->error);
                        header("Location: ../usuarios.php?success=Actualizado correctamente");
                    }else{
                        header("Location: ../usuarios.php?error=Ocurrió un error al subir la imagen");
                    }
                }else{
                    header("Location: ../usuarios.php?error=Tipo de archivo no válido");
                }
        }
            
        }else{
            if($p1==$p2){
                if($nombre==""){
                    $pass=sha1($p1);
                    $conexion -> query("update usuarios set
                    nombre='$nom',
                    apellidos='$ap',
                    email='$email',
                    password='$pass'
                    where id=$id") or die ($conexion ->error);
                    header("Location: ../usuarios.php?success=Actualizado correctamente");
                }else{
                    if($extension == 'jpg' || $extension == 'png' || $extension == 'PNG'){
                        if(move_uploaded_file($_FILES['imagen']['tmp_name'], "../img/users/".$nombreFinal)){
                            $pass=sha1($p1);
                            $conexion -> query("update usuarios set
                            nombre='$nom',
                            apellidos='$ap',
                            email='$email',
                            password='$pass',
                            img_perfil='$nombreFinal' where id=$id") or die ($conexion ->error);
                            header("Location: ../usuarios.php?success=Actualizado correctamente");
                        }else{
                            header("Location: ../productos.php?error=Ocurrió un error al subir la imagen");
                        }
                    }else{
                        header("Location: ../productos.php?error=Tipo de archivo no válido");
                    }
            }
                
                
            }else{
                header("Location: ../usuarios.php?error=Los campos no coinciden");
                
            }
            
        }

?>