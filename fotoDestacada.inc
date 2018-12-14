<?php

    $urlF = "fotos.json";

    $dataF = file_get_contents($urlF);
    $jsonF = json_decode($dataF);
    echo "<div class ='fotoDestacada'>";
    $numF = rand(0, sizeof($jsonF)-1);
    echo " <h3>Foto destacada:</h3>";

    $sentenciaF = "SELECT * FROM fotos where Fichero = '{$jsonF[$numF]->fichero}'";

    if(!($resultadoF = $mysqli->query($sentenciaF))) {
      exit;
    }
    $resFinF = $resultadoF->fetch_assoc();
    if($resFinF['Titulo'] != ""){

      echo "<h4>{$resFinF['Titulo']}</h4>";
      echo "<a href='foto.php?id={$resFinF['IdFoto']}'><img src='upload/{$resFinF['Fichero']}' width='200' alt='{$resFinF['Alternativo']}'></a>";
      echo "<ul>";
      echo "<p>Recomendada por: ".$jsonF[$numF]->nombre."</p>" ;
      echo "<p>".$jsonF[$numF]->razon."</p>";


    }
    echo "</div>";
    echo "<hr>";

 ?>
