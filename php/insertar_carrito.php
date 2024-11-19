<?php
session_start(); // Inicia la sesión

// Verifica que el usuario esté autenticado
if (!isset($_SESSION['usuario_id'])) {
    // Si el usuario no está autenticado, redirígelo al login
    header('Location: login.php');
    exit;
}

require_once('../database/conexion.php'); // Conexión a la base de datos

// Obtén los valores del formulario (tenis_id y cantidad)
$tenis_id = $_POST['tenis_id'];  // Asegúrate de enviar el tenis_id en el formulario
$cantidad = $_POST['cantidad'];  // La cantidad que se agrega, por defecto es 1

// Obtén el usuario_id de la sesión
$usuario_id = $_SESSION['usuario_id'];  // El usuario_id lo obtienes desde la sesión

// Consulta para verificar si el tenis ya está en el carrito
$sql = "SELECT * FROM carrito WHERE usuario_id = $usuario_id AND tenis_id = $tenis_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Si ya existe el tenis en el carrito, actualiza la cantidad
    $sql_update = "UPDATE carrito SET cantidad = cantidad + $cantidad WHERE usuario_id = $usuario_id AND tenis_id = $tenis_id";
    mysqli_query($conn, $sql_update);
} else {
    // Si no existe, inserta el nuevo tenis en el carrito
    $sql_insert = "INSERT INTO carrito (usuario_id, tenis_id, cantidad) VALUES ($usuario_id, $tenis_id, $cantidad)";
    mysqli_query($conn, $sql_insert);
}

// Redirige al usuario al carrito
header('Location: filtros_busqueda.php');
exit;
?>

