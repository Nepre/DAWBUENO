<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>

   <main>
      <?php
      if (isset($_GET['Album'])){
        if($_GET['Album'] == ""){
          $host = $_SERVER['HTTP_HOST'];
          $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
          $extra = "index.php";
          header("Location: http://$host$uri/$extra");
        }
        $paginaActual = 1;

        if($mysqli->connect_errno) {
        echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
        echo '</p>';
        exit;
        }


        $sentencia = "SELECT * FROM fotos f join albumes a on a.IdAlbum = f.Album left join paises p on f.Pais = p.IdPais where a.IdAlbum = '{$_GET["Album"]}' order by f.Fecha desc ";
        if(!($resultado = $mysqli->query($sentencia))) {
          echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
          echo '</p>';
          exit;
        }

        $sentencia2 = "SELECT distinct(p.NomPais) FROM fotos f join albumes a on a.IdAlbum = f.Album left join paises p on f.Pais = p.IdPais where a.IdAlbum = '{$_GET["Album"]}' order by f.Fecha desc ";
        if(!($resultado2 = $mysqli->query($sentencia2))) {
          echo "<p>Error al ejecutar la sentencia <b>$sentencia2</b>: " . $mysqli->error;
          echo '</p>';
          exit;
        }


        $fila = mysqli_fetch_assoc($resultado);
        if($fila['Titulo'] != ""){
        echo "<p>Album: {$fila['Titulo']}</p>";
        echo "<p>Descripcion: {$fila['Descripcion']}</p>";
        echo "<p>Paises: </p>";
        while ($fila2 = mysqli_fetch_assoc($resultado2)) {
          echo "{$fila2['NomPais']} <br>";
        }
        echo "<p>Foto más reciente: {$fila['Fecha']}</p>";
      }
        $sentencia3 = "SELECT MIN(f.Fecha) Fecha FROM fotos f join albumes a on a.IdAlbum = f.Album left join paises p on f.Pais = p.IdPais where a.IdAlbum = '{$_GET["Album"]}' order by f.Fecha desc ";
        if(!($resultado3 = $mysqli->query($sentencia3))) {
          echo "<p>Error al ejecutar la sentencia <b>$sentencia3</b>: " . $mysqli->error;
          echo '</p>';
          exit;
        }
      //  print_r($resultado3);

        $fila3 = mysqli_fetch_assoc($resultado3);

        $buenAlbum = true;
        if($fila['Titulo'] == ""){
          echo "Este album esta vacio o no existe.";
          $buenAlbum = false;
        }

        if($buenAlbum) echo "<p>Foto más antigua: {$fila3['Fecha']}</p>";

        echo "<div class='fotos'>";
        $i = 0;
        do{
          //print_r($fila);
          if($buenAlbum){
            echo "<div id='foto$i'>";
            echo "<h3>{$fila['Titulo']}</h3>";
            echo "<a href='foto.php?id={$fila['IdFoto']}'><img src='{$fila['Fichero']}' width='200' alt='{$fila['Alternativo']}'></a>";
            echo "<p>{$fila['Fecha']}</p>";
            echo "<p>{$fila['NomPais']}</p>";
            echo "</div>";
            echo "<br>";
            $i++;
          }
        }while(  $fila = mysqli_fetch_assoc($resultado));
      }
      else {
        $host = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = "index.php";
        header("Location: http://$host$uri/$extra");
      }


      $resultado->close();
      $mysqli->close();


      ?>

         </div>
         <p><form action="usuario.php">
             <input type="submit" value="Volver" />
         </form></p>

    </main>


 <?php

 require_once 'footer.inc';

  ?>
