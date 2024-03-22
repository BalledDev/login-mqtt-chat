<?php

//Registra  la escritura

    include './connect.php';

    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    //echo $usuario;
    //echo $contraseña;
    $query = "INSERT INTO usuario(usuario, contasena)
              VALUES('$usuario', '$contraseña')";

    $ejecutar = mysqli_query($conexion, $query);


?>

