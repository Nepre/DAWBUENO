<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'logged.inc';
require_once 'config.inc';

 ?>

 <main>
   <div id="fotoEsp">
     <?php

      if($_GET['id'] == ""){
        $host = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = "index.php";
        header("Location: http://$host$uri/$extra");
      }
       if($mysqli->connect_errno) {
       echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
       echo '</p>';
       exit;
       }
       $sentencia = <<<pedos
       SELECT
            a.Titulo as TitAlbum,
            f.Titulo as NomFot,
            f.Fecha,
            p.NomPais,
            a.Usuario,
            f.IdFoto,
            f.Alternativo,
            f.Fichero,
            u.NomUsuario,
            a.IdAlbum

         FROM fotos f
         left join paises p
            on f.Pais = p.IdPais
         left join albumes a
            on f.Album = a.IdAlbum
         left join usuarios u
            on a.Usuario = u.IdUsuario
         where IdFoto = {$_GET['id']}

pedos;
      $sentencia = mysqli_real_escape_string($mysqli, $sentencia);


       if(!($resultado = $mysqli->query($sentencia))) {
         echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
         echo '</p>';
         exit;
       }
       $resFin = $resultado->fetch_assoc();
       if($resFin['NomFot'] == ""){

         $host = $_SERVER['HTTP_HOST'];
         $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
         $extra = "index.php";
         header("Location: http://$host$uri/$extra");

       }
       //print_r($resFin);
       echo "<h3>{$resFin['NomFot']}</h3>";
       echo "<a href='foto.php?id={$resFin['IdFoto']}'><img src='{$resFin['Fichero']}' width='200' alt='{$resFin['Alternativo']}'></a>";
       echo "<ul>";
       echo "<li>{$resFin['Fecha']}<li>";
       echo "<li>{$resFin['NomPais']}<li>";
       echo "<li>Álbum:   <a href='verAlbum.php?Album={$resFin['IdAlbum']}'>{$resFin['TitAlbum']}</a><li>";
       echo "<li>Usuario: {$resFin['NomUsuario']}<li>";
       echo "</ul>";

       $resultado->close();
       $mysqli->close();
      ?>


   </div>

   <div class="push"></div>
 </main>

 <?php

 require_once 'footer.inc';

 ?>
