<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>
<main>
  <!DOCTYPE html>
  <html lang="es">
  <head>
  <meta charset="utf-8" />
  <title>Prueba de subir fichero</title>
  </head>
  <body>
  <form action="subirfichero.php" method="post" enctype="multipart/form-data">
  Fichero: <input type="file" name="fichero" />
  <br />
  <input type="submit" value="Enviar" />
  </form>
  </body>
  </html>
</main>
 <?php

 require_once 'footer.inc';

  ?>
