<?php
session_start();
include '../database/conexion.php'; 

// Verifica si los datos fueron enviados correctamente
if (isset($_POST['nombre']) && isset($_POST['password'])) {
    $usuario = $conn->real_escape_string($_POST['nombre']);
    $password = $_POST['password']; // No es necesario escapar la contraseña aquí

    // Consulta para buscar el usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE nombre = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtiene el resultado
        $row = $result->fetch_assoc();
        
        // Verifica la contraseña hasheada
        if (password_verify($password, $row['password'])) {
            // Login exitoso, guarda los datos en la sesión
            $_SESSION['usuario_id'] = $row['id'];  // Guarda el usuario_id en la sesión
            $_SESSION['nombre'] = $row['nombre'];  // También puedes guardar el nombre si lo necesitas
            header("Location: index.php"); // Redirige a index.php
            exit();
        } else {
            // Contraseña incorrecta
            echo "Contraseña incorrecta.";
        }
    } else {
        // Usuario no encontrado
        echo "Usuario no encontrado.";
    }
} else {
    echo "Por favor, completa todos los campos del formulario.";
}

// Cierra la conexión
$conn->close();
?>

