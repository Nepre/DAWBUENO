<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>

 <main>

   <form id=formReg>
       <label for="tit">Titulo: </label><input type="tit" id="tit" name="tit"><br>
       <label for="desc">Descripción: </label><input type="desc" id="desc" name="desc"><br>
       <label for="alt">Texto alternativo: </label><textarea type="alt" id="alt" name="alt" minlength="10" ></textarea><br>
       <label for="mail">Email: </label><input type="text" id="mail" name="mail"><br>
       <label for="fecha">Fecha de la foto: </label><input type="date" id="fecha" name="fecha"><br>
       <?php

       if($mysqli->connect_errno) {
       echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
       echo '</p>';
       exit;
       }
       $sentencia = mysqli_real_escape_string($mysqli, "SELECT * FROM albumes");
       if(!($resultado = $mysqli->query($sentencia))) {
         echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
         echo '</p>';
         exit;
       }

       echo "<p><label>Album:</label><select><option></option> ";
       while($fila=mysqli_fetch_assoc($resultado)){
          echo "<option>{$fila['Titulo']}</option>";
       }
       echo "</p></select>";

       $sentencia2 = "SELECT * FROM paises order by NomPais";
       if(!($resultado = $mysqli->query($sentencia2))) {
         echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
         echo '</p>';
         exit;
       }

       echo "<p><label>Pais: </label><select><option></option> ";
       while($fila=mysqli_fetch_assoc($resultado)){
         print_r($fila);
          echo "<option>{$fila['NomPais']}</option>";
       }
       echo "</p></select>";

       $resultado->close();
       $mysqli->close();

          ?>

       <p><label for="sexo">Sexo: </label><select id="sexo" name="sexo"><option></option> <option>Hombre</option> <option>Mujer</option></select><br></p>
       <input type="file" name="file" id="foto" accept="image/*"><br>
     <input type="submit" value="Crear foto "></input> <br><br>

   </form>

   <p><form action="usuario.php">
       <input type="submit" value="Volver" />
   </form></p>


 </main>


 <?php

 require_once 'footer.inc';

  ?>
