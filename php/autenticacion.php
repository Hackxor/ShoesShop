<?php 

require_once("configuracion.php");
session_start();


use Google\Client as Google_Client;
use Google\Service\Oauth2 as Google_Service_Oauth2;


if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
      $cliente->setAccessToken($_SESSION['access_token']);
  } else if(isset($_GET['code'])) {

      $token = $cliente->fetchAccessTokenWithAuthCode($_GET['code']);

      $google_oauth = new Google_Service_Oauth2($cliente);
      $google_informacion_cuenta = $google_oauth->userinfo->get();
      $email = $google_informacion_cuenta->email;
      $name = $google_informacion_cuenta->name;
      $imagen = $google_informacion_cuenta->picture;
   
     // obteniendo los datos del usuario guardando en sesiones
      $_SESSION['nombre'] = $name;
      $_SESSION['email'] = $email;
      $_SESSION['imagen']= $imagen;
      
      if (isset($token['error'])) {
          echo "Error al obtener el token: " . $token['error'];
          exit();
      }
  
      $_SESSION['access_token'] = $token['access_token'];
      $cliente->setAccessToken($token['access_token']);

  } else {
      // echo "No se ha recibido el código de autorización y no hay token de acceso.";
  }



?>