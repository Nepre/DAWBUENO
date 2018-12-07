<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';
require_once 'logged.inc';
 ?>
   <form action="eliminarUsuario.php?id=<?php echo $_GET['id']; ?>" method="post">
    <label for='pwd'>Escriba contraseña para confirmar: </label><input type='password' id='pwd' name='pwd' value='' required><br>
    <input type="submit" value="Eliminar cuenta"></input>
   </form>


<?php

require_once 'footer.inc';

 ?>
