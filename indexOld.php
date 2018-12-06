<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'acceso.inc';

//print_r $_SESSION;
 ?>

 <main>
    <?php// echo $message ?>
       <div class="fotos">
         <div id="foto">
           <h3>Jon Landini</h3>
           <a href="foto.php?id=1"><img src='jon.jpg' width="200" alt='jon'></a>
           <p>20/09/2018</p>
           <p>España</p>

         </div>

         <div id="foto1">
           <h3>Ciao</h3>
           <a href="foto.php?id=2"><img src='ciao.jpg' width="200" alt='jon'></a>
           <p>20/09/2018</p>
           <p>España</p>

         </div>

         <div id="foto2">
           <h3>Jon Landini</h3>
           <a href="foto.php?id=3"><img src='jon.jpg' width="200" alt='jon'></a>
           <p>20/09/2018</p>
           <p>España</p>

         </div>

         <div id="foto3">
           <h3>Ciao</h3>
           <a href="foto.php?id=4"><img src='ciao.jpg' width="200" alt='jon'></a>
           <p>20/09/2018</p>
           <p>España</p>

         </div>

         <div id="foto4">
           <h3>Jon Landini</h3>
           <a href="foto.php?id=5"><img src='jon.jpg' width="200" alt='jon'></a>
           <p>20/09/2018</p>
           <p>España</p>

         </div>

       </div>

  </main>

 <?php

 require_once 'footer.inc';

  ?>
