<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';
require_once 'logged.inc';

 ?>

 <?php

 $sentencia = "SELECT * FROM usuarios where IdUsuario = {$_GET['id']}";

 if(!($resultado = $mysqli->query($sentencia))) {
   echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
   echo '</p>';
   exit;
 }

 $fila = mysqli_fetch_assoc($resultado);
 $host = $_SERVER['HTTP_HOST'];
 $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
 if($fila['NomUsuario'] != $_COOKIE['usu']){
   $extra = "controlAcceso.php?salir=y";
   echo "<script>
          alert('Se ha modificado el usuario. Inicie sesión de nuevo.');
           window.location.href='http://$host$uri/$extra';
           </script>";
   exit;
 }
 else{
   $extra = "usuario.php";
   echo "<script>
          alert('Se han modificado los datos.');
           window.location.href='http://$host$uri/$extra';
           </script>";
   exit;
 }

 ?>

  <?php

  require_once 'footer.inc';

   ?>
