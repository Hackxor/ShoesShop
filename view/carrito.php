<?php
  require('../database/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title></title>
      <link rel="stylesheet" href="../css/estilos.css">
      <script src="https://kit.fontawesome.com/cc83a457b4.js" crossorigin="anonymous"></script>

</head>
<body>

<div class="contenedor_carrito">

<div class="info">
      <h4>TU CARRITO</h4> <div class="cerrar"><i class="fa-solid fa-close" id="cerrar_carrito"></i></div>
</div>
<?php
// Inicia la sesión para obtener el usuario actual
session_start();

$usuario_id = $_SESSION['usuario_id']; // Asegúrate de que el usuario esté autenticado

// Consulta para obtener los productos del carrito del usuario
$sql = mysqli_query($conn, "
    SELECT c.id, t.modelo, t.precio, c.cantidad, t.stock 
    FROM carrito c 
    JOIN tenis t ON c.tenis_id = t.id
    WHERE c.usuario_id = '$usuario_id'
");

if(mysqli_num_rows($sql) > 0) {
    while($row = mysqli_fetch_assoc($sql)) {
        ?>
         <div class="caja" data-id="<?php echo $row['id']; ?>" data-precio-unitario="<?php echo $row['precio']; ?>">
    <div class="imagen_con_datos">
        <img src="../img/tenis2.webp" alt="No hay imagen">
        <div class="nombre_talla">
            <span id="nombre"><?php echo $row['modelo']; ?></span>
        </div>
        <i class="fa-solid fa-close" id="eliminar_tenis"></i>
    </div>
    <div class="contador_precio">
        <div class="conta">
            <button class="boton1"><i class="fa-solid fa-minus"></i></button>
            <span id="stock"><?php echo $row['cantidad']; ?></span>
            <button class="boton1"><i class="fa-solid fa-plus"></i></button>
        </div>
        <span id="precio_tenis">
            $<?php echo number_format($row['precio'] * $row['cantidad'], 2); ?>
        </span>
    </div>
</div>
       <?php
    }
} else {
    echo "<p>No hay productos en el carrito.</p>";
}
?>


 <span id="total_general">
         Total : 1000,00
    </span>
</div>

<script>
        document.getElementById("cerrar_carrito").addEventListener("click", function() {
            // Enviar el mensaje al padre (documento principal)
            window.parent.postMessage("ocultar_carrito", window.location.origin);
        });
</script>
<script src="../js/index.js"></script>
<script src="../js/actualizar_cantidad.js"></script>
</body>
</html>
