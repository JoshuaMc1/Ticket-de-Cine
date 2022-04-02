<?php
if (isset($_POST['dni'])) {
    if ($_POST['dni'] != "") {
        $dni = $_POST['dni'];
        include("../database/connection.php");
        header('Content-Type: application/json');
        $response = array();
        $sentencia = mysqli_query($conection, "SELECT * FROM clientes WHERE dniCliente LIKE '%$dni%' AND statusCliente='1'");

        $data = mysqli_fetch_all($sentencia);

        $id = $data['idCliente'];
        $nombre = $data['nombreCliente'];
        $apellido = $data['apellidoCliente'];
        $edad = $data['edadCleinte'];
        $genero = $data['idGenero'];

        $response[] = array(
            "id" => $id,
            "nombre" => $nombre,
            "apellido" => $apellido,
            "edad" => $edad,
            "genero" => $genero
        );
        echo json_encode($response);
    }
}
