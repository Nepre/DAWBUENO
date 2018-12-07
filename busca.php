<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>

 <main>
   <div id="busc">
     <form id="buscar" action="resbus.php" method="post">
       <p><label for="titulo">Título: </label><input type:"text" id="titulo" name="titulo"></p>
       <p><label for="fecha">Fecha: </label><input type="date" id="fecha" name="fecha"></p>
       <?php
       if($mysqli->connect_errno) {
       echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
       echo '</p>';
       exit;
       }
       $sentencia = "SELECT * FROM paises order by NomPais";
       if(!($resultado = $mysqli->query($sentencia))) {
         echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
         echo '</p>';
         exit;
       }


       echo '<p><label for="pais">País: </label><select id="pais" name="pais">';
       echo "<option></option>";
       while($fila=mysqli_fetch_assoc($resultado)){
          echo "<option>{$fila['NomPais']}</option>";
       }

        echo "</select><br></p>";

        $resultado->close();
        $mysqli->close();

          ?>
       <input type="submit" name="submit" value="Buscar">
     </form>
     <div class="push"></div>
 </main>


 <?php

 require_once 'footer.inc';

  ?>
