<?php
include("FiltroViaje.php");

// Recuperación de datos con POST
$hotel = $_POST['hotel'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$fecha = $_POST['fecha_viaje'];
$duracion = $_POST['duracion'];

// Crear objeto usando la clase
$filtro = new FiltroViaje($hotel, $ciudad, $pais, $fecha, $duracion);

// Mostrar información
echo "<h2>Resumen de tu intención de viaje</h2>";
echo "<p>" . $filtro->mostrarInfo() . "</p>";

// Validación de fecha
if ($filtro->validarFecha()) {
    echo "<p style='color:green;'>La fecha de viaje es válida.</p>";
} else {
    echo "<p style='color:red;'>La fecha ingresada ya pasó. Por favor selecciona otra.</p>";
}
?>
