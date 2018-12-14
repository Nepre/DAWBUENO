<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'logged.inc';
require_once 'config.inc';

 ?>

 <main>
   <div class="general">
        <p><label id="usuLab">¡Hola <?php echo $_COOKIE["usu"] ?>!</label></p>

       <div>
         <?php
         $sentencia = "SELECT * FROM usuarios u join estilos e on u.Estilo = e.IdEstilo left join paises p on u.Pais = p.IdPais where u.NomUsuario = '{$_COOKIE['usu']}'";
         if(!($resultado = $mysqli->query($sentencia))) {
           echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
           echo '</p>';
           exit;
         }
         $resFin = $resultado->fetch_assoc();
         echo <<<a
         <div id="fotoLab">
           <img src='perfil/{$resFin['Foto']}' width="200" alt='jon'>
         </div>
a;


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
         $host = $_SERVER['HTTP_HOST'];
         $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
         $extra = "usuario.php";
          ?>
          <form action="datosusu.php?id=<?php echo $idUsu; ?>" method="post">
              <input type="submit" value="Editar datos" />
          </form>

          <p><form action="eliminarfotoPerfil.php?id=<?php echo $idUsu; ?>" method = 'post'>
              <input type="submit" value="Eliminar Foto de Perfil" />
          </form></p>

          <p><form action="darseBaja.php?id=<?php echo $idUsu; ?>" method="post">
              <input type="submit" value="Darse de baja" />
          </form></p>

         <p><form action="solalbum.php">
             <input type="submit" value="Ver albumes" />
         </form></p>
         <p><form action="crearAlbum.php?id=<?php echo $idUsu; ?>" method="post">
             <input type="submit" value="Crear Album" />
         </form></p>

         <p><form action="subirfoto.php?id=<?php echo $idUsu; ?>" method = 'post'>
             <input type="submit" value="Subir foto" />
         </form></p>

         <p><form action="eliminarfoto.php?id=<?php echo $idUsu; ?>" method = 'post'>
             <input type="submit" value="Eliminar Foto" />
         </form></p>

         <p><form id = 'formEstilo' action='Estilo.php?id=<?php echo $idUsu; ?>' method = 'post'>
         <select name="IdEstilo" id = "IdEstilo">
           <?php
           $sentencia = "SELECT * FROM estilos";
           if(!($resultado2 = $mysqli->query($sentencia))) {
             echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
             echo '</p>';
             exit;
           }


           while($fila2=mysqli_fetch_assoc($resultado2)){
              echo "<option value='{$fila2['IdEstilo']}'>{$fila2['Descripcion']}</option>";
           }




           $resultado2->close();
           $mysqli->close();
           ?>
         </select></p>
         <input type="submit" value="Modificar estilo"/>
         </form></p>
         <form action="solicitar.php">
             <input type="submit" value="Solicitar album" />
         </form>
       </div>
   </div>
 </main>


 <?php

 require_once 'footer.inc';

  ?>
