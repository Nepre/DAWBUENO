<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';

 ?>

 <main>
   <form id=formReg action="formularioRegistro.php?id=123" method="post">
       <label for="usu">Usuario: </label><input type="text" id="usu" name="usu"><br>
       <label for="pwd">Contraseña: </label><input type="password" id="pwd" name="pwd"><br>
       <label for="pwd2">Repita contraseña: </label><input type="password" id="pwd2" name="pwd2"><br>
       <label for="mail">Email: </label><input type="text" id="mail" name="mail"><br>

       <label for="fecha">Fecha de nacimiento: </label><input type="date" id="fecha" name="fecha"><br>
       <label for="ciudad">Ciudad: </label><input type="text" id="ciudad" name="ciudad"><br>
       <label for="pais">País: </label><input type="text" id="pais" name="pais"><br>
       <p><label for="sexo">Sexo: </label><select id="sexo" name="sexo"> <option>Hombre</option> <option>Mujer</option></select><br></p>
       <input type="file" name="file" id="foto" accept="image/*"><br>
     <input type="submit" value="Registrarse"></input> <br><br>

   </form>
 </main>


 <?php

 require_once 'footer.inc';

  ?>
