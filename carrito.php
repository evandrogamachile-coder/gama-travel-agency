<?php
session_start();

// Si el carrito no existe, se crea
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Verificar si se envió un paquete
if (isset($_POST['paquete']) && isset($_POST['precio'])) {

    $paquete = $_POST['paquete'];
    $precio = $_POST['precio'];

    // Agregar al carrito
    $_SESSION['carrito'][] = [
        'paquete' => $paquete,
        'precio' => $precio
    ];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Carrito de Compra</title>
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
</head>
<body class="container py-5">

  <h2 class="mb-4">Carrito de Compra</h2>

  <?php if (empty($_SESSION['carrito'])): ?>
      <div class="alert alert-warning">Tu carrito está vacío.</div>
  <?php else: ?>
      <ul class="list-group mb-4">
        <?php foreach ($_SESSION['carrito'] as $item): ?>
          <li class="list-group-item d-flex justify-content-between">
            <span><?php echo $item['paquete']; ?></span>
            <strong>$<?php echo $item['precio']; ?> USD</strong>
          </li>
        <?php endforeach; ?>
      </ul>
      <a href="vaciar_carrito.php" class="btn btn-danger me-2">Vaciar carrito</a>

      
  <?php endif; ?>
<a href="index.php" class="btn btn-secondary">Seguir buscando</a>
</body>
</html>
