<?php

require_once __DIR__ . "/../conexion.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {


    $origen = trim($_POST["origen"]);
    $destino = trim($_POST["destino"]);
    $fecha = $_POST["fecha"];
    $plazas = (int)$_POST["plazas_disponibles"];
    $precio = (float)$_POST["precio"];



    if ($origen === "" || $destino === "" || $plazas <= 0 || $precio <= 0) {

        die("Datos inválidos.");

    }



    $stmt = $conexion->prepare(
        "INSERT INTO VUELO 
        (origen, destino, fecha, plazas_disponibles, precio)
        VALUES (?, ?, ?, ?, ?)"
    );



    $stmt->bind_param(
        "sssid",
        $origen,
        $destino,
        $fecha,
        $plazas,
        $precio
    );



    if ($stmt->execute()) {

        echo "✅ Vuelo registrado correctamente.<br>";

    } else {

        echo "❌ Error al registrar vuelo: " . $stmt->error;

    }



    $stmt->close();



    // Mostrar vuelos registrados

    $resultado = $conexion->query("SELECT * FROM VUELO");


    echo "<h3>Vuelos registrados</h3>";


    while ($fila = $resultado->fetch_assoc()) {

        echo "
        {$fila['id_vuelo']} - 
        {$fila['origen']} → {$fila['destino']} 
        ({$fila['fecha']}) | 
        Plazas: {$fila['plazas_disponibles']} | 
        Precio: {$fila['precio']}
        <br>";

    }



    $conexion->close();

}

?>