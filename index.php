<?php
//TODO he usado la varbaile $paginaActual para contar las páginas.
//Implementar contador para las páginas.

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'acceso.inc';
require_once 'config.inc';

//print_r $_SESSION;
 ?>

 <main>
    <?php
    $paginaActual = 1;
    $fin = false;
    if(isset($_GET['pagina'])){$paginaActual = $_GET['pagina'];}

    if($mysqli->connect_errno) {
    echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
    echo '</p>';
    exit;
    }

    $offSet = ($paginaActual - 1) * 5;
    $sentencia = mysqli_real_escape_string($mysqli, "SELECT * FROM fotos f left join paises p on f.Pais = p.IdPais limit 5 offset $offSet"); //TODO ORDER BY
    if(!($resultado = $mysqli->query($sentencia))) {
      echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
      echo '</p>';
      exit;
    }
    echo "<div class='fotos'>";
    for ($i=0; $i < 5; $i++) {
      $fila = mysqli_fetch_assoc($resultado);
      if($i == 0 && $fila['Titulo'] == "") echo "No hay imágenes en esta página";
      //print_r($fila);
      echo "<div id='foto$i'>";
      echo "<h3>{$fila['Titulo']}</h3>";
      echo "<a href='foto.php?id={$fila['IdFoto']}'><img src='{$fila['Fichero']}' width='200' alt='{$fila['Alternativo']}'></a>";
      echo "<p>{$fila['FRegistro']}</p>";
      if($fila['NomPais']=="" && $fila['Titulo'] != "" ){
          echo "<p>No hay país</p>";
      }
      else{
      echo "<p>{$fila['NomPais']}</p>";
      }
      if($fila['Titulo'] == "") $fin = true;
      echo "</div>";
      echo "<br>";
    }
    $resultado->close();
    $mysqli->close();

    ?>

       </div>
       <?php

       if($paginaActual > 1){
        $paginaPrev = $paginaActual - 1;
        echo "<a href='index.php?pagina=$paginaPrev' id='pre'>Previa</a>";
      }
       ?>

       <?php
       if(!$fin){
         $paginaSiguiente = $paginaActual +1;
         echo "<a href='index.php?pagina=$paginaSiguiente'>Siguiente</a>";
       }  ?>

  </main>

 <?php

 require_once 'footer.inc';

  ?>
