<body>

  <header>
    <div id="titPag">
      <h1><a href="index.php">P.I.</a></h1>
      <br>
    </div>
    <div id="menu">
      <nav>
          <ul>
              <li><a href="index.php">Inicio</a></li>
              <li><a href="busca.php">Búsqueda</a></li>
              <?php
              if(isset($_COOKIE[session_name()]) && isset($_SESSION['logged'])){
                echo '<li><a href="usuario.php">Usuario</a></li>';
                echo '<li><a href="controlAcceso.php?salir=y">Salir</a></li>';
                setcookie('time', serialize(getdate()), time() + 90 * 24 * 60 * 60);
              }
              ?>


          </ul>
          <br>
      </nav>
    </div>
  </header>
