<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>
<?php
  $pwd = filter_var($_POST["pwd"], FILTER_SANITIZE_STRING);
  $pwd2 = filter_var($_POST["pwd2"], FILTER_SANITIZE_STRING);

  if($pwd != $pwd2){
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

   $email = $_POST["mail"];
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   list($name, $domain) = explode("@", $email);
   $domain = explode(".", $domain);

   if(sizeof($domain) > 2 || ( strlen($domain[1]) < 2 || strlen($domain[1]) > 4)){
     $host = $_SERVER['HTTP_HOST'];
     $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
     $extra = 'registro.php';
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
     $extra = 'registro.php';
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


   $sentencia = "INSERT INTO usuarios VALUES (null, '$usu', '$pwd', '$email', '$sexo', '$fecha', '$ciudad', $pais, 'jon.jpg', '$today', 1)";

   if (!mysqli_query($mysqli, $sentencia)) {
       echo "Error: " . $sentencia . "" . mysqli_error($mysqli);
    }

   echo <<<DocIn
   <p>Se ha creado el usuario:</p>
   <p>
   Usuario: <b>{$_POST["usu"]}</b>
   <br />
   Email: <b>{$_POST["mail"]}</b>
   <br />
   Ciudad: <b>{$_POST["ciudad"]}</b>
   <br />
   Pais: <b>{$_POST["pais"]}</b>
   <br />
   Sexo: <b>{$_POST["sexo"]}</b>
   </p>
   <p><form action="index.php">
       <input type="submit" value="Aceptar" />
   </form></p>
DocIn;
 }
?>
<?php

require_once 'footer.inc';

 ?>
