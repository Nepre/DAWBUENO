<?php
    $host = 'localhost';   // El servidor
    $user =  'wwwdata';    // El usuario
    $password = '';          // La contraseña
    $database = 'pidb';
    $mysqli = new mysqli();
    $mysqli->connect($host, $user, $password, $database);
    if (mysqli_connect_errno()) {
        exit('Connect failed: '. mysqli_connect_error());
    }
    mysqli_query($mysqli,"SET CHARACTER_SET_CLIENT='utf8'");
    mysqli_query($mysqli,"SET CHARACTER_SET_RESULTS='utf8'");
    mysqli_query($mysqli,"SET CHARACTER_SET_CONNECTION='utf8'");
?>
