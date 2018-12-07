<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>

 <main>

   <?php


      $sentencia = "SELECT * FROM albumes a join usuarios u on a.Usuario = u.IdUsuario where u.NomUsuario = '{$_COOKIE["usu"]}'";
      if(!($resultado = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
      }

      $i = 0;
      while($fila = mysqli_fetch_assoc($resultado)) {

          echo "<a href=verAlbum.php?Album={$fila['IdAlbum']}>{$fila['Titulo']}";
          echo '</a></br>';
          echo "<p>Descripción: {$fila['Descripcion']}</p></br></br>";
          $i++;
      }
      if($i == 0){
        echo "No hay albumes en esta cuenta.";
      }
      $resultado->close();
      $mysqli->close();
      ?>

      <p><form action="usuario.php">
          <input type="submit" value="Volver" />
      </form></p>
 </main>


 <?php

 require_once 'footer.inc';

  ?>
