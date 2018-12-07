<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>

 <main>

   <form action='formularioFoto.php?id=<?php echo $_GET['id']; ?>' id=formFoto name="formFoto" method="post">
       <label for="tit">Titulo: </label><input type="tit" id="tit" name="tit" required><br>
       <label for="desc">Descripción: </label><input type="desc" id="desc" name="desc" required><br>
       <label for="alt">Texto alternativo: </label><textarea type="alt" id="alt" name="alt" minlength="10" required ></textarea><br>
       <label for="fecha">Fecha de la foto: </label><input type="date" id="fecha" name="fecha" required><br>
       <?php

       if($mysqli->connect_errno) {
       echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
       echo '</p>';
       exit;
       }
       $sentencia = mysqli_real_escape_string($mysqli, "SELECT * FROM albumes where Usuario = {$_GET['id']}");
       if(!($resultado = $mysqli->query($sentencia))) {
         echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
         echo '</p>';
         exit;
       }

       echo "<p><label>Album:</label><select name='album' id ='album' required><option value=''></option>";
       $i = 0;
       while($fila=mysqli_fetch_assoc($resultado)){
          $i++;
          echo "<option value='{$fila['IdAlbum']}'>{$fila['Titulo']}</option>";
       }

       if($i == 0){
         $host = $_SERVER['HTTP_HOST'];
         $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
         $extra = 'usuario.php';
         echo "<script>
                 alert('Crea primero un album.');
                 window.location.href='http://$host$uri/$extra';
                 </script>";
         exit;
       }
       echo "</select></p>";

       $sentencia2 = "SELECT * FROM paises order by NomPais";
       if(!($resultado = $mysqli->query($sentencia2))) {
         echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
         echo '</p>';
         exit;
       }

       echo "<p><label>Pais: </label><select id='pais' name ='pais'><option value=''></option> ";
       while($fila=mysqli_fetch_assoc($resultado)){
         print_r($fila);
          echo "<option value='{$fila['IdPais']}' >{$fila['NomPais']}</option>";
       }
       echo "</p></select>";

       $resultado->close();
       $mysqli->close();

      ?>
        <br>
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
