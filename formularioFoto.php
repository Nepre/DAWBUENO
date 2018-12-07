<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>

<?php

  $Titulo = filter_var($_POST["tit"], FILTER_SANITIZE_STRING);
  $Desc = filter_var($_POST["desc"], FILTER_SANITIZE_STRING);
  $Alt = filter_var($_POST["alt"], FILTER_SANITIZE_STRING);
  $pais = filter_var($_POST["pais"], FILTER_VALIDATE_INT);
  $album = filter_var($_POST["album"], FILTER_VALIDATE_INT);

  $fecha = $_POST["fecha"];
  $today = date("Y-m-d");

  if(strlen($_POST["pais"]) == 0){
     $sentencia = "INSERT INTO fotos VALUES (null, '$Titulo', '$Desc', '$fecha', null , $album, 'jon.jpg', '$Alt', '$today') ";
  }
  else{
    $sentencia = "INSERT INTO fotos VALUES (null, '$Titulo', '$Desc', '$fecha', $pais , $album, 'jon.jpg', '$Alt', '$today') ";
  }







  if (!mysqli_query($mysqli, $sentencia)) {
      echo "Error: " . $sentencia . "" . mysqli_error($mysqli);
   }

   $host = $_SERVER['HTTP_HOST'];
   $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
   $extra = 'usuario.php';
   echo "<script>
           alert('Foto subida.');
           window.location.href='http://$host$uri/$extra';
           </script>";
   exit;

 ?>

 <?php

 require_once 'footer.inc';

  ?>
