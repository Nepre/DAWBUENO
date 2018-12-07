<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>

<?php
  $sentencia = "INSERT INTO albumes VALUES (null, '{$_POST['tit']}', '{$_POST['desc']}', {$_GET['id']})";

  if (!mysqli_query($mysqli, $sentencia)) {
      echo "Error: " . $sentencia . "" . mysqli_error($mysqli);
   }
   else{
     $host = $_SERVER['HTTP_HOST'];
     $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
     $extra = 'usuario.php';
     echo "<script>
             alert('Album {$_POST['tit']} creado.');
             window.location.href='http://$host$uri/$extra';
             </script>";
     exit;
   }

 ?>

 <?php

 require_once 'footer.inc';

  ?>
