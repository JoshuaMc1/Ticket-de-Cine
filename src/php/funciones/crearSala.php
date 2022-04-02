<?php
if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {
        require("../database/connection.php");
        $idSala = $_GET['id'];
        $sentencia = mysqli_query($conection, "UPDATE salas SET status='0' WHERE idSala='$idSala'") or die("Error " . mysqli_error($conection));
        if ($sentencia) {
            require('../database/close_connection.php');
            echo '
                    <script>
                        window.location = "../../../pages/crear_sala?status=yes";
                    </script>
                ';
        } else {
            require('../database/close_connection.php');
            echo '
                    <script>
                        window.location = "../../../pages/crear_sala?status=no";
                    </script>
                ';
        }
    } else {
        
    }
}
