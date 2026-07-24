<?php
session_start();

// Vaciar el carrito
$_SESSION['carrito'] = [];

// Redirigir de vuelta al carrito
header("Location: carrito.php");
exit;
