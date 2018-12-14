<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>

   <main>
     <h2>Resultados de la búsqueda:</h2>
     <p>
       Título: <b><?php if($_POST["titulo"]!="") echo $_POST["titulo"]; else echo "-------";?></b>
       <br>
       Fecha: <b><?php if($_POST["fecha"]!="") echo $_POST["fecha"]; else echo "-------";?></b>
       <br>
       País: <b><?php if($_POST["pais"]!="") echo $_POST["pais"]; else echo "-------";?></b>
     </p>

      <?php
      $paginaActual = 1;
      $where = '';
      $or1 = '';
      $or2 = '';
      $titulo = '';
      $pais = '';
      $fecha = '';
      if($_POST['titulo'] != "")$titulo ="f.Titulo LIKE '%{$_POST['titulo']}%'";
      if($_POST['pais'] != "")$pais = "'{$_POST['pais']}' = p.NomPais";
      if($_POST['fecha'] != "")$fecha = "'{$_POST['fecha']}' = f.Fecha";
      $num = -1;
      if($mysqli->connect_errno) {
      echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
      echo '</p>';
      exit;
      }

      foreach ($_POST as $fila => $value) {
        if($value != "")$num++;
      }

      //print_r($_POST);
      //echo "num = $num";

      if($num != 0){
        $where = 'where';
      }

      $setAnd = false;
      $whereSent = '';
      if($_POST['titulo'] != ""){
        $whereSent .= $titulo;
        $setAnd = true;
      }
      if($_POST['pais'] != ""){
        if($setAnd){
          $whereSent .= " and ";
          $setAnd = false;
        }
        $whereSent .= $pais;
        $setAnd = true;
      }
      if($_POST['fecha'] != ""){
        if($setAnd){
          $whereSent .= " and ";
        }
        $whereSent .= $fecha;
      }
      $sentencia =  "SELECT * FROM fotos f left join paises p on f.Pais = p.IdPais $where $whereSent";
      if(!($resultado = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
      }
      echo "<div class='fotos'>";
      $i = 0;
      while($fila = mysqli_fetch_assoc($resultado)) {
        echo "<div id='foto$i'>";
        echo "<h3>{$fila['Titulo']}</h3>";
        echo "<a href='foto.php?id={$fila['IdFoto']}'><img src='upload/{$fila['Fichero']}' width='200' alt='{$fila['Alternativo']}'></a>";
        echo "<p>{$fila['Fecha']}</p>";
        echo "<p>{$fila['NomPais']}</p>";
        echo "</div>";
        echo "<br>";
        $i++;
      }
      if($i == 0){
        echo "<p><b>No se han encontrado fotos que correspondan con tus parámetros de búsqueda</b></p>";
        exit;
      }

      $resultado->close();
      $mysqli->close();

      ?>

         </div>


    </main>


 <?php

 require_once 'footer.inc';

  ?>
