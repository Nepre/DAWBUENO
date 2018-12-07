<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>

 <main>

   <form id=formReg action="formularioUpdate.php" method="post">

      <?php  $sentencia ="SELECT * FROM usuarios u where u.NomUsuario = '{$_COOKIE["usu"]}'";
       if(!($resultado = $mysqli->query($sentencia))) {
         echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
         echo '</p>';
         exit;
       }
        //print_r($resultado);
        $fila=mysqli_fetch_assoc($resultado);
        $time = strtotime($fila['FNacimiento']);
        echo "<label for='usu'>Usuario: </label><input type='text' id='usu' name='usu' value='{$fila['NomUsuario']}' required><br>";
        echo "<label for='pwd'>Contraseña actual: </label><input type='password' id='pwd' name='pwd' value='' required><br>";
        echo "<label for='pwd2'>Nueva Contraseña: </label><input type='password' id='pwd2' name='pwd2' value='' ><br>";
        echo "<label for='pwd3'>Repetir Contraseña: </label><input type='password' id='pwd3' name='pwd3' value='' ><br>";
        echo "<label for='mail'>Email (Dominio entre 2 y 4 caracteres): </label><input type='text' id='mail' name='mail' value='{$fila['Email']}' required><br>";
        echo "<label for='fecha'>Fecha de nacimiento: </label><input type='date' id='fecha' name='fecha' value='".date('Y-m-d',$time)."' required'><br>";
        echo "<label for='ciudad'>Ciudad: </label><input type='text' id='ciudad' name='ciudad'value='{$fila['Ciudad']}'><br>";
        $pais = $fila["Pais"];
        $sexo = $fila["Sexo"];
       $sentencia = mysqli_real_escape_string($mysqli, "SELECT * FROM paises order by NomPais");
       if(!($resultado = $mysqli->query($sentencia))) {
         echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
         echo '</p>';
         exit;
       }

       $hom = $muj = "";

       switch ($sexo) {
         case 1:
           $hom = 'selected="selected"';
           break;

         default:
           $muj =  'selected="selected"';
           break;
       }

       echo '<p><label for="sexo">Sexo*: </label><select id="sexo" name="sexo" required><option value="">';
       echo "</option><option $hom>Hombre</option> <option $muj>Mujer</option></select><br></p>";

       echo '<p><label for="pais">País: </label><select id="pais" name="pais"><option></option>';

       while($fila=mysqli_fetch_assoc($resultado)){
          if ($fila['IdPais'] == $pais) {
              echo '<option selected="selected" value='.$fila['IdPais'].'>'.$fila['NomPais'].'</option>';
          }
          else {
              echo '<option value='.$fila['IdPais'].'>'.$fila['NomPais'].'</option>';
          }
      }
      echo "</select><br></p>";

        $resultado->close();
        $mysqli->close();

          ?>

       <input type="file" name="file" id="foto" accept="image/*"><br>
     <input type="submit" value="Modificar"></input> <br><br>

   </form>
   <p><form action="Usuario.php">
       <input type="submit" value="Volver"/>
   </form></p>

 </main>




 <?php

 require_once 'footer.inc';

  ?>
