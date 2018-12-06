<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>
<main>

    <?php

      if($mysqli->connect_errno) {
      echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
      echo '</p>';
      exit;
      }

      $sentencia = "SELECT * FROM usuarios";
      if(!($resultado = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
      }

      echo '<table><tr>';
      echo '<th>IdUsuario</th><th>Nombre usuario</th><th>Clave (xD)</th>';
      echo '<th>Email</th><th>Sexo</th><th>FNacimiento</th><th>Ciudad</th>';
      echo '<th>Pais</th><th>Foto</th><th>FRegistro</th><th>Estilo</th>';
      echo '</tr>';
      while($fila = $resultado->fetch_object()) {
        echo "<tr>";
        echo "<td>$fila->IdUsuario</td>";
        echo "<td>$fila->NomUsuario</td>";
        echo "<td>$fila->Clave</td>";
        echo "<td>$fila->Email</td>";
        echo "<td>$fila->Sexo</td>";
        echo "<td>$fila->FNacimiento</td>";
        echo "<td>$fila->Ciudad</td>";
        echo "<td>$fila->Pais</td>";
        echo "<td>$fila->Foto</td>";
        echo "<td>$fila->FRegistro</td>";
        echo "<td>$fila->Estilo </td>";
        echo "</tr>";
      }
      $resultado->close();
       $mysqli->close();
      ?>
      </main>
      <?php
      require_once 'footer.inc';

     ?>
