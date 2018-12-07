<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';
require_once 'logged.inc';

  $id = (int)$_GET['id'];
  $sentencia = "UPDATE usuarios SET estilo = '{$_POST["IdEstilo"]}' where IdUsuario = $id";

  $sentencia = "SELECT * FROM estilos where IdEstilo = '{$_POST["IdEstilo"]}'";
  if(!($resultado2 = $mysqli->query($sentencia))) {
    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
    echo '</p>';
    exit;
  }

  $fila2=mysqli_fetch_assoc($resultado2);
  $_SESSION['estilo'] = $fila2["Fichero"];

  if (!mysqli_query($mysqli, $sentencia)) {
      echo "Error: " . $sentencia . "" . mysqli_error($mysqli);
   }

   $sentencia = "UPDATE usuarios SET Estilo = '{$_POST["IdEstilo"]}' where IdUsuario = $id";

   if (!mysqli_query($mysqli, $sentencia)) {
       echo "Error: " . $sentencia . "" . mysqli_error($mysqli);
    }

   $host = $_SERVER['HTTP_HOST'];
   $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
   $extra = 'usuario.php';
   echo "<script>
           window.location.href='http://$host$uri/$extra';
           </script>";
   exit;

 ?>



 <?php

 require_once 'footer.inc';

  ?>
