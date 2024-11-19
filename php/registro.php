<?php
// Incluye la conexión a la base de datos
include '../database/conexion.php';

if (isset($_POST['nombre']) && isset($_POST['password']) && isset($_POST['correo'])) {
    //evitar inyecciones SQL
    $usuario = $conn->real_escape_string($_POST['nombre']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashea la contraseña
    $correo = $conn->real_escape_string($_POST['correo']);
   //consulta SQL para insertar los datos
    $sql = "INSERT INTO usuarios (nombre, password, correo) VALUES ('$usuario', '$password', '$correo')";

    // Ejecuta la consulta y verifica si fue exitosa
    if ($conn->query($sql) === TRUE) {
        header('Location: login.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Por favor, completa todos los campos del formulario.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>

