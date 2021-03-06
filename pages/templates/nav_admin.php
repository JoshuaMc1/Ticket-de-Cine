<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../src/img/avatar.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['user'];
          ?></p> 
          <p class="app-sidebar__user-designation">Administrador</p>
        </div>
      </div>
      <ul class="app-menu">
        <li>
          <a class="app-menu__item" href="./dashboard">
            <i class="app-menu__icon fa fa-dashboard"></i>
            <span class="app-menu__label">Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa-solid fa-lock"></i>
            <span class="app-menu__label">Seguridad</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="usuarios"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
            <li><a class="treeview-item" href="roles"><i class="icon fa fa-circle-o"></i> Roles</a></li>
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Permisos</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
          <i class="app-menu__icon fa-solid fa-box-archive"></i>
            <span class="app-menu__label">Registro</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="clientes"><i class="icon fa fa-circle-o"></i> Clientes</a></li>
            <li><a class="treeview-item" href="genero_peliculas"><i class="icon fa fa-circle-o"></i> Genero</a></li>
            <li><a class="treeview-item" href="clasificacion"><i class="icon fa fa-circle-o"></i> Clasificacion</a></li>
            <li><a class="treeview-item" href="peliculas"><i class="icon fa fa-circle-o"></i> Pelicula</a></li>
            <li><a class="treeview-item" href="crear_sala"><i class="icon fa fa-circle-o"></i> Sala</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
          <i class="app-menu__icon fa-solid fa-file-lines"></i>
            <span class="app-menu__label">Consulta</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="../reportes/clientes"><i class="icon fa fa-circle-o"></i> Clientes</a></li>
            <li><a class="treeview-item" href="../reportes/genero_peliculas"><i class="icon fa fa-circle-o"></i> Genero</a></li>
            <li><a class="treeview-item" href="../reportes/clasificacion"><i class="icon fa fa-circle-o"></i> Clasificacion</a></li>
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Pelicula</a></li>
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Salas</a></li>
            <li><a class="treeview-item" href="ventas"><i class="icon fa fa-circle-o"></i> Venta de Tickets</a></li>
          </ul>
        </li>
        
        <li>
            <a class="app-menu__item" href="../src/php/sessions/close_sessions">
              <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
              <span class="app-menu__label">Logout</span>
            </a>
        </li>
     
      </ul>
    </aside>