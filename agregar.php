<?php
// Establecer conexión con la base de datos
$conexion = mysqli_connect("localhost", "root", "16Junio$", "basededatos");

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$instagram = $_POST['instagram'];

// Escapar caracteres especiales para prevenir inyección de SQL
$nombre = mysqli_real_escape_string($conexion, $nombre);
$telefono = mysqli_real_escape_string($conexion, $telefono);
$email = mysqli_real_escape_string($conexion, $email);
$instagram = mysqli_real_escape_string($conexion, $instagram);

// Ejecutar consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO directorio (nombre, telefono, email, instagram) VALUES ('$nombre', '$telefono', '$email', '$instagram')";

if (mysqli_query($conexion, $sql)) {
    echo "Los datos han sido agregados exitosamente.";
} else {
    echo "Error al agregar los datos: " . mysqli_error($conexion);
}

// Cerrar conexión con la base de datos
mysqli_close($conexion);
?>