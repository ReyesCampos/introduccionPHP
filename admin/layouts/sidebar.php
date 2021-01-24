<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
      <img src="../img/logo.png" alt="" width=90% height=90% style="margin:5%;" >
      

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/users/<?php echo $userData['Imagen'];?>" 
          class="img-circle elevation-2" style="width:40px;height:40px;" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $userData['Nombre']." ".$userData['Ap'];?></a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                    <a href="./index.php" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Inicio
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./usuarios.php" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Usuarios
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./historietas.php" class="nav-link">
                    <i class="nav-icon fas fa-book-open"></i>
                    <p>
                        Historietas
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./productos.php" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>
                        Productos
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./php/salir.php" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Cerrar sesión
                    </p>
                    </a>
                </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>