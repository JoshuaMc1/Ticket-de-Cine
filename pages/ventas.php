<?php
session_start();
if (isset($_SESSION['id_user'])) :
    include 'templates/header_admin.php';
    require("../src/php/database/connection.php");
    $sentenciaSalas = mysqli_query($conection, "SELECT * FROM salas WHERE status='1'");
    $sentenciaGeneros = mysqli_query($conection, "SELECT * FROM genero");
?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fas fa-store-alt"></i> Ventas de tickets</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <form action="../src/php/ventas/sendSales.php" method="POST" id="formVentas">
                        <div class="row">
                            <div class="col-lg-12" id="mensajeError"></div>
                            <div class="col-lg-12 mb-3">
                                <div class="card shadow border-success">
                                    <div class="card-header">
                                        <h5 class="fw-bold"><i class="fas fa-user"></i> Datos del cliente</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-1 col-1 mb-3">
                                                <label class="form-label">ID</label>
                                                <input type="text" name="idCliente" id="idCliente" class="form-control" readonly>
                                            </div>
                                            <div class="col-lg-4 col-11 mb-3">
                                                <label class="form-label">DNI Cliente <i class="fas fa-info-circle bg-info p-1 text-white rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="Dar enter para buscar"></i></label>
                                                <input type="text" name="dni" id="dni" class="form-control" maxlength="13">
                                            </div>
                                            <div class="col-lg-2 col-6 mb-3">
                                                <label class="form-label">Nombre del cliente</label>
                                                <input type="text" name="nombre" id="nombre" class="form-control" maxlength="70">
                                            </div>
                                            <div class="col-lg-2 col-6 mb-3">
                                                <label class="form-label">Apellido del cliente</label>
                                                <input type="text" name="apellido" id="apellido" class="form-control" maxlength="70">
                                            </div>
                                            <div class="col-lg-1 col-6 mb-3">
                                                <label class="form-label">Edad</label>
                                                <input type="text" name="edad" id="edad" class="form-control" maxlength="2">
                                            </div>
                                            <div class="col-lg-2 col-6 mb-3">
                                                <label class="form-label">Genero</label>
                                                <select name="genero" id="genero" class="form-control">
                                                    <option value="">Seleccione una opción</option>
                                                    <?php
                                                    while ($dataGenero = mysqli_fetch_assoc($sentenciaGeneros)) :
                                                    ?>
                                                        <option value="<?php echo $dataGenero['idGenero']; ?>"><?php echo $dataGenero['genero']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="card shadow border-success">
                                    <div class="card-header">
                                        <h5 class="fw-bold"><i class="fas fa-home"></i> Datos de sala y pelicula</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 mb-5">
                                                <label class="form-label">Seleccione una sala</label>
                                                <select name="sala" id="sala" class="form-control">
                                                    <option value="">Seleccione una opción</option>
                                                    <?php
                                                    while ($dataSala = mysqli_fetch_assoc($sentenciaSalas)) :
                                                    ?>
                                                        <option value="<?php echo $dataSala['idSala']; ?>"><?php echo $dataSala['nombreSala']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <div class="row">
                                                    <div class="col-lg-12 mb-2">
                                                        <h6 class="fw-bold">Seleccione una pelicula <label class="p-1 bg-info rounded text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Dar doble click para seleccionar una pelicula"><i class="fas fa-info-circle"></i></label></h6>
                                                    </div>
                                                </div>
                                                <div class="row" id="pelSala"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="card shadow border-success">
                                    <div class="card-header">
                                        <h5 class="fw-bold"><i class="fas fa-chair"></i> Asientos disponibles</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="contaier-fluid" id="asientosSala">

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 mb-3 text-center">
                                                <button type="submit" class="btn btn-success">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="../src/js/ventas/app.js?v=<?php echo rand(); ?>"></script>
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