<?php include 'templates/header_admin.php';
include("../src/php/database/connection.php");

//escribir el query
$query= "SELECT * FROM users";

//consultar la base de datos
$resultadoConsulta = mysqli_query($conection, $query);

?> 
 
<section class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> USUARIOS <small> Cinema</small>
                <button class="btn btn-info" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nuevo</button>
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
                                <td><?php echo $usuario ['status']; ?></td>
                                <td>
                                <a   href="actualizarUsuario.php?id=<?php  echo $usuario ['idusuario']; ?>"  class="btn bg-orange">
                                  <small><i class="fa-solid fa-pencil"></i></small>
                                </a>
                                <a   href="eliminarUsuario.php?id=<?php  echo $usuario ['idusuario']; ?>"  class="btn bg-red">
                                  <small><i class="fa-solid fa-trash"></i></small>
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
    </section>
    <?php include 'templates/footer_admin.php';?>  