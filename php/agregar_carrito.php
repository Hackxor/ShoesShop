<?php
// Incluye la conexión a la base de datos
include '../database/conexion.php';
  
if (isset($_POST['modelo']) && isset($_POST['precio']) && isset($_POST['stock'])) {
  //evitar inyecciones SQL
    $modelo = $conn->real_escape_string($_POST['modelo']);
    $precio = $conn->real_escape_string($_POST['precio']); // Hashea la contraseña
    $stock = $conn->real_escape_string($_POST['stock']);
    
   //consulta SQL para insertar los datos
    $sql = "INSERT INTO tenis (modelo, precio, stock) VALUES ('$modelo', '$precio', '$stock')";

    // Ejecuta la consulta y verifica si fue exitosa
    if ($conn->query($sql) === TRUE) {
        header('Location: filtros_busqueda.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
  echo "Por favor, completa todos los campos del formulario.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
