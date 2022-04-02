<?php
session_start();
if (isset($_SESSION['id_user'])) :
    include 'templates/header_admin.php';
    require("../src/php/database/connection.php");
    $sentencia = "SELECT * FROM salas WHERE status='1'";
    $resultado = mysqli_query($conection, $sentencia);

    if($_SERVER ['REQUEST_METHOD']==='POST'){
        $nombreSala = mysqli_real_escape_string($conection, $_POST['nombreSala']);
        $filas = mysqli_real_escape_string($conection, $_POST['filas']);
        $asientos = mysqli_real_escape_string($conection, $_POST['asientos']);

        $result = mysqli_query($conection, "INSERT INTO salas(nombreSala, filasSala, asientosSala, status) VALUES ('$nombreSala','$filas','$asientos','1')");
        if($result){
            echo "
                <script>
                    window.location = 'crear_sala?status=success';
                </script>
            ";
        }else{
            echo "
                <script>
                    window.location = 'crear_sala?status=unexpected';
                </script>
            ";
        }
    }
?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fas fa-plus"></i> Crear salas</h1>
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
                                    <a class="nav-link active" aria-current="page" href="crear_sala">Crear sala</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="crear_pelicula_a_sala">Agregar pelicula a sala</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <form action="crear_sala" method="POST" id="formSalas">
                                <div class="card border-success">
                                    <div class="card-header">
                                        <h5 class="fw-bold">Datos de la sala</h5>
                                    </div>
                                    <div class="card-body shadow">
                                        <div class="row">
                                            <div class="col-lg-12 mb-2" id="msgNotificacion1">

                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Ingrese el nombre de la sala</label>
                                                <input type="text" name="nombreSala" id="nombreSala" class="form-control">
                                            </div>
                                            <div class="col-lg-3 col-6 mb-3">
                                                <label class="form-label">Ingrese la cantidad de filas</label>
                                                <input type="text" name="filas" id="filas" class="form-control">
                                            </div>
                                            <div class="col-lg-3 col-6 mb-3">
                                                <label class="form-label">Ingrese la cantidad de asientos</label>
                                                <input type="text" name="asientos" id="asientos" class="form-control">
                                            </div>
                                            <div class="col-lg-12 text-center">
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
                                    <h5 class="fw-bold">Salas creadas</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-2" id="msgNotificacion">
                                        <?php 
                                            if(isset($_GET['status'])){
                                                $status = $_GET['status'];
                                                if($status == 'yes'){
                                                    echo "
                                                        <script>
                                                            var alertPlaceholder = document.getElementById('msgNotificacion');
                                                            var e = '<div class=\"alert alert-success fs-6 alert-dismissible\" role=\"alert\">La sala se a eliminado exitosamente</div>';
                                                            error();
                                        
                                                            function error(){
                                                                var wrapper = document.createElement('div');
                                                                wrapper.innerHTML = e;
                                                                alertPlaceholder.append(wrapper);
                                                            }
                                                        </script>
                                                    ";
                                                }else if($status == 'no'){
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
                                                }else if($status == 'success'){
                                                    echo "
                                                        <script>
                                                            var alertPlaceholder = document.getElementById('msgNotificacion1');
                                                            var e = '<div class=\"alert alert-success fs-6 alert-dismissible\" role=\"alert\">Sala creada exitosamente</div>';
                                                            error();
                                        
                                                            function error(){
                                                                var wrapper = document.createElement('div');
                                                                wrapper.innerHTML = e;
                                                                alertPlaceholder.append(wrapper);
                                                            }
                                                        </script>
                                                    ";
                                                }else if($status == 'unexpected'){
                                                    echo "
                                                        <script>
                                                            var alertPlaceholder = document.getElementById('msgNotificacion1');
                                                            var e = '<div class=\"alert alert-danger fs-6 alert-dismissible\" role=\"alert\">A ocurrido un error al crear la sala</div>';
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
                                                    <th>Filas</th>
                                                    <th>Asientos por fila</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($salas = mysqli_fetch_assoc($resultado)) : ?>
                                                    <tr>
                                                        <td><?php echo $salas['idSala']; ?></td>
                                                        <td><?php echo $salas['nombreSala']; ?></td>
                                                        <td><?php echo $salas['asientosSala']; ?></td>
                                                        <td><?php echo $salas['filasSala']; ?></td>

                                                        <td class="text-center">
                                                            <a href="../src/php/funciones/crearSala?id=<?php echo $salas['idSala']; ?>" class="btn bg-red btn-sm">
                                                                <i class="fa-solid fa-trash text-white"></i>
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
    <script src="../src/js/salas/app.js?v=<?php echo rand();?>"></script>
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