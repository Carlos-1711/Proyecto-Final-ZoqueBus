<?php
include 'conexion.php';

if (isset($_POST['register'])){
    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];
    $contraseña=$_POST['password'];
    $contraseña=($contraseña);
    $telefono=$_POST['telefono'];

    $checkEmail="SELECT * FROM usuarios WHERE correo='$correo'";
    $result=$conn->query($checkEmail);
    if($result->num_rows>0){
        echo "El correo ya existe!!";
    }
    else{
        $insertQuery="INSERT INTO usuarios(nombre,correo,contraseña,telefono)
        VALUES ('$nombre','$correo','$contraseña','$telefono')";
        if($conn->query($insertQuery)==TRUE){
            header("location: index.php");
        }
        else{
            echo "Error:".$conn->error; 
        }
    }
}
if(isset($_POS['sing-in'])){
    $correo=$_POST['correo'];
    $contraseña=$_POST['contraseña'];
    $contraseña=($contraseña);

    $sql= "SELECT * FROM usuarios WHERE correo='$correo' AND contraseña='$contraseña'" ;
    $result=$conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $row=$result->FETCH_ASSOC();
        $_SESSION['correo']=$row['correo'];
        header("Location: /view/index.php");
        exit();
    }
    else{
        echo "Correo y Contraseña incorrectos";
    }
}
?>