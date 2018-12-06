<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>

 <main>

   <form id=formReg action="formularioRegistro.php?id=123" method="post">
       <label for="usu">Usuario: </label><input type="text" id="usu" name="usu"><br>
       <label for="pwd">Contraseña: </label><input type="password" id="pwd" name="pwd"><br>
       <label for="pwd2">Repita contraseña: </label><input type="password" id="pwd2" name="pwd2"><br>
       <label for="mail">Email: </label><input type="text" id="mail" name="mail"><br>

       <label for="fecha">Fecha de nacimiento: </label><input type="date" id="fecha" name="fecha"><br>
       <label for="ciudad">Ciudad: </label><input type="text" id="ciudad" name="ciudad"><br>
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


       echo '<p><label for="pais">País: </label><select id="pais" name="pais"><option></option>';

       while($fila=mysqli_fetch_assoc($resultado)){
          echo "<option>{$fila['NomPais']}</option>";
       }

        echo "</select><br></p>";

        $resultado->close();
        $mysqli->close();

          ?>

       <p><label for="sexo">Sexo: </label><select id="sexo" name="sexo"><option></option><option>Hombre</option> <option>Mujer</option></select><br></p>
       <input type="file" name="file" id="foto" accept="image/*"><br>
     <input type="submit" value="Registrarse"></input> <br><br>

   </form>
   <p><form action="index.php">
       <input type="submit" value="Volver" />
   </form></p>

 </main>


 <?php

 require_once 'footer.inc';

  ?>
