<?php

$title = "P.I.";

require_once 'cabecera.inc';
require_once 'inicio.inc';
require_once 'logged.inc';

 ?>

 <main>
   <div id="fotoEsp">
     <?php

        if($_GET["id"] % 2 != 0){
          echo "<h3>Jon Landini</h3>
          <img src='jon.jpg' width='399' alt='jon'>
          <ul>
              <li>20/09/2018</li>
              <li>España</li>
              <li>Álbum: Animales graciosos</li>
              <li>Usuario: Mariano Rajoy</li>
          </ul>";
        }
        else{
          echo "<h3>Ciao? ciao</h3>
          <img src='ciao.jpg' width='399' alt='jon'>
          <ul>
              <li>20/09/2018</li>
              <li>Italia</li>
              <li>Álbum: Mascotas de Mudiales</li>
              <li>Usuario: Pedro Sanchez</li>
          </ul>";
        }

      ?>


   </div>
   <div class="push"></div>
 </main>

 <?php

 require_once 'footer.inc';

 ?>
