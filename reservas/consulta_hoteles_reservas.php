<?php

require_once __DIR__ . "/../conexion.php";


$sql = "
    SELECT 
        H.nombre,
        H.ubicacion,
        COUNT(R.id_reserva) AS total_reservas
    FROM HOTEL H
    INNER JOIN RESERVA R 
        ON H.id_hotel = R.id_hotel
    GROUP BY 
        H.id_hotel,
        H.nombre,
        H.ubicacion
    HAVING COUNT(R.id_reserva) > 2
    ORDER BY total_reservas DESC
";


$resultado = $conexion->query($sql);


?>


<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Reservas por hotel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body>


<div class="container mt-4">


    <div class="card shadow-sm">


        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                🏨 Hoteles con más de dos reservas
            </h4>

        </div>



        <div class="card-body">


            <?php if ($resultado->num_rows > 0): ?>


                <div class="table-responsive">


                    <table class="table table-striped table-hover align-middle">


                        <thead class="table-dark">

                            <tr>

                                <th>Hotel</th>

                                <th>Ubicación</th>

                                <th class="text-center">
                                    Total reservas
                                </th>

                            </tr>

                        </thead>



                        <tbody>


                        <?php while ($fila = $resultado->fetch_assoc()): ?>


                            <tr>

                                <td>
                                    <?= htmlspecialchars($fila['nombre']) ?>
                                </td>


                                <td>
                                    <?= htmlspecialchars($fila['ubicacion']) ?>
                                </td>


                                <td class="text-center">

                                    <span class="badge bg-success">
                                        <?= $fila['total_reservas'] ?>
                                    </span>

                                </td>


                            </tr>


                        <?php endwhile; ?>


                        </tbody>


                    </table>


                </div>



            <?php else: ?>


                <div class="alert alert-warning">

                    No existen hoteles con más de dos reservas.

                </div>


            <?php endif; ?>


        </div>


    </div>


</div>



</body>

</html>


<?php

$conexion->close();

?>