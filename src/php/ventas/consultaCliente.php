<?php
if (isset($_POST['dni'])) {
    if ($_POST['dni'] != "") {
        $dni = $_POST['dni'];
        include("../database/connection.php");
        header('Content-Type: application/json');
        $response = array();
        $sentencia = mysqli_query($conection, "SELECT * FROM clientes WHERE dniCliente='$dni' AND statusCliente='1'");

        if (mysqli_num_rows($sentencia) > 0) {
            $data = mysqli_fetch_assoc($sentencia);

            $id = $data['idcliente'];
            $nombre = $data['nombresCliente'];
            $apellido = $data['apellidosCliente'];
            $edad = $data['edadCliente'];
            $genero = $data['idGenero'];

            $response = array(
                "id" => $id,
                "nombre" => $nombre,
                "apellido" => $apellido,
                "edad" => $edad,
                "genero" => $genero
            );
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        }else {
            $response = array(
                'data' => 'noData'
            );
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        }
        exit;
    }
}
