<!DOCTYPE html>
<html lang="es">

  <head>
      <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
      <?php
      session_start();
      $est = "estilo.css";
      //echo isset($_SESSION['estilo']);
      if(isset($_SESSION['estilo'])){ $est = $_SESSION['estilo'];}
      echo '<link rel="stylesheet" type="text/css" href="' . $est . '" title="Estilo básico" media ="screen"/>';

      /*

          if(isset($_COOKIE['estilo']) && $_COOKIE['estilo'] == 'b'){
            echo '<link rel="stylesheet alternate" type="text/css" href="estilo.css"
            title="Estilo básico" media ="screen"/>
            <link rel="stylesheet" type="text/css" href="accesible.css"
            title="Estilo accesible" media ="screen"/>';
          }
          else{
            echo '<link rel="stylesheet" type="text/css" href="estilo.css"
            title="Estilo básico" media ="screen"/>
            <link rel="stylesheet alternate" type="text/css" href="accesible.css"
            title="Estilo accesible" media ="screen"/>';
          }
          */
         ?>
      <meta charset="UTF-8">
      <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
      <title><?php echo $title; ?></title>
      <link rel="stylesheet" type="text/css" href="adaptativo.css" media ="screen" />
      <link rel="stylesheet" type="text/css" href="impresion.css" media="print" />
  </head>
