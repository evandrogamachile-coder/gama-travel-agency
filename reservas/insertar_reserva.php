<?php


require_once __DIR__ . "/../conexion.php";

echo "Base de datos: ";

$fila = $conexion->query("SELECT DATABASE() AS bd")->fetch_assoc();

echo $fila['bd'] . "<br>";



echo "Vuelos: ";

$fila = $conexion->query("SELECT COUNT(*) AS total FROM VUELO")->fetch_assoc();

echo $fila['total'] . "<br>";



echo "Hoteles: ";

$fila = $conexion->query("SELECT COUNT(*) AS total FROM HOTEL")->fetch_assoc();

echo $fila['total'] . "<br><hr>";



// Obtener cantidad real de vuelos y hoteles

$totalVuelos = $conexion->query("SELECT COUNT(*) AS total FROM VUELO")
                        ->fetch_assoc()['total'];

$totalHoteles = $conexion->query("SELECT COUNT(*) AS total FROM HOTEL")
                         ->fetch_assoc()['total'];



// Validar que existan vuelos y hoteles

if ($totalVuelos == 0 || $totalHoteles == 0) {
    die("No existen vuelos u hoteles registrados.");
}



// Registrar 10 reservas automáticamente

for ($i = 1; $i <= 10; $i++) {


    $id_cliente = $i;

    $fecha_reserva = date("Y-m-d");


    // Generar IDs dinámicos

    $id_vuelo = rand(1, $totalVuelos);

    $id_hotel = rand(1, $totalHoteles);



    echo "Insertando → Cliente: $id_cliente | Vuelo: $id_vuelo | Hotel: $id_hotel<br>";



    $stmt = $conexion->prepare(
        "INSERT INTO RESERVA 
        (id_cliente, fecha_reserva, id_vuelo, id_hotel)
        VALUES (?, ?, ?, ?)"
    );



    $stmt->bind_param(
        "isii",
        $id_cliente,
        $fecha_reserva,
        $id_vuelo,
        $id_hotel
    );



    if ($stmt->execute()) {

        echo "Reserva insertada correctamente<br>";

    } else {

        die("Error al insertar: " . $stmt->error);

    }



    $stmt->close();

}




echo "<h3>✔ Se registraron 10 reservas correctamente</h3>";




// Consulta simple para mostrar la tabla RESERVA

$resultado = $conexion->query("

    SELECT R.id_reserva, R.id_cliente, R.fecha_reserva,

           V.origen, V.destino,

           H.nombre AS hotel

    FROM RESERVA R

    INNER JOIN VUELO V ON R.id_vuelo = V.id_vuelo

    INNER JOIN HOTEL H ON R.id_hotel = H.id_hotel

    ORDER BY R.id_reserva DESC

");




echo "<h2>Reservas registradas</h2>";

echo "<table border='1' cellpadding='5'>

        <tr>

            <th>ID Reserva</th>

            <th>Cliente</th>

            <th>Fecha</th>

            <th>Vuelo</th>

            <th>Hotel</th>

        </tr>";




while ($fila = $resultado->fetch_assoc()) {

    echo "<tr>

            <td>{$fila['id_reserva']}</td>

            <td>{$fila['id_cliente']}</td>

            <td>{$fila['fecha_reserva']}</td>

            <td>{$fila['origen']} → {$fila['destino']}</td>

            <td>{$fila['hotel']}</td>

          </tr>";

}




echo "</table>";



$conexion->close();

?>