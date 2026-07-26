<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "root", "gama_travel");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener parámetros del formulario
$origen = $_GET['origen'];
$destino = $_GET['destino'];
$fecha = $_GET['fecha'];

// Consulta SQL
$sql = "SELECT * FROM vuelos 
        WHERE origen LIKE '%$origen%' 
        AND destino LIKE '%$destino%' 
        AND fecha = '$fecha'";

$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de búsqueda</title>
</head>
<body>

<h2>Resultados de vuelos</h2>

<?php
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<div>";
        echo "<p><strong>Origen:</strong> " . $fila['origen'] . "</p>";
        echo "<p><strong>Destino:</strong> " . $fila['destino'] . "</p>";
        echo "<p><strong>Fecha:</strong> " . $fila['fecha'] . "</p>";
        echo "<p><strong>Precio:</strong> $" . $fila['precio'] . "</p>";
        echo "<hr>";
        echo "</div>";
    }
} else {
    echo "<p>No se encontraron vuelos para los criterios ingresados.</p>";
}

$conexion->close();
?>

</body>
</html>
