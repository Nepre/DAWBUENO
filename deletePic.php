<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'logged.inc';
require_once 'config.inc';

 ?>


  <main>
    <?php

      $sentencia = "SELECT * FROM fotos where IdFoto = '{$_POST["IdFoto"]}'";

      if(!($resultado = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
      }

      $fila = mysqli_fetch_assoc($resultado);


      unlink('upload/'.$fila['Fichero']);

      $sentencia = "DELETE FROM fotos WHERE IdFoto = '{$_POST["IdFoto"]}'";

      if (!mysqli_query($mysqli, $sentencia) ) {
          $host = $_SERVER['HTTP_HOST'];
          $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
          $extra = 'usuario.php';
          echo "<script>
                  alert('Escriba la contraseña correcta.');
                  window.location.href='http://$host$uri/$extra';
                  </script>";
          exit;
       }


     ?>
  </main>


<?php

require_once 'footer.inc';

?>
