<?php
if (isset($_POST['txtUser'], $_POST['txtPassw'])) {
    if ($_POST['txtUser'] != "") :
        if ($_POST['txtPassw'] != "") :
            include("../database/connection.php");
            $user = $_POST['txtUser'];
            $passw = $_POST['txtPassw'];
            $sql = "SELECT * FROM users WHERE usuario='$user' AND clave='$passw' AND status='1'";

            $sentencia = mysqli_query($conection, $sql);
            if (mysqli_num_rows($sentencia) > 0) :
                $data = mysqli_fetch_array($sentencia);
                sesiones($data);
                include('../database/close_connection.php');
                echo '
                     <script>
                         window.location = "../../../pages/dashboard.php";
                     </script>
                 ';
            else :
                include('../database/close_connection.php');
                echo '
                 <script>
                     window.location = "../../../index.php?status=no";
                 </script>
                ';
            endif;
        else :
            include('../database/close_connection.php');
            echo '
               <script>
                    window.location = "../../../index.php";
                </script>
            ';
        endif;
    else :
        echo '
           <script>
               window.location = "../../../index.php";
            </script>
        ';
    endif;
} else {
    echo 'A sucedido un error';
    die();
}

function sesiones($data)
{
    $tiempo = (60 * 60 * 8);
    session_set_cookie_params($tiempo);
    session_start();
    $_SESSION['id_user'] = $data[0];
    $_SESSION['user'] = $data[1];
}
