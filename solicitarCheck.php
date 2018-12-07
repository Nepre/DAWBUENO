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
    <p>Dirección:</p>
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

      $sentencia = "INSERT INTO usuarios VALUES (null, )";
    ?>
    <br>
    <a href="usuario.php"id="bot">Aceptar</a>
  </div>
</main>


<?php

require_once 'footer.inc';

 ?>
