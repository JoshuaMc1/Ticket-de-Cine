<?php
session_start();
if (isset($_SESSION['id_user'])) :
    include 'templates/header_admin.php';
    require('../src/php/database/connection.php');
    $idPs = $_GET['idP'];
    $sentenciaSala = mysqli_query($conection, "SELECT * FROM salas WHERE status='1'");
    $sentenciaPeliculas = mysqli_query($conection, "SELECT * FROM peliculas WHERE statusPelicula='1'");
    $sentencia2 = mysqli_query($conection, "SELECT pls.*, sl.idSala, sl.nombreSala, pl.* FROM peliculasala pls INNER JOIN salas sl ON pls.idSala=sl.idSala INNER JOIN peliculas pl ON pls.idPelicula=pl.idPeliculas WHERE pls.status='1' AND pls.idPSala='$idPs'");
    $data1 = mysqli_fetch_assoc($sentencia2);

    if($_SERVER ['REQUEST_METHOD'] === 'POST'){
        $idSala = mysqli_real_escape_string($conection, $_POST['sala']);
        $idPel = mysqli_real_escape_string($conection, $_POST['pelicula']);
        $hora = mysqli_real_escape_string($conection, $_POST['hora']);
        $fecha = mysqli_real_escape_string($conection, $_POST['fecha']);
        $idPs = $_POST['idP'];
        $result = mysqli_query($conection, "UPDATE peliculasala SET idSala='$idSala', idPelicula='$idPel', diaEstreno='$fecha', horaEstreno='$hora', status='1' WHERE idPSala='$idPs'") or die("Error ".mysqli_error($conection));

        if($result){
            echo "
                <script>
                    window.location = 'crear_pelicula_a_sala?status=success';
                </script>
            ";
        }else{
            echo "
                <script>
                    window.location = 'crear_pelicula_a_sala?status=unexpected';
                </script>
            ";
        }
    }
?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="far fa-edit"></i> Editar</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="card shadow mb-3 border-success">
                        <div class="card-header">
                            <h5 class="fw-bold">Datos antiguos</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-1 mb-3">
                                    <label class="form-label">ID</label>
                                    <input type="text" value="<?php echo $_GET['idP']; ?>" class="form-control" disabled>
                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label class="form-label">Sala</label>
                                    <select class="form-control" disabled>
                                        <option><?php echo $data1['nombreSala']; ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Pelicula</label>
                                    <select class="form-control" disabled>
                                        <option><?php echo $data1['nombrePelicula']; ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-6 mb-3">
                                    <label class="form-label">Fecha de emisión</label>
                                    <input type="date" class="form-control" value="<?php echo $data1['diaEstreno']; ?>" disabled>
                                </div>
                                <div class="col-lg-2 col-6 mb-3">
                                    <label class="form-label">Hora de emisión</label>
                                    <input type="time" class="form-control" value="<?php echo $data1['horaEstreno']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-3 border-success">
                        <div class="card-header">
                            <h5 class="fw-bold">Datos nuevos</h5>
                        </div>
                        <div class="card-body">
                            <form action="edit_movie" method="POST" id="formEdit">
                                <div class="row">
                                    <div class="col-lg-12 mb-3" id="msgNotificacion2"></div>
                                    <div class="col-lg-1 mb-3">
                                        <label class="form-label">ID</label>
                                        <input type="text" name="idP" value="<?php echo $idPs; ?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <label class="form-label">Sala</label>
                                        <select class="form-control" name="sala" id="sala">
                                            <option value="">Seleccione una opción</option>
                                            <?php
                                            while ($dataSala = mysqli_fetch_assoc($sentenciaSala)) :
                                            ?>
                                                <option value="<?php echo $dataSala['idSala'];?>"><?php echo $dataSala['nombreSala'];?></option>
                                            <?php endwhile;?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label class="form-label">Pelicula</label>
                                        <select class="form-control" name="pelicula" id="pelicula">
                                            <option value="">Seleccione una opción</option>
                                            <?php
                                            while ($dataPel = mysqli_fetch_assoc($sentenciaPeliculas)) :
                                            ?>
                                                <option value="<?php echo $dataPel['idPeliculas'];?>"><?php echo $dataPel['nombrePelicula'];?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-6 mb-3">
                                        <label class="form-label">Fecha de emisión</label>
                                        <input type="date" name="fecha" id="fecha" class="form-control">
                                    </div>
                                    <div class="col-lg-2 col-6 mb-3">
                                        <label class="form-label">Hora de emisión</label>
                                        <input type="time" name="hora" id="hora" class="form-control">
                                    </div>
                                    <div class="col-lg-12 mb-3 text-center">
                                        <button type="submit" class="btn btn-success">Guardar carmbios</button>
                                        <a href="crear_pelicula_a_sala" class="btn btn-danger">Cancelar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../src/js/salas/app.js?v=<?php echo rand(); ?>"></script>
<?php
    include 'templates/footer_admin.php';
else :
    echo '
            <script>
                window.location = "../?status=E333";
            </script>
        ';
endif;
?>