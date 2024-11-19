<title>Busqueda | SHOESSHOP</title>
<link rel="stylesheet" href="../css/estilos.css">
<script src="https://kit.fontawesome.com/cc83a457b4.js" crossorigin="anonymous"></script>

<body id="body_busqueda">

    <iframe src="../view/header.php" frameborder="0" width="100%" height="190px" id="iframeHeader"></iframe>


    <iframe src="../view/carrito.php" id="frame_carrito" frameborder="0"></iframe>


    <?php

    require_once('../database/conexion.php');

    $cantidad_Busqueda = mysqli_query($conn, "SELECT COUNT(*) AS stock FROM tenis");

    ?>



    <h4>Busca tus sneakers favoritos</h4>

    <div id="opciones-filtro">
        <div style="width:100%; display:flex; align-items:start; justify-content:start;">
            <button><i class="fa-solid fa-list"></i> Filtro</button>
        </div>

        <style>
            .cuadros {
                transition: 300ms ease-in;
            }

            .cuadros:hover {

                transform: scale(1.2);
                cursor: pointer;
                z-index: 9999;

            }
        </style>

        <div id="ordenamiento_distribucion">
            <div id="cantidad_de_cuadros">
                <div class="cuadros cuadro2">
                    <i class="fa-solid fa-square"></i>
                    <i class="fa-solid fa-square"></i>
                    <sup>2</sup>
                </div>
                <div class="cuadros cuadro3">
                    <i class="fa-solid fa-square"></i>
                    <i class="fa-solid fa-square"></i>
                    <i class="fa-solid fa-square"></i>
                    <sup>3</sup>
                </div>
                <div class="cuadros cuadro4">
                    <i class="fa-solid fa-square"></i>
                    <i class="fa-solid fa-square"></i>
                    <i class="fa-solid fa-square"></i>
                    <i class="fa-solid fa-square"></i>
                    <sup>4</sup>
                </div>
            </div>
            <div id="cantidad_resultados">
                <span>
                    <?php

                    while ($numero = mysqli_fetch_assoc($cantidad_Busqueda)) {
                        echo $numero['stock'] . " productos";
                    }
                    ?></span>

            </div>

            <select id="ordenar_por" name="ordenar" onchange="cambiarOrden()">
                <option value="AZ">Tittle: A-Z</option>
                <option value="ZA">Tittle: Z-A</option>
                <option value="precioAlto">Max Price $</option>
                <option value="precioMenor">Min Price $</option>
            </select>

            <!-- <div id="respuesta" style="width:1200px; height:1700px;">

      </div> -->
        </div>


    </div>

    <div class="contenedor-productos">

        <?php

        $ordenSQL = "modelo ASC";

        if (isset($_GET['orden'])) {

            switch ($_GET['orden']) {
                case "AZ":
                    $ordenSQL = "modelo ASC";
                    break;
                case "ZA":
                    $ordenSQL = "modelo DESC";
                    break;
                case "precioAlto":
                    $envia = "precioAlto";
                    $ordenSQL = "precio DESC";
                    break;
                case "precioMenor":
                    $ordenSQL = "precio ASC";
                    break;
            }
        }
        $sql = mysqli_query($conn, "SELECT * FROM tenis ORDER BY $ordenSQL");

        while ($tenis = mysqli_fetch_assoc($sql)) {
            ?>
            <form action="agregar_carrito.php" method="POST">
            <article>
                <img src="../img/tenis3.webp">
                <div class="datos-tenis">
                    <span name="modelo" style="font-size:16px; font-weight:700;"><?php echo $tenis['modelo'] ?></span>

                    <span name="precio"><?php echo "Precio: $" . $tenis['precio'] ?></span>
                    <span name="stock"><?php echo "Disponibles: " . $tenis['stock'] ?></span>
                  
                    <button type="submit" value="insertar_carrito" name="insertar_carrito"  id="agregar_carrito">Agregar Carrito <i class="fa-solid fa-cart-shopping"></i></button>
                </div>
            </article>
            </form>

        <?php

        }


        ?>

    </div>

</body>
<script>
    function cambiarOrden() {
        const select = document.getElementById("ordenar_por");
        const ordenSeleccionado = select.value;

        const xhr = new XMLHttpRequest();
        xhr.open('GET', `filtros_kids.php?orden=${encodeURIComponent(ordenSeleccionado)}&timestamp=${new Date().getTime()}`, true);

        xhr.onload = function() {
            if (xhr.status === 200) {
                // Actualizar el contenido del div con el resultado
                document.getElementById("body_busqueda").innerHTML = xhr.responseText;
            } else {
                console.error('Error al cargar los datos');
            }
        };

        xhr.onerror = function() {
            console.error('Solicitud fallida');
        };

        // Enviar la solicitud
        xhr.send();


    }

    // mostrar y ocultar carrito ahora ppara filtros
    

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


<script src="../js/datos.js" type="text/javascript"></script>
