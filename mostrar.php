<?php
// Establecer conexión con la base de datos
$conexion = mysqli_connect("localhost", "root", "16Junio$", "basededatos");

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Ejecutar consulta SQL para seleccionar los datos de la tabla
$sql = "SELECT * FROM directorio";

$resultado = mysqli_query($conexion, $sql);

// Imprimir los resultados en una tabla HTML
if (mysqli_num_rows($resultado) > 0) {
    echo "<table>";
    echo "<tr><th>Nombre</th><th>Teléfono</th><th>Email</th><th>Instagram</th></tr>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr><td>" . $fila["nombre"] . "</td><td>" . $fila["telefono"] . "</td><td>" . $fila["email"] . "</td><td>" . $fila["instagram"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar conexión con la base de datos
mysqli_close($conexion);
?>