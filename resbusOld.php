<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';

 ?>

 <main>
   <h2>Resultados de la búsqueda:</h2>
   <p>
     Título: <b><?php if($_POST["titulo"] != "") {
       echo $_POST["titulo"];
     }
     else{
        echo "-------";
      }
      print_r($_POST);
        ?></b>
     <br>
     Fecha: <b><?php echo $_POST["fecha"];?></b>
     <br>
     País: <b><?php echo $_POST["pais"];?></b>
   </p>
   <?php  print_r($_POST);

   if(isset($_POST["fecha"]));

   ?>



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


   </div>

 <div class="push"></div>
 </main>


 <?php

 require_once 'footer.inc';

  ?>
