<?php
require('../database/conexion.php');

// Verifica si se reciben los datos necesarios
if (isset($_POST['id']) && isset($_POST['stock'])) {
    $id = intval($_POST['id']);
    $stock = intval($_POST['stock']);

    // Asegúrate de que la cantidad no sea negativa
    if ($stock < 0) {
        echo json_encode(['success' => false, 'message' => 'Cantidad no válida']);
        exit;
    }

    // Actualiza la cantidad en la base de datos
    $sql = "UPDATE tenis SET stock = $stock WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
}
?>

