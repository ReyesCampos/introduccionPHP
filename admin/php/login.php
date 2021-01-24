<?php
session_start();
    include "./conexion.php";
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $res = $conexion -> query(
        "select * from usuarios where email='$email'
        and password='".sha1($pass)."'"
    ) or die ($conexion->error);

    if(mysqli_num_rows($res)>0){
        $fila=mysqli_fetch_row($res);
        $id = $fila[0];
        $nombre = $fila[1];
        $ap = $fila[2];
        $imagen = $fila[5];
        $array=array(
            'Id'=>$id,
            'Nombre'=>$nombre,
            'Ap'=>$ap,
            'Email'=>$email,
            'Imagen'=>$imagen
        );
        $_SESSION['userData']=$array;
        header("Location: ../index.php");
    }else{
        echo "LOGIN INCORRECTO";
    }
?>