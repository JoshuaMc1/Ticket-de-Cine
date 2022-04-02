<?php
try {
    //$sname = "212.107.17.52";
    //$uname = "u108712096_cinema";
    //$passw = "Cinemaweb2";
    //$db = "u108712096_cinema";

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
