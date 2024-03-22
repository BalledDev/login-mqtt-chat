<?php
//include './connect.php'; // Asegúrate de que connect.php contiene la conexión a la base de datos
$conexion = mysqli_connect("192.168.20.57", "ayose", "alumno", "login");
$usuario = $_POST['usuario'];
$contrasena = $_POST['contraseña'];

// Prevenir inyección SQL
$usuario = mysqli_real_escape_string($conexion, $usuario);
$contrasena = mysqli_real_escape_string($conexion, $contrasena);

// Consulta SQL
$consulta = "SELECT usuario, contasena FROM usuario WHERE usuario = '$usuario' AND contasena = '$contrasena'";
$resultado = mysqli_query($conexion, $consulta);

// Verificar si la consulta se ejecutó correctamente
if (!$resultado) {
    die("Error al ejecutar la consulta: " . mysqli_error($conexion));
}

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
    // Si se encontraron resultados, redirigir a la página de chat
    header("Location: ../chat/mqtt-chat");
} else {
    // Si no se encontraron resultados, redirigir a la página de registro
    header("Location: ../registro.html");
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>