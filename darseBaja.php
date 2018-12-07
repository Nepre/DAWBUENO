<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';
require_once 'logged.inc';
 ?>

 <?php
 $sentencia = "SELECT * FROM usuarios u join estilos e on u.Estilo = e.IdEstilo left join paises p on u.Pais = p.IdPais where u.NomUsuario = '{$_COOKIE['usu']}'";
 if(!($resultado = $mysqli->query($sentencia))) {
   echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
   echo '</p>';
   exit;
 }
 $resFin = $resultado->fetch_assoc();


  ?>
 <p><label id="usuLab"><?php echo $_COOKIE["usu"] ?></label></p>
 <p><label>Email: </label><label id="mailLab"><?php echo $resFin['Email']; ?></label></p>
 <p><label>Sexo: </label><label id="sexoLab">

   <?php

   if($resFin["Sexo"] == 1){
     echo "Masculino";
   }
   else if ($resFin["Sexo"] == 2) {
     echo "Femenino";
   }
   else{
     echo "Otro";
   }
   $idUsu = $resFin['IdUsuario'];
    ?>

 </label></p>
 <p><label>Fecha de nacimiento: </label><time id="fechaLab"><?php echo $resFin['FNacimiento']; ?></time></p>
 <p><label>Ciudad: </label><label id="ciudadLab"><?php echo $resFin['Ciudad']; ?></label></p>
 <p><label>País: </label><label id="paisLab"><?php echo $resFin['NomPais']; ?></label></p>

 <?php

 $sentencia = "SELECT * FROM albumes a join usuarios u on a.Usuario = u.IdUsuario where u.NomUsuario = '{$_COOKIE["usu"]}'";
 if(!($resultado = $mysqli->query($sentencia))) {
   echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
   echo '</p>';
   exit;
 }
 echo "</br></br>";
 $i = 0;
 $arrayAlb = [];
 while($fila = mysqli_fetch_assoc($resultado)) {

     echo "<a href=verAlbum.php?Album={$fila['IdAlbum']}>{$fila['Titulo']}";
     echo '</a></br>';
     echo "<p>Descripción: {$fila['Descripcion']}</p>";
     $idAlb = (int)$fila['IdAlbum'];
     array_push($arrayAlb, $idAlb);
     $sentencia2 = "SELECT COUNT(IdFoto) c FROM fotos where Album = $idAlb";
     if(!($resultado2 = $mysqli->query($sentencia2))) {
       echo "<p>Error al ejecutar la sentencia <b>$sentencia2</b>: " . $mysqli->error;
       echo '</p>';
       exit;
     }
     $fila = mysqli_fetch_assoc($resultado2);
     echo "<p>Num fotos: {$fila['c']}</p>";
     echo "</br></br>";
     $i++;
 }
 if($i == 0){
   echo "No hay albumes en esta cuenta.";
 }
  $_SESSION['arrayAlb'] = $arrayAlb;

  ?>


   <form action="eliminarUsuario.php?id=<?php echo $_GET['id']; ?>" method="post">
    <label for='pwd'>Escriba contraseña para confirmar: </label><input type='password' id='pwd' name='pwd' value='' required><br>
    <input type="submit" value="Eliminar cuenta"></input>
   </form>
   <br>
   <p><form action="usuario.php">
       <input type="submit" value="Volver" />
   </form></p>


<?php

require_once 'footer.inc';

 ?>
