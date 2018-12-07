<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'config.inc';

 ?>

  <main>

    <form class="" action="queryAlbum.php?id=<?php echo $_GET['id'] ?>" method="post">
      <label for="tit">Titulo: </label><input type="text" id="tit" name="tit"><br>
      <label for="desc">Descripcion: </label><input id="desc" name="desc"><br>
      <input type="submit" value="Crear album"></input> <br><br>
    </form>

    <p><form action="queryAlbum.php">
        <input type="submit" value="Volver" />
    </form></p>

  </main>


 <?php

 require_once 'footer.inc';

  ?>
