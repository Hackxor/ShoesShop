<?php
require_once('../database/conexion.php');

$response = array();  // Array para la respuesta

if (isset($_POST['eliminar_carrito']) && isset($_POST['id'])) {
    $carrito_id = $_POST['id'];  // ID del producto en el carrito

    // Evita la inyección SQL escapando el ID
    $carrito_id = mysqli_real_escape_string($conn, $carrito_id);

    // Elimina el producto del carrito
    $sql = "DELETE FROM carrito WHERE id = '$carrito_id'";

    if (mysqli_query($conn, $sql)) {
        $response['success'] = true;
        $response['message'] = "Producto eliminado del carrito";  // Mensaje de éxito
    } else {
        $response['success'] = false;
        $response['message'] = "Error al eliminar el producto: " . mysqli_error($conn);  // Mensaje de error
    }
} else {
    $response['success'] = false;
    $response['message'] = "Faltan datos para eliminar el producto";
}

// Devuelve la respuesta como JSON
echo json_encode($response);

?>


