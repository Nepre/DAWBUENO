<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';
require_once 'logged.inc';
 ?>

<?php

  $id = $_GET['id'];
  $clave = $_POST['pwd'];
  echo $id;
  $sentencia = "DELETE FROM usuarios where IdUsuario = $id and Clave = \"$clave\"";
  $host = $_SERVER['HTTP_HOST'];
  $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

  if(isset($_SESSION['arrayAlb']) && sizeof($_SESSION['arrayAlb']) > 0){
    $arrayAlb = $_SESSION['arrayAlb'];
    $sentencia2 = "DELETE FROM fotos where ";

    for ($i=0; $i < sizeof($_SESSION['arrayAlb']) ; $i++) {
      $sentencia2 .= "Album = {$arrayAlb[$i]}";
      if($i+1 < sizeof($_SESSION['arrayAlb'])){
        $sentencia2 .= " or ";
      }
    }
    echo "<p>$sentencia2</p>";

    $sentencia3 = "DELETE FROM albumes where ";
    for ($i=0; $i < sizeof($_SESSION['arrayAlb']) ; $i++) {
      $sentencia3 .= "IdAlbum = {$arrayAlb[$i]}";
      if($i+1 < sizeof($_SESSION['arrayAlb'])){
        $sentencia3 .= " or ";
      }
    }

  }
  echo "$sentencia<br>";
  echo "$sentencia2<br>";
  echo "$sentencia3<br>";



  if (!mysqli_query($mysqli, $sentencia) ) {
      echo "<p><form action='Usuario.php'><input type='submit' value='Volver'/></form></p>";
      $extra = 'usuario.php';
      echo "<script>
              alert('Escriba la contraseña correcta.');
              window.location.href='http://$host$uri/$extra';
              </script>";
      exit;
   }
   else{
     mysqli_query($mysqli, $sentencia2);
     mysqli_query($mysqli, $sentencia3);
    $extra = 'controlAcceso.php?salir=y';
    echo "<script>
            alert('Usuario eliminado.');
            window.location.href='http://$host$uri/$extra';
            </script>";
    exit;

   }


 ?>

 <?php

 require_once 'footer.inc';

  ?>
