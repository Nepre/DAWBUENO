<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>
<?php
 if ($_POST["pwd"] != $_POST["pwd2"]) {
   $host = $_SERVER['HTTP_HOST'];
   $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
   $extra = 'registro.php';
   echo "<script>
           alert('Las contraseñas deben ser iguales.');
           window.location.href='http://$host$uri/$extra';
           </script>";
   exit;
 }
 else{
   echo <<<DocIn
   <p>
   Usuario: <b>{$_POST["usu"]}</b>
   <br />
   Contraseña: <b>{$_POST["pwd"]}</b>
   <br />
   Contraseña redo: <b>{$_POST["pwd2"]}</b>
   <br />
   Email: <b>{$_POST["mail"]}</b>
   <br />
   Ciudad: <b>{$_POST["ciudad"]}</b>
   <br />
   Pais: <b>{$_POST["pais"]}</b>
   <br />
   Sexo: <b>{$_POST["sexo"]}</b>
   </p>
DocIn;
 }
?>
<?php

require_once 'footer.inc';

 ?>
