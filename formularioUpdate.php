<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';
require_once 'logged.inc';

 ?>
<?php
  $pwd = filter_var($_POST["pwd"], FILTER_SANITIZE_STRING);
  $pwd2 = filter_var($_POST["pwd2"], FILTER_SANITIZE_STRING);
  $pwd3 = filter_var($_POST["pwd3"], FILTER_SANITIZE_STRING);

  if($pwd2 != $pwd3){
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'datosusu.php';
    echo "<script>
            alert('Las contraseñas deben ser iguales.');
            window.location.href='http://$host$uri/$extra';
            </script>";
    exit;
  }
 else{

   $email = $_POST["mail"];
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   list($name, $domain) = explode("@", $email);
   $domain = explode(".", $domain);

   if(strlen($domain[sizeof($domain)-1]) < 2 || strlen($domain[sizeof($domain)-1]) > 4){
     $host = $_SERVER['HTTP_HOST'];
     $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
     $extra = 'datosusu.php';
     echo "<script>
             alert('El email no cumple las especificaciones de dominio.');
             window.location.href='http://$host$uri/$extra';
             </script>";
     exit;
   }
   $usu = filter_var($_POST["usu"], FILTER_SANITIZE_STRING);
   $ciudad = filter_var($_POST["ciudad"], FILTER_SANITIZE_STRING);
   $pais = filter_var($_POST["pais"], FILTER_VALIDATE_INT);
   $sexoSTR = filter_var($_POST["sexo"], FILTER_SANITIZE_STRING);
   $fecha = $_POST["fecha"];
   $today = date("Y-m-d");

   if($fecha>$today){
     $host = $_SERVER['HTTP_HOST'];
     $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
     $extra = 'datosusu.php';
     echo "<script>
             alert('No puedes haber nacido en el futuro.');
             window.location.href='http://$host$uri/$extra';
             </script>";
     exit;
   }

   switch ($sexoSTR) {
     case 'Hombre':
       $sexo = 1;
       break;

     default:
       $sexo =  2;
       break;
   }

   $sentenciaPWD = "SELECT IdUsuario, NomUsuario, Clave FROM usuarios WHERE IdUsuario = '{$_GET["id"]}'";
   if(!($resultado = $mysqli->query($sentenciaPWD))) {
     echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
     echo '</p>';
     exit;
   }

   $fila=mysqli_fetch_assoc($resultado);
   $idUsu = $fila['IdUsuario'];
   if($fila['Clave'] != $pwd){
     $host = $_SERVER['HTTP_HOST'];
     $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
     $extra = 'datosusu.php';
     echo "<script>
             alert('La contraseña actual no es correcta.');
             window.location.href='http://$host$uri/$extra';
             </script>";
     exit;
   }

   if(strlen($pwd2) == 0){
     $pwd2 = $pwd;
   }


   $sentencia = "UPDATE usuarios SET NomUsuario = '$usu', Clave = '$pwd2', Email = '$email', Sexo = '$sexo', FNacimiento = '$fecha', Ciudad = '$ciudad', Pais = $pais where IdUsuario = $idUsu";

   if (!mysqli_query($mysqli, $sentencia)) {
       echo "Error: " . $sentencia . "" . mysqli_error($mysqli);
    }
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'modificadoUpdate.php?id='. $_GET["id"];
    echo "<script>
            window.location.href='http://$host$uri/$extra';
            </script>";
    exit;
 }
?>
<?php

require_once 'footer.inc';

 ?>
