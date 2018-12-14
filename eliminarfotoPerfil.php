<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'logged.inc';
require_once 'config.inc';

 ?>


  <main>
    <?php

        $sentencia = "SELECT * FROM usuarios where IdUsuario = '{$_GET["id"]}'";

      if(!($resultado = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
      }

      $fila = mysqli_fetch_assoc($resultado);


      unlink('perfil/'.$fila['Foto']);

      $sentencia = "UPDATE usuarios SET Foto = 'default.png' where IdUsuario = {$_GET["id"]}";

      $host = $_SERVER['HTTP_HOST'];
      $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

      if (!mysqli_query($mysqli, $sentencia) ) {
          $extra = 'usuario.php';
          echo "<script>
                  alert('Error.');
                  window.location.href='http://$host$uri/$extra';
                  </script>";
          exit;
       }
       else{
         $extra = 'usuario.php';
         echo "<script>
                 alert('Se ha eliminado la foto de perfil.');
                 window.location.href='http://$host$uri/$extra';
                 </script>";
         exit;
       }


     ?>
  </main>


<?php

require_once 'footer.inc';

?>
