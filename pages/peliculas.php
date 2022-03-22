<?php include 'templates/header_admin.php';
include("../src/php/database/connection.php");

//escribir el query
$query= "SELECT idPeliculas, nombrePelicula,fechaIngreso, idGeneroPel, idClasificacion, CASE WHEN statusPelicula='1' THEN 'Activo' ELSE 'Inactivo' END AS estado  FROM peliculas";

//consultar la base de datos
$resultadoConsulta = mysqli_query($conection, $query);

//arreglo con mensaje de errores
$errores = [];
$peliculasNombre= '';
$peliculasClave= '';
$peliculasEstado= '';

//ejecutar el codigo despues de que el usaurio envia el formulario 
if($_SERVER ['REQUEST_METHOD']==='POST'){
$peliculasNombre=mysqli_real_escape_string($conection, $_POST['txtpeliculas']) ;
$peliculasClave=mysqli_real_escape_string($conection,  $_POST['txtClave']);
$peliculasEstado=mysqli_real_escape_string($conection, $_POST['listStatus']);

    $verificar="SELECT * FROM users WHERE peliculas='$peliculasNombre'";
    $resultado= mysqli_query($conection, $verificar);

    if($resultado->num_rows){
      //$errores[]="El peliculas ya existe";
             
    }else{
        //insertar en la base de datos
      //$peliculasHash= password_hash($peliculasClave, PASSWORD_BCRYPT);
      
      $query = "INSERT INTO users (peliculas, clave, status)
      VALUES  ('$peliculasNombre', '$peliculasHash', '$peliculasEstado')";
      $resultadoQuery = mysqli_query($conection, $query);
      echo '
      <script>
      
          window.location = "peliculass.php";
      </script>
  ';
      
    }  
}

?> 
 
<section class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> peliculasS <small> Cinema</small>
                <button class="btn btn-info" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal1" id="clasificacion"><i class="fas fa-plus-circle"></i> Nuevo</button>
            </h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">peliculasS <small> Cinema</small></a></li>
        </ul>
      </div>
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tablepeliculass">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Estreno</th>
                          <th>Genero</th>
                          <th>Clasificacion</th>
                          <th>Estado</th>
                          <td>Acciones</td>
                        
                        </tr>
                      </thead>
                          <tbody>
                          <?php while($peliculas = mysqli_fetch_assoc($resultadoConsulta)): ?>
                              <tr>
                                <td><?php echo $peliculas ['idPeliculas']; ?></td>
                                <td><?php echo $peliculas ['nombrePelicula']; ?></td>
                                <td><?php echo $peliculas ['fechaIngreso']; ?></td>
                                <td><?php echo $peliculas ['idGeneroPel']; ?></td>
                                <td><?php echo $peliculas ['idClasificacion']; ?></td>
                                <td><?php echo $peliculas ['estado']; ?></td>
                                <td>
                                <a   href="actualizarpeliculas.php?id=<?php  echo $peliculas ['idpeliculas']; ?>"  class="btn bg-orange btn-sm">
                                  <i class="fa-solid fa-pencil text-white"></i>
                                </a>
                                <a   href="eliminarpeliculas.php?id=<?php  echo $peliculas ['idpeliculas']; ?>"  class="btn bg-red btn-sm">
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

        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Nuevo peliculas</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="tile">
                <div class="tile-body">
                  <form id="formpeliculas" name="formpeliculas"  method="POST" action="peliculass.php">
                    <input type="hidden" id="idRol" name="idRol" value="">
                    
                    <div class="form-group">

                      <label for="txtpeliculas" class="control-label">peliculas</label>
                      <input  class="form-control" id="txtpeliculas" name="txtpeliculas" type="text" placeholder="Tu peliculas" required="">
                    </div>
                    <div class="form-group">
                      <label for="txtClave" class="control-label">Clave</label>
                      <input  class="form-control" id="txtClave" name="txtClave" type="password" placeholder="Tu clave" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Estado</label>
                        <select class="form-control" id="listStatus" name="listStatus" required="">
                          <option value="1">Activo</option>
                          <option value="2">Inactivo</option>
                        </select>
                    </div>
                    <div class="tile-footer">
                      <button id="btnActionForm" class="btn btn-primary" type="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>                       
        
    </section>
    <?php include 'templates/footer_admin.php';?>  