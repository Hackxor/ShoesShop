<!DOCTYPE html>
<html lang="en">
<?php
require('autenticacion.php');
?>

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Inicia Sesión | SHOESSHOP</title>
      <link rel="stylesheet" href="../css/estilos.css">
      <script src="https://kit.fontawesome.com/cc83a457b4.js" crossorigin="anonymous"></script>

</head>
<script>



      function togglePassword() {

            const cambiaColor = document.querySelector("#verContra");
            const passwordInput = document.getElementById("password");

          if(passwordInput.type === "password"){
             cambiaColor.style.color = "blue";
              passwordInput.type = "text";
          }else{
            cambiaColor.style.color = "black";
            passwordInput.type = "password";
          }

      }
      function togglePassword2() {

const cambiaColor = document.querySelector("#verContra2");
const passwordInput = document.getElementById("password2");

if(passwordInput.type === "password"){
 cambiaColor.style.color = "blue";
  passwordInput.type = "text";
}else{
cambiaColor.style.color = "black";
passwordInput.type = "password";
}

}
function togglePassword3() {

const cambiaColor = document.querySelector("#verContra3");
const passwordInput = document.getElementById("password3");

if(passwordInput.type === "password"){
 cambiaColor.style.color = "blue";
  passwordInput.type = "text";
}else{
cambiaColor.style.color = "black";
passwordInput.type = "password";
}

}

      function handleSubmit(event) {
            event.preventDefault(); // Evita el envío inmediato
            console.log("Formulario enviado de forma controlada.");
            // Aquí puedes agregar cualquier lógica adicional para el envío controlado
            return false; // Previene el envío completo del formulario
        }
</script>

<body id="paginaLogin">

      <main id="main">
            <img src="../img/LogoShoesShop.png" alt="">

            <form action="procesar_login.php"  class="login login_iniciar" method="post" enctype="multipart/form-data" utf8_encode>

                  <span style="width: 100%; text-align:center; font-size:20px;">Inicio de Sesión </span>
                  <span>¿No tienes una cuenta? <span id="crear_cuenta" style="cursor: pointer; color:blue;">Crea una</span></span>

                  <div class="caja">
                        <input type="text" name="nombre" id="usuario" required>
                        <label for="usuario"><i class="fa fa-user" aria-hidden="true"></i> Usuario</label>
                  </div>


                  <div class="caja">
                        <input type="password" name="password" id="password" required>
                        <label for="usuario"><i class="fa fa-lock" aria-hidden="true"></i> Contrasena</label>
                        <button type="button" id="verContra" style="width:50px; position:absolute; right:0; background:transparent; border:none; outline:none; font-size:18px; cursor:pointer;" class="toggle-password" onclick="togglePassword()">
                              <i class="fa-solid fa-eye"></i>
                        </button>
                  </div>

                  <a href="#" style="color:blue">¿Olvidaste tu contraseña?</a>
                  <span style="width: 100%; text-align:center;">Inicia con</span>
                  <hr>
                  <a href="<?php echo $cliente->createAuthUrl() ?>" class="iniciar_con google"> <i class="fa fa-google" id="estilar_como_google" aria-hidden="true"></i> </a>

                  <input type="submit" value="Iniciar" name="iniciar">
            </form>

            <form action="registro.php" class="login login_registrar" method="post" enctype="multipart/form-data" utf8_encode>

                  <span style="width: 100%; text-align:center; font-size:20px;">Crea tu cuenta ahora </span>
                  <span>¿ Ya estas registrado ? <span style="cursor: pointer; color:blue;" id="iniciar_sesion">Inicia Sesión</span></span>

                  <div class="caja">
                        <input type="text" name="nombre" id="usuarioNuevo" required>
                        <label for="usuario"><i class="fa fa-user" aria-hidden="true"></i>Usuario</label>
                  </div>

                  <div class="caja">
                        <input type="password" name="password" id="password2" maxlength="8" pattern="[a-zA-Z]{*}[0-9]{*}" required>
                        <label for="usuario"><i class="fa fa-lock" aria-hidden="true"></i> Password</label>
                        <button type="button" id="verContra2" style="width:50px; position:absolute; right:0; background:transparent; border:none; outline:none; font-size:18px; cursor:pointer;" class="toggle-password" onclick="togglePassword2()">
                              <i class="fa-solid fa-eye"></i>
                        </button>
                  </div>

                  <div class="caja">
                        <input type="password" name="repetirPassowrd" id="password3" maxlength="8" pattern="[a-zA-Z]{*}[0-9]{*}" required>
                        <label for="usuario"><i class="fa fa-lock"></i> Repetir Password</label>
                        <button type="button" id="verContra3" style="width:50px; position:absolute; right:0; background:transparent; border:none; outline:none; font-size:18px; cursor:pointer;" class="toggle-password" onclick="togglePassword3()">
                              <i class="fa-solid fa-eye"></i>
                        </button>
                  </div>


                  <div class="caja">
                        <input type="mail" name="correo" id="correo" required>
                        <label for="usuario"><i class="fa fa-envelope" aria-hidden="true"></i> Correo</label>
                  </div>
                  <input type="submit" value="Registrar" name="registrar">
            </form>


      </main>

      <script src="../js/index.js" defer></script>
</body>

</html>
