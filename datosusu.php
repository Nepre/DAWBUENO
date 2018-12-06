<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>

 <main>

   <form id=formReg action="formularioRegistro.php?id=123" method="post">
     <?php
     $mysqli = @new mysqli(
     'localhost',   // El servidor
     'root',    // El usuario
     '',          // La contraseña
     'pidb'); // La base de datos
     if($mysqli->connect_errno) {
     echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
     echo '</p>';
     exit;
     }
     $sentencia = "SELECT * FROM usuarios u where u.NomUsuario = '{$_COOKIE["usu"]}'";
     if(!($resultado = $mysqli->query($sentencia))) {
       echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
       echo '</p>';
       exit;
     }
      //print_r($resultado);
     while($fila=mysqli_fetch_assoc($resultado)){
      echo "<label for='usu'>Usuario: </label><input type='text' id='usu' name='usu' value='{$fila['NomUsuario']}'><br>";
      echo "<label for='pwd'>Contraseña: </label><input type='password' id='pwd' name='pwd' value='{$fila['Clave']}'><br>";
      echo "<label for='mail'>Email: </label><input type='text' id='mail' name='mail' value='{$fila['Email']}'><br>";
      echo "<label for='fecha'>Fecha de nacimiento: </label><input type='date' id='fecha' name='fecha' value='{$fila['FNacimiento']}'><br>";
      echo "<label for='ciudad'>Ciudad: </label><input type='text' id='ciudad' name='ciudad'value='{$fila['Ciudad']}'><br>";
    }

       $resultado->close();
       $mysqli->close();

         ?>

       <?php
       $mysqli = @new mysqli(
       'localhost',   // El servidor
       'root',    // El usuario
       '',          // La contraseña
       'pidb'); // La base de datos
       if($mysqli->connect_errno) {
       echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
       echo '</p>';
       exit;
       }
       $sentencia = "SELECT * FROM paises";
       if(!($resultado = $mysqli->query($sentencia))) {
         echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
         echo '</p>';
         exit;
       }


       echo '<p><label for="pais">País: </label><select id="pais" name="pais">';

       while($fila=mysqli_fetch_assoc($resultado)){
          echo "<option>{$fila['NomPais']}</option>";
       }

        echo "</select><br></p>";

        $resultado->close();
        $mysqli->close();

          ?>

       <p><label for="sexo">Sexo: </label><select id="sexo" name="sexo"> <option>Hombre</option> <option>Mujer</option></select><br></p>
       <input type="file" name="file" id="foto" accept="image/*"><br>
     <input type="submit" value="Modificar"></input> <br><br>

   </form>

   <p><form action="usuario.php">
       <input type="submit" value="Volver" />
   </form></p>

 </main>


 <?php

 require_once 'footer.inc';

  ?>
