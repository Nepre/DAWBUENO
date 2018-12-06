<?php

if(isset($_COOKIE['usu']) && isset($_COOKIE['pwd']) && !isset($_SESSION['logged']))
{
  $host = $_SERVER['HTTP_HOST'];
  $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'controlAcceso.php?cookie=y';
  $unD = unserialize($_COOKIE['time']);
  if(strlen($unD['minutes']) < 2){
    $min = '0' . $unD['minutes'];
  }
  else{
    $min = $unD['minutes'];
  }
  $date = $unD['mday'] . "/" . $unD['mon'] . "/" . $unD['year'] . " a las " . $unD['hours'] . ":" . $min;
echo <<<EOL
<div id="log2">
  <div id="login2">
  <p>Bienvenido de nuevo {$_COOKIE['usu']}</p>
  <p>Su última visita fue el $date</p>

  <input type="button" onclick="location.href='controlAcceso.php?acceder=y';" value="Acceder">
  <input type="button" onclick="location.href='controlAcceso.php?salir=y';" value="Salir">
</div>
</div>
EOL;

  //header("Location: http://$host$uri/$extra");
}
else if(!isset($_SESSION['logged'])){
echo <<<EOL
  <div id="log">
    <form id="login" action="controlAcceso.php" method="post">
        <label for="usu">Login: </label><input type="text" id="usu" name="usu"><br>
        <label for="pwd">Contraseña: </label><input type="password" id="pwd" name="pwd"><br>
        <a href="registro.php">Registro</a><br>
        <a href="index.php">No recuerdo mi contraseña</a><br>
        <label for="remember" id="remLab">Recordar mis datos  </label> <input type="checkbox" id="remember" name="remember">
        <br><input type="submit" value="Entrar"><br>
      </form>
  </div>
EOL;

}


 ?>
