<?php
  session_start();
  //eliminamos toda la informacion que captamos en el inicio de sesion
  unset($_SESSION["email"]); 
  unset($_SESSION["nombre"]);
  unset($_SESSION["apellidos"]);
  unset($_SESSION["telefono"]);
  unset($_SESSION["puntos"]);
  //Destruimos la sesion
  session_destroy();
  //redireccionamos a index.php
  header('Location: ../index.php');
?>