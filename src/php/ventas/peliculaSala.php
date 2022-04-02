<?php
if (isset($_POST['idSala'])) {
    if ($_POST['idSala'] != "") {
        require("../database/connection.php");
        $idSala = $_POST['idSala'];
        $fechaActual = date("Y-m-d");
        
        $sentencia = mysqli_query($conection, "SELECT pl.*, slp.*, sl.* FROM peliculas pl INNER JOIN peliculasala slp ON slp.idPelicula=pl.idPeliculas INNER JOIN salas sl ON slp.idSala=sl.idSala WHERE slp.idSala= '$idSala' AND diaEstreno='$fechaActual' AND slp.status='1'");
        if (mysqli_num_rows($sentencia) > 0) {
            while ($data = mysqli_fetch_assoc($sentencia)) {
                echo '
                <div class="col">
                <label>
                    <input type="radio" value="'.$data['idPelicula'].'" name="pelicula" class="card-input-element" />
                    <div class="card card-input mb-3" style="max-width: 500px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../src/img/youtube-g1db11d849_640.png" class="rounded-start w-100 h-100" alt="'.$data['nombrePelicula'].'">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text text-break">
                                        <h5 class="card-title">'.$data['nombrePelicula'].'</h5>
                                        <small class="text-muted">'.$data['nombreSala'].'</small><br>
                                        <small class="text-muted">Fecha: '.$data['diaEstreno'].'</small> | 
                                        <small class="text-muted">Hora: '.$data['horaEstreno'].'</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
                ';
            }
        } else {
            echo '
                <div class="col-lg-12 text-center">
                    <h5 class="text-danger">No hay peliculas disponibles en la sala</h5>
                </div>
            ';
        }
    }
}
