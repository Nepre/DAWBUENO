<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>

<?php
  $br = "<br>";
  $Titulo = filter_var($_POST["tit"], FILTER_SANITIZE_STRING);
  $Desc = filter_var($_POST["desc"], FILTER_SANITIZE_STRING);
  $Alt = filter_var($_POST["alt"], FILTER_SANITIZE_STRING);
  $pais = filter_var($_POST["pais"], FILTER_VALIDATE_INT);
  $album = filter_var($_POST["album"], FILTER_VALIDATE_INT);

  $fecha = $_POST["fecha"];
  $today = date("Y-m-d");

  if( $_FILES["fichero"]["name"] == ""){

    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = "usuario.php";

    echo "<script>
            alert('Seleccione un archivo.');
            window.location.href='http://$host$uri/$extra';
            </script>";

    exit;

  }



  //print_r($_FILES);

  //Se debería hacer que llevase cuidado con si el archivo lleva varios puntos pero me da bastante pereza
  $file = $_FILES["fichero"]["name"];
  $filename = explode(".", $_FILES["fichero"]["name"])[0];
  $extension = explode(".", $_FILES["fichero"]["name"])[1];

  //echo $filename . $br;
  //echo $extension . $br;
  $exists = true;
  $i = 0;

  do {
    if(file_exists("upload/" . $file))
     {
      //echo $file . " ya existe" .$br;
      $file = $filename . $i .".".$extension;
      //echo "Renombrando a " . $file.$br;
      $i = $i + 1;
     }
     else
     {
      move_uploaded_file($_FILES["fichero"]["tmp_name"],
                    "upload/" . $file);
      //echo "Almacenado en: " . "upload/" . $file.$br;
      $exists = false;
     }
  } while ($exists);

  if(strlen($_POST["pais"]) == 0){
     $sentencia = "INSERT INTO fotos VALUES (null, '$Titulo', '$Desc', '$fecha', null , $album, '$file', '$Alt', '$today') ";
  }
  else{
    $sentencia = "INSERT INTO fotos VALUES (null, '$Titulo', '$Desc', '$fecha', $pais , $album, '$file', '$Alt', '$today') ";
  }




  if (!mysqli_query($mysqli, $sentencia)) {
      //echo "Error: " . $sentencia . "" . mysqli_error($mysqli);
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
