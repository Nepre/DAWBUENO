

<?php
  require_once 'config.inc';

  $usu = array ();
  $arrayUsu = array ();

  if($mysqli->connect_errno) {
  echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
  echo '</p>';
  exit;
  }
  $sentencia = mysqli_real_escape_string($mysqli, "SELECT * FROM usuarios u join estilos e on u.Estilo = e.IdEstilo");
  if(!($resultado = $mysqli->query($sentencia))) {
    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
    echo '</p>';
    exit;
  }
  while($fila=mysqli_fetch_assoc($resultado)){
    $usu[0] = $fila["NomUsuario"];
    $usu[1] = $fila["Clave"];
    $usu[2] = $fila["Fichero"];
    array_push($arrayUsu, $usu);
  }


  $correctUsu = false;
  $extra = 'index.php';
  session_start();

  if(isset($_GET['acceder'])){
    //echo "acceder <br>";
    $usuPost = $_COOKIE["usu"];
    $pwdPost = $_COOKIE["pwd"];
    setcookie('time', serialize(getdate()), time() + 90 * 24 * 60 * 60);
  }
  else{
    if(isset($_GET['salir'])){
       //echo "salir<br>";
       setcookie('usu', '', time() - 3600);
       setcookie('usuSes', '', time() - 3600);
       setcookie('pwd', '', time() - 3600);
       setcookie('session', '', time() - 3600);
       setcookie('estilo', '', time() - 3600);
       setcookie('time', '', time() - 3600);

      //print_r($_COOKIE);
      $host = $_SERVER['HTTP_HOST'];
      $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra2 = "index.php";
      
      $_SESSION = array();
      //echo "salimos";
      if(isset($_COOKIE[session_name()])){
        unset($_COOKIE['session']);
        setcookie(session_name(), '', time()-42000, '/');
        setcookie('session', '', time()-42000, '/');

      }

      header("Location: http://$host$uri/$extra2");
    }
    else{
      $usuPost = $_POST["usu"];
      $pwdPost = $_POST["pwd"];
    }
  }
  if(!isset($_GET['salir'])){
    foreach ($arrayUsu as $usu) {
      $host = $_SERVER['HTTP_HOST'];
      $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');



      if($usuPost == $usu[0] && $pwdPost == $usu[1]){
        $extra = 'usuario.php';
        $correctUsu = true;
        $_SESSION['estilo'] = $usu[2];
        //echo $usu[2];
        break;
      }
    }
    if($correctUsu){
      header("Location: http://$host$uri/$extra");
      setcookie('usu', $usuPost, time() + 90 * 24 * 60 * 60);
      $_SESSION['logged'] = true;
      setcookie('session',"true", time() + 90 * 24 * 60 * 60);
      if(!(isset($_COOKIE['usu']) && isset($_COOKIE['pwd'])) && isset($_POST['remember'])){
        setcookie('pwd', $pwdPost, time() + 90 * 24 * 60 * 60);
        setcookie('time', serialize(getdate()), time() + 90 * 24 * 60 * 60);
      }
      //echo "dentro <br>";
      //echo session_id() . "  " . session_name() . "<br/>\n";
    }
    else{
      if(isset($_GET['acceder'])){
        echo "<script>
                alert('Las cookies han variado, usuario y contraseña no correctos.');
                window.location.href='http://$host$uri/$extra';
                </script>";
      }
      else{
        echo "<script>
                alert('Usuario y/o contraseña incorrectos.');
                window.location.href='http://$host$uri/$extra';
                </script>";
      }
    }
  }

  $resultado->close();
  $mysqli->close();
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
   </body>
 </html>
