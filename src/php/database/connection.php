<?php
try {
    //$sname = "212.107.17.52";
    //$uname = "u108712096_cinema";
    //$passw = "Cinemaweb2";
    //$db = "u108712096_cinema";

    $sname = "212.107.17.52";
    $uname = "u108712096_pcinema";
    $passw = "Pcinema2";
    $db = "u108712096_pcinema";

    $conection = mysqli_connect($sname, $uname, $passw, $db);

    if (!$conection) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
