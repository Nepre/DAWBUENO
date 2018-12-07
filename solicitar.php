<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'logged.inc';
require_once 'config.inc';

 ?>

 <main>
   <p id="descSol">
     Mediante esta opción puedes solicitar la impresión y envío de uno de tus álbumes a todo color, toda la resolución. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
     consequat.
   </p>
   <table id="tabla">
     <tr id=tittabla>
       <th>Concepto</th>
       <th>Tarifa</th>
     </tr>

     <tr>
       <th>&lt; 5 páginas</th>
       <th>0.10€ por pág.</th>
     </tr>

     <tr>
       <th>entre 5 y 10 páginas</th>
       <th>0.08€ por pág.</th>
     </tr>

      <tr>
       <th>>11 páginas</th>
       <th>0.07€ por pág.</th>
     </tr>

     <tr>
       <th>Blanco y negro</th>
       <th>0€</th>
     </tr>

     <tr>
       <th>Color</th>
       <th>0.05€ por foto</th>
     </tr>

     <tr>
       <th>Resolución >300dpi </th>
       <th>0.02€ por foto</th>
     </tr>

   </table>
   <form id="formSolCheck" action="solicitarCheck.php?id=24" method="post">
       <p>
         <label for="nom">Nombre y apellidos</label> <input id="nom" type="text"  maxlength="200" name="nomApell" maxlength="200" placeholder="Nombre" required><label>(*)</label>
       </p>

       <p>
         <label for="tit">Título</label> <input id="tit"  maxlength="200" type="text" name="titulo" maxlength="200" placeholder="Título" required><label>(*)</label>
       </p>

       <p>
         <label for="ad">Descripción</label> <input id="ad"  maxlength="4000" type="text" name="textAdici" maxlength="4000" placeholder="Texto" required><label>(*)</label>
       </p>

       <p>
         <label for="email">Email</label> <input id="email"  maxlength="200" type="text" name="email" maxlength="200" placeholder="Email" required><label>(*)</label>
       </p>
       <p><label for="dir">Dirección: </label>
       <input id="dir" type="text" name="calle" maxlength="200" placeholder="Calle" required>
       <input type="text" name="num" maxlength="200" placeholder="Número" required>
       <input type="text" name="piso" maxlength="200" placeholder="Piso" >
       <input type="text" name="localidad" maxlength="200" placeholder="Localidad" required>
       <input type="text" name="provincia" maxlength="200" placeholder="Provincia" required>
       <input type="text" name="pais" maxlength="200" placeholder="País" required> <label>(*)</label></p>


       <p><label for="tfn">Número de teléfono </label> <input id="tfn" type="text" name="textAdici" maxlength="9" placeholder="### ## ## ##"></p>

       <p><label for="color">Color de la portada </label><input type="color" id="color" name="color" value="#000000"/></p>


       <p><label for="num">Número de copias </label><input id="num" type="number" name="quantity" min="1" value="1" required><label>(*)</label></p>

       <p><label for="res">Resolución </label><input id="res" type="range" name="quantity" min="150" value="150" max="900" step="150" onchange="document.getElementById('outRes').textContent=this.value"><output id="outRes">150</output></p>

       <p>
       <?php

       if($mysqli->connect_errno) {
       echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
       echo '</p>';
       exit;
       }
       $sentencia = mysqli_real_escape_string($mysqli, "SELECT * FROM Albumes");
       if(!($resultado = $mysqli->query($sentencia))) {
         echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
         echo '</p>';
         exit;
       }

       echo '<p><label for="album">Álbum: </label><select id="album" name="album" required>';
       echo "<option value=''></option>";
       while($fila=mysqli_fetch_assoc($resultado)){
          echo "<option value = '{$fila['IdAlbum']}'>{$fila['Titulo']}</option>";
       }

       echo "</select><br></p>";

       $resultado->close();
       $mysqli->close();

        ?>

       <p><label for="fecha">Fecha de recepción</label> <input id="fecha" type="date" name="envio"></p>

       <p><label for="bn">Elija tinta</label>


         <input type="radio" name="bncl" id="bn" value="bn" checked="checked"> <label for="bn"> Blanco y negro</label>
         <input type="radio" name="bncl" id="cl" value="cl"> <label for="cl"> Color</label>
       </p>
     <p><input type="submit" value="Submit" value="Solicitar"/></p>
   </form>
 </main>


 <?php

 require_once 'footer.inc';

  ?>
