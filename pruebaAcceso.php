<?php

$title = "P.I.";
require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'acceso.inc';
require_once 'config.inc';

setcookie("usuario", 'Willyrex');

session_start();
 if(isset($_SESSION['contador']))
 {
   $_SESSION['contador'] = $_SESSION['contador'] + 1;
   $mensaje = 'Número de visitas: ' . $_SESSION['contador'];
 }
 else
 {
   $_SESSION['contador'] = 1;
   $mensaje = 'Bienvenido a nuestra página web';
 }


 echo "<br />\n";
 echo 'session_id(): ' . session_id();
 echo "<br />\n";
 echo 'session_name(): ' . session_name();
 echo "<br />\n";
 print_r(session_get_cookie_params());
 ?>

 <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Prueba de cookie</title>
</head>
<body>
<p>
<?php echo $mensaje; ?>
</p>
</body>
</html>
