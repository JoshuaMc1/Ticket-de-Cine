<?php
if($_SERVER ['REQUEST_METHOD']==='POST'){
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $genero = $_POST['genero'];
    $sala = $_POST['sala'];
    $asientos = $_POST['asiento'];
    $pelicula = $_POST['pelicula'];
    $idC ="";
    $bool = [false, false];

    $contA = count($asientos);

    if(verificarUsuario($dni)){
        $idC = $_POST['idCliente'];
        $bool[0] = true;
    }else{
        require("../database/connection.php");
        $sentenciaCliente = mysqli_query($conection, "INSERT INTO clientes(dniCliente, nombresCliente, apellidosCliente, edadCliente, idGenero, statusCliente) VALUES('$dni','$nombre','$apellido','$edad','$genero','1')");
        $bool[0] = true;
        $idC = clientID($conection, $dni);
        require("../database/close_connection.php");
    }

    $bool[1] = guardarAsiento($asientos, $contA, $idC, $sala, $pelicula);
    if($bool[0] == true && $bool[1] == true){
        echo '
            <script>
                window.location = "../../../pages/ventas?status=success";
            </script>
        ';
    }else{
        echo '
            <script>
                window.location = "../../../pages/ventas?status=unexpected";
            </script>
        ';
    }
}else{
    echo '
        <script>
            window.location = "../../../pages/ventas?status=unexpected";
        </script>
    ';
}

function guardarAsiento($asientos, $contA, $idC, $idSala, $idPel){
    require("../database/connection.php");
    $fecha = extraerFechaPelicula($conection, $idPel);
    for($i = 0; $i < $contA; $i++){
        mysqli_query($conection, "INSERT INTO asientocliente(idCliente, idSala, asientoReservado, idPelicula, fechaPelicula, status) VALUES('$idC','$idSala','$asientos[$i]','$idPel','$fecha','1')");
    }
    return true;
}

function extraerFechaPelicula($conection, $idPel){
    $sentencia = mysqli_query($conection, "SELECT * FROM peliculasala WHERE idPelicula='$idPel' AND status='1'");
    $data = mysqli_fetch_assoc($sentencia);
    return $data['diaEstreno'];
}

function verificarUsuario($dni){
    require("../database/connection.php");
    $sql = mysqli_query($conection, "SELECT * FROM clientes WHERE dniCliente='$dni' AND statusCliente='1'");
    if(mysqli_num_rows($sql) > 0)return true;
    else return false;
    require("../database/close_connection.php");
}

function clientID($conection, $dni){
    $sql = mysqli_query($conection, "SELECT * FROM clientes WHERE dniCliente='$dni' AND statusCliente='1'");
    $res = mysqli_fetch_assoc($sql);
    return $res['idCliente'];
}