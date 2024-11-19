<?php 
include('configuracion.php');

// Revocar el token de Google para cerrar sesión de Google
$cliente->revokeToken();

// Limpiar las variables de sesión y destruir la sesión
session_unset();
session_destroy();


// Eliminar la variable de la imagen de perfil
unset($_SESSION['imagen']);

// Redirigir al usuario al login
header('location:login.php');
exit();
?>

