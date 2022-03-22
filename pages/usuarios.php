<?php include 'templates/header_admin.php';
include("../src/php/database/connection.php");

//escribir el query
$query= "SELECT id_user, usuario, CASE WHEN status='1' THEN 'Activo' ELSE 'Inactivo' END AS estado  FROM users";

//consultar la base de datos
$resultadoConsulta = mysqli_query($conection, $query);

//arreglo con mensaje de errores
$errores = [];
$usuarioNombre= '';
$usuarioClave= '';
$usuarioEstado= '';

//ejecutar el codigo despues de que el usaurio envia el formulario 
if($_SERVER ['REQUEST_METHOD']==='POST'){
$usuarioNombre=mysqli_real_escape_string($conection, $_POST['txtUsuario']) ;
$usuarioClave=mysqli_real_escape_string($conection,  $_POST['txtClave']);
$usuarioEstado=mysqli_real_escape_string($conection, $_POST['listStatus']);

    $verificar="SELECT * FROM users WHERE usuario='$usuarioNombre'";
    $resultado= mysqli_query($conection, $verificar);

    if($resultado->num_rows){
      //$errores[]="El Usuario ya existe";
             
    }else{
        //insertar en la base de datos
      //$usuarioHash= password_hash($usuarioClave, PASSWORD_BCRYPT);
      
      $query = "INSERT INTO users (usuario, clave, status)
      VALUES  ('$usuarioNombre', '$usuarioHash', '$usuarioEstado')";
      $resultadoQuery = mysqli_query($conection, $query);
      echo '
      <script>
      
          window.location = "usuarios.php";
      </script>
  ';
      
    }  
}

?> 
 
<section class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> USUARIOS <small> Cinema</small>
                <button class="btn btn-info" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal1" id="clasificacion"><i class="fas fa-plus-circle"></i> Nuevo</button>
            </h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">USUARIOS <small> Cinema</small></a></li>
        </ul>
      </div>
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableUsuarios">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Usuario</th>
                          <th>Estatus</th>
                          <td>Acciones</td>
                        
                        </tr>
                      </thead>
                          <tbody>
                          <?php while($usuario = mysqli_fetch_assoc($resultadoConsulta)): ?>
                              <tr>
                                <td><?php echo $usuario ['id_user']; ?></td>
                                <td><?php echo $usuario ['usuario']; ?></td>
                                <td><?php echo $usuario ['estado']; ?></td>
                                <td>
                                <a   href="actualizarUsuario.php?id=<?php  echo $usuario ['idusuario']; ?>"  class="btn bg-orange btn-sm">
                                  <i class="fa-solid fa-pencil text-white"></i>
                                </a>
                                <a   href="eliminarUsuario.php?id=<?php  echo $usuario ['idusuario']; ?>"  class="btn bg-red btn-sm">
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
              <h5 class="modal-title" id="exampleModalCenterTitle">Nuevo usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="tile">
                <div class="tile-body">
                  <form id="formUsuario" name="formUsuario"  method="POST" action="usuarios.php">
                    <input type="hidden" id="idRol" name="idRol" value="">
                    
                    <div class="form-group">

                      <label for="txtUsuario" class="control-label">Usuario</label>
                      <input  class="form-control" id="txtUsuario" name="txtUsuario" type="text" placeholder="Tu usuario" required="">
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