<?php
session_start();
if (isset($_SESSION['id_user'])) :
    include 'templates/header_admin.php';
    require("../src/php/database/connection.php");
    $sentencia = "SELECT pls.*, sl.idSala, sl.nombreSala, pl.* FROM peliculasala pls INNER JOIN salas sl ON pls.idSala=sl.idSala INNER JOIN peliculas pl ON pls.idPelicula=pl.idPeliculas WHERE pls.status='1'";
    $sentenciaSalas = "SELECT * FROM salas WHERE status='1'";
    $sentenciaPeliculas = "SELECT * FROM peliculas WHERE statusPelicula='1'";
    $resultadoSalas = mysqli_query($conection, $sentenciaSalas);
    $resultadoPeliculas = mysqli_query($conection, $sentenciaPeliculas);
    $resultado = mysqli_query($conection, $sentencia);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idSala = mysqli_real_escape_string($conection, $_POST['sala']);
        $idPel = mysqli_real_escape_string($conection, $_POST['pelicula']);
        $hora = mysqli_real_escape_string($conection, $_POST['hora']);
        $fecha = mysqli_real_escape_string($conection, $_POST['fecha']);
        $sql = mysqli_query($conection, "SELECT * FROM peliculasala WHERE idPelicula='$idPel' AND idSala='$idSala' AND diaEstreno='$fecha' AND horaEstreno='$hora' AND status='1'");
        if (mysqli_num_rows($sql) < 1) {
            $result = mysqli_query($conection, "INSERT INTO peliculasala(idSala, idPelicula, diaEstreno, horaEstreno, status) VALUES ('$idSala','$idPel','$fecha','$hora','1')");

            if ($result) {
                echo "
                <script>
                    window.location = 'crear_pelicula_a_sala?status=success';
                </script>
            ";
            } else {
                echo "
                <script>
                    window.location = 'crear_pelicula_a_sala?status=unexpected';
                </script>
            ";
            }
        }else{
            echo "
                <script>
                    window.location = 'crear_pelicula_a_sala?status=exists';
                </script>
            ";
        }
    }
?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fas fa-plus"></i> Asignar pelicula a sala</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="crear_sala">Crear sala</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="crear_pelicula_a_sala">Agregar pelicula a sala</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <form action="crear_pelicula_a_sala" method="POST" id="formSalas2">
                                <div class="card shadow border-success">
                                    <div class="card-header">
                                        <h5 class="fw-bold">Agregar pelicula a una sala</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 mb-2" id="msgNotificacion2"></div>
                                            <div class="col-lg-4 mb-3">
                                                <label class="form-label">Seleccione una sala</label>
                                                <select class="form-control" name="sala" id="sala">
                                                    <option value="">Seleccione una opción</option>
                                                    <?php
                                                    while ($slas = mysqli_fetch_assoc($resultadoSalas)) :
                                                    ?>
                                                        <option value="<?php echo $slas['idSala']; ?>"><?php echo $slas['nombreSala']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <label class="form-label">Seleccione la pelicula</label>
                                                <select name="pelicula" id="pelicula" class="form-control">
                                                    <option value="">Seleccione una opción</option>
                                                    <?php
                                                    while ($pls = mysqli_fetch_assoc($resultadoPeliculas)) :
                                                    ?>
                                                        <option value="<?php echo $pls['idPeliculas']; ?>"><?php echo $pls['nombrePelicula']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-2 col-6 mb-3">
                                                <label class="form-label">Ingrese la fecha</label>
                                                <input type="date" name="fecha" id="fecha" class="form-control">
                                            </div>
                                            <div class="col-lg-2 col-6 mb-3">
                                                <label class="form-label">Ingrese la hora</label>
                                                <input type="time" name="hora" id="hora" class="form-control">
                                            </div>
                                            <div class="col-lg-12 mb-3 text-center">
                                                <button type="submit" class="btn btn-success">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="card shadow border-success">
                                <div class="card-header">
                                    <h5 class="fw-bold">Peliculas asignadas a las salas</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-2" id="msgNotificacion">
                                        <?php
                                        if (isset($_GET['status'])) {
                                            $status = $_GET['status'];
                                            if ($status == 'yes') {
                                                echo "
                                                        <script>
                                                            var alertPlaceholder = document.getElementById('msgNotificacion');
                                                            var e = '<div class=\"alert alert-success fs-6 alert-dismissible\" role=\"alert\">Dato eliminado exitosamente</div>';
                                                            error();
                                        
                                                            function error(){
                                                                var wrapper = document.createElement('div');
                                                                wrapper.innerHTML = e;
                                                                alertPlaceholder.append(wrapper);
                                                            }
                                                        </script>
                                                    ";
                                            } else if ($status == 'no') {
                                                echo "
                                                        <script>
                                                            var alertPlaceholder = document.getElementById('msgNotificacion');
                                                            var e = '<div class=\"alert alert-danger fs-6 alert-dismissible\" role=\"alert\">A ocurrido un error</div>';
                                                            error();
                                        
                                                            function error(){
                                                                var wrapper = document.createElement('div');
                                                                wrapper.innerHTML = e;
                                                                alertPlaceholder.append(wrapper);
                                                            }
                                                        </script>
                                                    ";
                                            } else if ($status == 'success') {
                                                echo "
                                                        <script>
                                                            var alertPlaceholder = document.getElementById('msgNotificacion2');
                                                            var e = '<div class=\"alert alert-success fs-6 alert-dismissible\" role=\"alert\">Datos guardados exitosamente</div>';
                                                            error();
                                        
                                                            function error(){
                                                                var wrapper = document.createElement('div');
                                                                wrapper.innerHTML = e;
                                                                alertPlaceholder.append(wrapper);
                                                            }
                                                        </script>
                                                    ";
                                            } else if ($status == 'unexpected') {
                                                echo "
                                                        <script>
                                                            var alertPlaceholder = document.getElementById('msgNotificacion2');
                                                            var e = '<div class=\"alert alert-danger fs-6 alert-dismissible\" role=\"alert\">A ocurrido un error al guardar los datos</div>';
                                                            error();
                                        
                                                            function error(){
                                                                var wrapper = document.createElement('div');
                                                                wrapper.innerHTML = e;
                                                                alertPlaceholder.append(wrapper);
                                                            }
                                                        </script>
                                                    ";
                                            } else if ($status == 'E333') {
                                                echo "
                                                        <script>
                                                            var alertPlaceholder = document.getElementById('msgNotificacion2');
                                                            var e = '<div class=\"alert alert-danger fs-6 alert-dismissible\" role=\"alert\">A ocurrido un error</div>';
                                                            error();
                                        
                                                            function error(){
                                                                var wrapper = document.createElement('div');
                                                                wrapper.innerHTML = e;
                                                                alertPlaceholder.append(wrapper);
                                                            }
                                                        </script>
                                                    ";
                                            }else if($status == "exists"){
                                                echo "
                                                        <script>
                                                            var alertPlaceholder = document.getElementById('msgNotificacion2');
                                                            var e = '<div class=\"alert alert-danger fs-6 alert-dismissible\" role=\"alert\">Error: al parecer ya existe una pelicula programada en esa fecha, hora y sala, <strong>por favor intentar con otra sala.</strong></div>';
                                                            error();
                                        
                                                            function error(){
                                                                var wrapper = document.createElement('div');
                                                                wrapper.innerHTML = e;
                                                                alertPlaceholder.append(wrapper);
                                                            }
                                                        </script>
                                                    ";
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered" id="tablesalas">
                                            <thead>
                                                <tr>
                                                    <th>ID Sala</th>
                                                    <th>Nombre de la sala</th>
                                                    <th>Nombre de la pelicula</th>
                                                    <th>Fecha de emisión</th>
                                                    <th>Hora de emisión</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($salas = mysqli_fetch_assoc($resultado)) : ?>
                                                    <tr>
                                                        <td><?php echo $salas['idSala']; ?></td>
                                                        <td><?php echo $salas['nombreSala']; ?></td>
                                                        <td><?php echo $salas['nombrePelicula']; ?></td>
                                                        <td><?php echo $salas['diaEstreno']; ?></td>
                                                        <td><?php echo $salas['horaEstreno']; ?></td>
                                                        <td class="text-center">
                                                            <a href="../src/php/funciones/crearPelSala?id=<?php echo $salas['idPSala']; ?>" class="btn bg-red btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                                                <i class="fa-solid fa-trash text-white"></i>
                                                            </a>
                                                            <a href="edit_movie.php?idP=<?php echo $salas['idPSala']; ?>" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                                                <i class="far fa-edit text-white"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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