<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'logged.inc';
require_once 'config.inc';

 ?>

<main>
  <?php

  $idUsu = $_GET['id'];

  $sentencia = "SELECT * FROM fotos f join albumes a on a.IdAlbum = f.Album left join paises p on f.Pais = p.IdPais where a.Usuario = '{$_GET["id"]}' order by f.Fecha desc ";

  if(!($resultado = $mysqli->query($sentencia))) {
    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
    echo '</p>';
    exit;
  }

  $i = 0;

  while($fila = mysqli_fetch_assoc($resultado)) {
    echo "<div id='foto$i'>";
    echo "<h3>{$fila['Titulo']}</h3>";
    echo "<a href='foto.php?id={$fila['IdFoto']}'><img src='upload/{$fila['Fichero']}' width='200' alt='{$fila['Alternativo']}'></a>";
    echo "<p>{$fila['Fecha']}</p>";
    echo "<p>{$fila['NomPais']}</p>";
    echo "</div>";
    echo <<<p

    <p><form action="deletePic.php?id=$idUsu" method = 'post'>
        <input type="hidden" name="IdFoto" id="hiddenField" value="{$fila['IdFoto']}" />
        <input type="submit" value="Eliminar Foto" />
    </form></p>

p;
    $i++;
  }
  if($i == 0){
    echo "<p><b>NNo tiene fotos</b></p>";
    exit;
  }




  $resultado->close();
  $mysqli->close();

   ?>
</main>

 <?php

 require_once 'footer.inc';

 ?>
