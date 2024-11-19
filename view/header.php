<!DOCTYPE html>
<html lang="en">
<?php
require_once("../php/autenticacion.php");
?>

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Inicia Sesión | SHOESSHOP</title>
      <link rel="stylesheet" href="../css/estilos.css">
      <script src="https://kit.fontawesome.com/cc83a457b4.js" crossorigin="anonymous"></script>
</head>

<style>



      .carrito-usuario button #cierra_sesion {
            position: absolute;
            top: 3px;
            left: 35%;
            text-decoration:none;
            transform: translateX(30%) rotateX(90deg) ;
            padding: 1em;
            opacity: 0.6;
            width:auto;
            font-size:12px;
            height:85px;
            transition: all 0.5s ease;
            background: #000;
            display:flex;
            justify-content:center;
            align-items:center;
            color:#fff;
            height: 0px;
      }

      .carrito-usuario button:hover #cierra_sesion {
            opacity: 1;
            border-radius:10px;
            pointer-events: auto;
            transform: translateX(30%) rotateX(0deg) translateY(120%);
      }
</style>

<body>

      <header id="header">
            <nav id="navegacion">
                  <section id="promos">
                        <p>Nuevas ofertas, aprovecha ahora</p>
                  </section>

                  <section id="barraprincipal">
                  <form class="search-container" action="">
                        <input id="search-box" type="text" class="search-box" name="q" />
                        <label for="search-box">
                        <span class="fas fa-search search-icon"></span>
                        </label>
                        <input type="submit" id="search-submit" />
                  </form>

                        
                        
                        <picture class="distribuye logo">
                             <a href="../php/index.php" target="_top"><img src="../img/LogoShoesShop.png" alt="LogoShoes"></a>
                        </picture>
                        <div class="distribuye carrito-usuario">
                              <?php
                              // Obtener datos de sesión
                              $nombre = $_SESSION['nombre'] ?? null;
                              $email = $_SESSION['email'] ?? null;
                              $imagen = $_SESSION['imagen'] ?? null;

                              if (isset($nombre) && isset($email) && isset($imagen)) { ?>
                                    <div>
                                          <button style="border-radius:20px; min-width:90px; border:none; height:30px; display:flex; justify-content:end; align-items:center; position:relative;">

                                                <p style="margin-right:10px;position:absolute; left:15px;"><?php echo $nombre;?></p>
                                                <img style="border-radius: 50%; width:30px; height:30px;" src="<?php echo $imagen; ?>" alt="Profile Picture">
                                                <a href="../php/salir.php" target="_top" id="cierra_sesion">
                                                     Salir <i class="fas fa-door-open" aria-hidden="true"></i>
                              </a>
                                          </button>
                                    </div>
                              <?php } ?>

                              <i class="fa-solid fa-cart-shopping" id="ver_carrito"></i>
                        </div>
                  </section>

                  <section id="opciones">
                        <ul class="lista_ops">
                              <a href="">
                                    <li>Lanzamientos</li>
                              </a>
                              <a href="">
                                    <li>Men´s</li>
                              </a>
                              <a href="../php/filtros.womens.php" target="_top">
                                    <li>Women´s</li>
                              </a>
                              <a href="../php/filtros_kids.php" target="_top">
                                    <li>Kids</li>
                              </a>
                              <a href="">
                                    <li>Shop by Brand</li>
                              </a>
                              <a href="../php/filtros_busqueda.php" target="_top">
                                    <li>Sale</li>
                              </a>
                              <a href="">
                                    <li>New</li>
                              </a>
                        </ul>
                  </section>
            </nav>
      </header>

      <script src="../js/index.js"></script>
      <script src="../js/datos.js"></script>

      <script>
          document.getElementById("ver_carrito").addEventListener("click", function() {
            // Enviar el mensaje al padre (documento principal)
            window.parent.postMessage("mostrar_carrito", window.location.origin);
        });
      </script>
      <script>
      document.addEventListener("touchstart", function(){}, true);
      </script>
</body>

</html>
