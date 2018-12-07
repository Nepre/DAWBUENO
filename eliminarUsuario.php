<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';
require_once 'logged.inc';
 ?>

<?php

  $id = $_GET['id'];
  $clave = $_POST['pwd'];

  $sentencia = "DELETE FROM usuarios where IdUsuario = $id and Clave = '$clave'";
  $host = $_SERVER['HTTP_HOST'];
  $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  if (!mysqli_query($mysqli, $sentencia)) {
      echo "Error: Escriba la contraseña correcta";
      echo "<p><form action='Usuario.php'><input type='submit' value='Volver'/></form></p>";
      $extra = 'usuario.php';
      echo "<script>
              alert('Escriba la contraseña correcta.');
              window.location.href='http://$host$uri/$extra';
              </script>";
      exit;
   }
   else{

    $extra = 'controlAcceso.php?salir=y';
    echo "<script>
            alert('Usuario eliminado.');
            window.location.href='http://$host$uri/$extra';
            </script>";
    exit;

   }

 ?>

 <?php

 require_once 'footer.inc';

  ?>
