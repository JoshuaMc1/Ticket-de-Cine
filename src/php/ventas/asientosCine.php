<?php
if (isset($_POST['idSala'], $_POST['idPelicula'])) {
    if ($_POST['idSala'] != "" && $_POST['idPelicula']) {
        require("../database/connection.php");
        $abc = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'M');
        $idPelicula = $_POST['idPelicula'];
        $idSala = $_POST['idSala'];

        $sentencia = mysqli_query($conection, "SELECT pl.*, slp.*, sl.* FROM peliculas pl INNER JOIN peliculasala slp ON slp.idPelicula=pl.idPeliculas INNER JOIN salas sl ON slp.idSala=sl.idSala WHERE slp.diaEstreno >= Curdate() AND slp.idSala= '$idSala' AND idPelicula='$idPelicula' AND slp.status='1'");
        // $sentencia = mysqli_query($conection, "SELECT pl.*, slp.*, sl.* FROM peliculas pl INNER JOIN peliculasala slp ON slp.idPelicula=pl.idPeliculas INNER JOIN salas sl ON slp.idSala=sl.idSala WHERE slp.idSala= '$idSala' AND slp.status='1'");
        
        if (mysqli_num_rows($sentencia) > 0) {
            $data = mysqli_fetch_assoc($sentencia);
            $filas = $data['filasSala'];
            $asientos = $data['asientosSala'];
            $fechaPels = $data['diaEstreno'];
            $datos = array('0');
            $sentenciaAsientosOcupados = mysqli_query($conection, "SELECT * FROM asientocliente WHERE idPelicula='$idPelicula' AND idSala='$idSala' AND fechaPelicula='$fechaPels' AND status='1'");

            while ($dats = mysqli_fetch_assoc($sentenciaAsientosOcupados)) {
                array_push($datos, $dats['asientoReservado']);
            }

            for ($i = 0; $i < $filas; $i++) {
                echo '
                    <div class="row">
                ';
                $v1 = $i + 1;
                for ($j = 0; $j < $asientos; $j++) {
                    $v2 = $j + 1;
                    $buscar = $v1.'-'.$v2;
                    echo '
                        <div class="col">
                        <div class="quiz_card_area">
                        ';
                    if (validar($datos, $buscar)) {
                        echo '
                            <input class="quiz_checkbox" type="checkbox" name="asiento[]" value="'.$buscar.'" disabled/>
                            <div class="single_quiz_card">
                                <div class="quiz_card_content">
                                    <div class="quiz_card_icon">
                                        <div class="quiz_icon quiz_icon1"></div>
                                    </div>
                                    <div class="quiz_card_title">
                                        <h3>'.$abc[$i],$j+1,'</h3>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                            ';
                    } else {
                        echo '
                            <input class="quiz_checkbox" type="checkbox" id="1" name="asiento[]" value="'.$buscar.'" />
                            <div class="single_quiz_card">
                                <div class="quiz_card_content">
                                    <div class="quiz_card_icon">
                                        <div class="quiz_icon quiz_icon1"></div>
                                    </div>
                                    <div class="quiz_card_title">
                                        <h3>'.$abc[$i],$j+1,'</h3>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                            ';
                    }
                }
                echo '
                    </div>
                ';
            }
        } else {
            echo '
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h5 class="text-danger">No hay asientos disponibles el dia de hoy</h5>
                </div>
            </div>
            ';
        }
    }
}

function validar($array1, $buscar1)
{
    if (array_search($buscar1, $array1, true)) :
        return true;
    else :
        return false;
    endif;
}
