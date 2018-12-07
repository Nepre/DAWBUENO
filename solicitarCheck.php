<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'logged.inc';
require_once 'config.inc';

 ?>

<main>
  <div id="solCheck">
    <p><b>Se ha registrado correctamente el pedido:</b></p>
    <p>Nombre y apellidos: <b><?php echo $_POST["nomApell"];?></b></p>
    <p>Título: <b><?php echo $_POST["titulo"];?></b></p>
    <p>Texto adicional: <b><?php echo $_POST["textAdici"];?></b></p>
    <p>Email: <b><?php echo $_POST["email"];?></b></p>
    <p>Dirección:<?php
        $dir= $_POST["name"] . $_POST["num"] . $_POST["piso"] . $_POST["localidad"] . $_POST["provincia"] . $_POST["pais"];
        echo $dir; ?></p>
    <p>Calle: <b><?php echo $_POST["calle"] ;?></b></p>
    <p>Número: <b><?php echo $_POST["num"] ;?></b></p>
    <p>Piso: <b><?php echo $_POST["piso"] ;?></b></p>
    <p>Localidad: <b><?php echo $_POST["localidad"] ;?></b></p>
    <p>Provincia: <b><?php echo $_POST["provincia"] ;?></b></p>
    <p>País: <b><?php echo $_POST["pais"] ;?></b></p>
    <p>Color de fondo: <b><?php echo $_POST["color"] ;?></b></p>
    <p>Número de copias: <b><?php echo $_POST["num"] ;?></b></p>
    <p>Resolución: <b><?php echo $_POST["quantity"] ;?></b> </p>
    <p>Album: <b><?php echo $_POST["album"] ;?></b></p>
    <p>Fecha de recepción: <b><?php echo $_POST["envio"] ;?></b></p>
    <p>Tinta:
      <b><?php
      if($_POST["bncl"] == "bn"){ echo "Blanco y negro";}
      else { echo "Color"; }
      ?></b>
    </p>
    <br>

    <?php
     $pag=15;
     $precio=0;
     $fotos=20;

     if($pag < 5){
       $precio = $pag * 0.10;
     }else if($pag >= 5 && $pag <= 10){
       $precio = $pag * 0.08;
     }else{
      $precio = $pag * 0.07;
     }

     if(!$_POST["bncl"] == "bn"){
      $precio += $fotos * 0.05;
     }
      if($_POST["quantity"] > 300){
       $precio +=  $fotos * 0.02;
      }

      echo "<p><strong>Coste: $precio € </strong></p>";

      $album = filter_var($_POST["album"], FILTER_SANITIZE_INT);
      $nom = filter_var($_POST["nomApell"], FILTER_SANITIZE_STRING);
      $tit = filter_var($_POST["titulo"], FILTER_SANITIZE_STRING);
      $des = filter_var($_POST["textAdici"], FILTER_SANITIZE_STRING);
      $email = $_POST["email"];
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      list($name, $domain) = explode("@", $email);
      $domain = explode(".", $domain);

      if( strlen($domain[sizeof($domain)-1]) < 2 || strlen($domain[sizeof($domain)-1]) > 4){
        $host = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'solicitar.php';
        echo "<script>
                alert('El email no cumple las especificaciones de dominio.');
                window.location.href='http://$host$uri/$extra';
                </script>";
        exit;
      }
      $col = filter_var($_POST["color"], FILTER_SANITIZE_STRING);
      $cop = filter_var($_POST["num"], FILTER_SANITIZE_INT);
      $res = filter_var($_POST["quantity"], FILTER_SANITIZE_INT);
      $fecha = $_POST["envio"];
      $today = date("Y-m-d");

      if($fecha<$today){
        $host = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'solicitud.php';
        echo "<script>
                alert('No puedes pedir envios al pasado.');
                window.location.href='http://$host$uri/$extra';
                </script>";
        exit;
      }
      $col2=0;
      if($_POST["bncl"] == "bn"){ $col2=1;}

      $sentencia = "INSERT INTO solicitud VALUES (null, $album, $nom, $tit, $dec, $email, $dir, $col, $cop, $res, $fecha, $col2, $today, $coste )";
      if (!mysqli_query($mysqli, $sentencia)) {
          echo "Error: " . $sentencia . "" . mysqli_error($mysqli);
       }  
    ?>
    <br>
    <a href="usuario.php"id="bot">Aceptar</a>
  </div>
</main>


<?php

require_once 'footer.inc';

 ?>
