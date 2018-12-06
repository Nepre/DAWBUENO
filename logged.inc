<?php
  if(!isset($_COOKIE[session_name()]) || !isset($_SESSION['logged'])){
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php';
    echo "<script>
            alert('Necesitas iniciar sesión para visitar esta parte de la página.');
            window.location.href='http://$host$uri/$extra';
            </script>";
  }


 ?>
