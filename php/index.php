
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Inicia Sesión | SHOESSHOP</title>
      <link rel="stylesheet" href="../css/estilos.css">
      <script src="https://kit.fontawesome.com/cc83a457b4.js" crossorigin="anonymous"></script>

</head>


<iframe src="../view/carrito.php" id="frame_carrito" frameborder="0"></iframe>

<?php 
// include("../database/conexion.php");
include_once("autenticacion.php");
?>

<iframe src="../view/header.php" frameborder="0"  width="100%" height="190px" id="iframeHeader"></iframe>

<main style="overflow-x:hidden;" id="main">

<section  class="hero">
    <div class="hero__content">
        <p style="font-family:'Times New Roman', Times, serif" class="hero__title">ADIDAS X KORN</p>
        <a class="hero__button" href="/coleccion">Comprar colección</a>
    </div>
</section>

<div class="container">
    <h2 class="title">NEW IN SNEAKERS</h2>
    <div class="card-container">
      <!-- Card 1 -->
      <div class="card">
        <img src="../img/tenis1.webp" alt="Nike Book 1 Leather">
        <div class="card-content">
          <p class="card-title">Nike Book 1 Leather "Halloween" 'Black and White'</p>
          <p class="card-price">$3,399.00</p>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="card">
        <img src="../img/tenis2.webp" alt="Air Jordan 4 RM">
        <div class="card-content">
          <p class="card-title">Air Jordan 4 RM 'Black Cat'</p>
          <p class="card-price">$3,499.00</p>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="card">
        <img src="../img/tenis3.webp" alt="Nike Book 1 Sunset">
        <div class="card-content">
          <p class="card-title">Nike Book 1 'Sunset'</p>
          <p class="card-price">$3,399.00</p>
        </div>
      </div>
      <!-- Card 4 -->
      <div class="card">
        <img src="../img/tenis4.webp" alt="adidas Gazelle Indoor">
        <div class="card-content">
          <p class="card-title">adidas Gazelle Indoor 'Collegiate Purple'</p>
          <p class="card-price">$2,299.00</p>
        </div>
      </div>
      <!-- Card 5 -->
      <div class="card">
        <img src="../img/tenis5.webp" alt="Women's AI Sneakers">
        <div class="card-content">
          <p class="card-title">Women's AI Sneakers 'Strawberries'</p>
          <p class="card-price">$3,199.00</p>
        </div>
      </div>
      <!-- Card 6 -->
      <div class="card">
        <img src="../img/tenis6.webp" alt="Women's AI Sneakers">
        <div class="card-content">
          <p class="card-title">Women's AI Sneakers 'Strawberries'</p>
          <p class="card-price">$3,199.00</p>
        </div>
      </div>
       <!-- Card 7 -->
      <div class="card">
        <img src="../img/tenis7.webp" alt="Women's AI Sneakers">
        <div class="card-content">
          <p class="card-title">Women's AI Sneakers 'Strawberries'</p>
          <p class="card-price">$3,199.00</p>
        </div>
      </div>


    </div>
  </div>

<section style="background-image: url('../img/fondo2.webp');" class="hero">
    <div class="hero__content">
        <p style="font-family:'Times New Roman', Times, serif" class="hero__title">LUST X STRANGER THINGS</p>
        <a class="hero__button" href="/coleccion">Ver colección</a>
    </div>
</section>
<section style="background-image: url('../img/fondo3.webp');" class="hero">
    <div class="hero__content">
        <p style="font-family:'Times New Roman', Times, serif" class="hero__title">NIKE BOOK 1 LEATHER</p>
        <a class="hero__button" href="/coleccion">Comprar</a>
    </div>
</section>

<div class="container_tenis">
    <h2 class="title">GALLERY</h2>
    <div class="gallery-container">
        <!-- Image 1 -->
        <div class="image-card">
            <img src="../img/tenis_galeria1.webp" alt="Nike Book 1 Leather">
            <div class="image-label">JORDAN</div>
        </div>
        <!-- Image 2 -->
        <div class="image-card">
            <img src="../img/tenis_galeria2.webp" alt="Air Jordan 4 RM">
            <div class="image-label">ADIDAS</div>
        </div>
        <!-- Image 3 -->
        <div class="image-card">
            <img src="../img/tenis_galeria3.jpg" alt="Nike Book 1 Sunset">
            <div class="image-label">NIKE</div>
        </div>
        <!-- Image 4 -->
        <div class="image-card">
            <img src="../img/tenis_galeria4.jpg" alt="adidas Gazelle Indoor">
            <div class="image-label">NEW BALANCE</div>
        </div>
        <!-- Image 5 -->
        <div class="image-card">
            <img src="../img/tenis_galeria5.webp" alt="Women's AI Sneakers">
            <div class="image-label">PUMA</div>
        </div>
        <!-- Image 6 -->
        <div class="image-card">
            <img src="../img/tenis_galeria6.webp" alt="Women's AI Sneakers">
            <div class="image-label">NEW ERA</div>
        </div>
     
    </div>
</div>



</main>



<iframe src="../view/footer.html" width="100%" height="340px" frameborder="0"></iframe>
             
<script src="../js/datos.js"></script>

<script>  

// recibe mensaje para mostrar el carrito proveniente de el iframe header y actua asi
  window.addEventListener("message", function(event) {
            // Verificar el origen por seguridad
            if (event.origin === window.location.origin && event.data === "mostrar_carrito") {
                // Mostrar el iframe "frame_carrito"
                document.querySelector("#frame_carrito").style.display = "block";
                document.querySelector("#frame_carrito").style.opacity = 1;

            }
        });

        // ahora recibe un mensaje similar pero de el iframe carrito.php para desaparecerlo al presionar
        // la X
        window.addEventListener("message", function(event) {
            // Verificar el origen por seguridad
            if (event.origin === window.location.origin && event.data === "ocultar_carrito") {
                // Mostrar el iframe "frame_carrito"
                document.querySelector("#frame_carrito").style.display = "none";
                document.querySelector("#frame_carrito").style.opacity = 0;

            }
        });

</script>

</html>
