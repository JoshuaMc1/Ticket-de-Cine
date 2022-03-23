<?php 
session_start();
include 'templates/header_admin.php';
include("../src/php/database/connection.php");

//escribir el query
$query= "SELECT * FROM clasificacion";

//consultar la base de datos
$resultadoConsulta = mysqli_query($conection, $query);

//arreglo con mensaje de errores
$errores = [];
$clasificacionNombre= '';


//ejecutar el codigo despues de que el usaurio envia el formulario 
if($_SERVER ['REQUEST_METHOD']==='POST'){
$clasificacionNombre=mysqli_real_escape_string($conection, $_POST['txtclasificacion']) ;


    $verificar="SELECT * FROM clasificacion WHERE nombreClasificacion='$clasificacionNombre'";
    $resultado= mysqli_query($conection, $verificar);

    if($resultado->num_rows){
      //$errores[]="El clasificacion ya existe";
             
    }else{
        //insertar en la base de datos
      //$clasificacionHash= password_hash($clasificacionClave, PASSWORD_BCRYPT);
      
      $query = "INSERT INTO users (nombreClasificacion)
      VALUES  ('$clasificacionNombre')";
      $resultadoQuery = mysqli_query($conection, $query);
      echo '
      <script>
      
          window.location = "clasificacions.php";
      </script>
  ';
      
    }  
}

?> 
 
<section class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> clasificacionS <small> Cinema</small>
                <button class="btn btn-info" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal1" id="clasificacion"><i class="fas fa-plus-circle"></i> Nuevo</button>
            </h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">clasificacionS <small> Cinema</small></a></li>
        </ul>
      </div>
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableclasificacions">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre de la clasificacion</th>
                          <td>Acciones</td>
                        
                        </tr>
                      </thead>
                          <tbody>
                          <?php while($clasificacion = mysqli_fetch_assoc($resultadoConsulta)): ?>
                              <tr>
                                <td><?php echo $clasificacion ['idClasificacion']; ?></td>
                                <td><?php echo $clasificacion ['nombreClasificacion']; ?></td>
                                <td>
                                <a   href="actualizarclasificacion.php?id=<?php  echo $clasificacion ['idclasificacion']; ?>"  class="btn bg-orange btn-sm">
                                  <i class="fa-solid fa-pencil text-white"></i>
                                </a>
                                <a   href="eliminarclasificacion.php?id=<?php  echo $clasificacion ['idclasificacion']; ?>"  class="btn bg-red btn-sm">
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
              <h5 class="modal-title" id="exampleModalCenterTitle">Nuevo clasificacion</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="tile">
                <div class="tile-body">
                  <form id="formclasificacion" name="formclasificacion"  method="POST" action="clasificacions.php">
                    <input type="hidden" id="idRol" name="idRol" value="">
                    
                    <div class="form-group">

                      <label for="txtclasificacion" class="control-label">Nombre de la clasificacion</label>
                      <input  class="form-control" id="txtclasificacion" name="txtclasificacion" type="text" placeholder="Tu clasificacion" required="">
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