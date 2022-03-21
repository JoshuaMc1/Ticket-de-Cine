<?php
try {
    $sname = "localhost";
    $uname = "root";
    $passw = "";
    $db = "prb_login";

    $conection = mysqli_connect($sname, $uname, $passw, $db);

    if (!$conection) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
