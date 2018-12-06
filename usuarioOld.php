<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';

require_once 'logged.inc'

 ?>

 <main>
   <div class="general">
        <p><label id="usuLab">¡Hola <?php echo $_COOKIE["usu"] ?>!</label></p>
       <div id="fotoLab">
         <img src='jon.jpg' width="200" alt='jon'>
       </div>
       <div>
         <p><label id="usuLab"><?php echo $_COOKIE["usu"] ?></label></p>
         <p><label>Email: </label><label id="mailLab">Mariano_Presi@gmail.com</label></p>
         <p><label>Sexo: </label><label id="sexoLab">Masculino</label></p>
         <p><label>Fecha de nacimiento: </label><time datetime="1955-03-27" id="fechaLab">27/03/1955</time></p>
         <p><label>Ciudad: </label><label id="ciudadLab">Madrid</label></p>
         <p><label>País: </label><label id="paisLab">España</label></p>
         <?php
         $host = $_SERVER['HTTP_HOST'];
         $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
         $extra = "usuario.php";
          ?>
         <p><button type="button" name="editDatos">Editar datos</button></p>
         <p><button type="button" name="darBaja">Darse de baja</button></p>
         <p><button type="button" name="logout">Logout</button></p>
         <p><button type="button" name="verAlbum">Ver álbumes</button></p>
         <p><button type="button" name="crearAlbum">Crear un álbum</button></p>
         <p><button type="button" name="darBaja">Darse de baja</button></p>
         <form action="solicitar.php">
             <input type="submit" value="Solicitar album" />
         </form>
       </div>
   </div>
 </main>


 <?php

 require_once 'footer.inc';

  ?>
