<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"]);
    $ubicacion = trim($_POST["ubicacion"]);
    $habitaciones = (int)$_POST["habitaciones_disponibles"];
    $tarifa = (float)$_POST["tarifa_noche"];

    if ($nombre === "" || $ubicacion === "" || $habitaciones <= 0 || $tarifa <= 0) {
        die("Datos inválidos.");
    }

    $stmt = $conexion->prepare(
        "INSERT INTO HOTEL (nombre, ubicacion, habitaciones_disponibles, tarifa_noche)
         VALUES (?, ?, ?, ?)"
    );
    $stmt->bind_param("ssii", $nombre, $ubicacion, $habitaciones, $tarifa);

    if ($stmt->execute()) {
        echo "Hotel registrado correctamente.<br>";
    } else {
        echo "Error al registrar hotel: " . $stmt->error;
    }

    $stmt->close();

    $resultado = $conexion->query("SELECT * FROM HOTEL");
    echo "<h3>Hoteles registrados</h3>";
    while ($fila = $resultado->fetch_assoc()) {
        echo "{$fila['id_hotel']} - {$fila['nombre']} ({$fila['ubicacion']}) | Hab: {$fila['habitaciones_disponibles']} | Tarifa: {$fila['tarifa_noche']}<br>";
    }

    $conexion->close();
}
?>
