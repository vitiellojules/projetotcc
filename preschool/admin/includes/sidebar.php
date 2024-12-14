    
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">

      <span class="brand-text font-weight-light"> Creche | Admin </span>
    </a>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/manager.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php  echo $_SESSION['uname'];?></a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
                 <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
             MENU
              </p>
            </a>
          </li>
<?php if($_SESSION['utype']==1):?>

<!--Subadmins--->
     <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Sub-Admins
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="add-subadmin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Adicionar</p>
                </a>
              </li>
          
           <li class="nav-item">
                <a href="manage-subadmins.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Gerenciar </p>
                </a>
              </li>

            </ul>
          </li>
<?php endif;?>


    
       
<!----- Teachers--->
<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Professores
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="add-teacher.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Adicionar</p>
                </a>
              </li>
          
           <li class="nav-item">
                <a href="manage-teachers.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Gerenciar </p>
                </a>
              </li>

       

            </ul>
          </li>       


<!--Classes--->
   <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Turmas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="add-class.php" class="nav-link">  
                  <i class="far fa-circle nav-icon"></i>
                  <p>Adicionar</p>
                </a>
              </li>   

              <li class="nav-item">
                <a href="manage-classes.php" class="nav-link">  
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gerenciar</p>
                </a>
              </li>
            </ul>
          </li> 

<!--Enrollment--->
   <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
              <p>
              Matrículas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="new-enrollments.php" class="nav-link">  
                  <i class="far fa-circle nav-icon"></i>
                  <p>Novo(a)</p>
                </a>
              </li>   

              <li class="nav-item">
                <a href="accepted-enrolment.php" class="nav-link">  
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aceitos</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="rejected-enrolments.php" class="nav-link">  
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rejeitados</p>
                </a>
              </li>

                  <li class="nav-item">
                <a href="all-enrolments.php" class="nav-link">  
                  <i class="far fa-circle nav-icon"></i>
                  <p>Todos(as)</p>
                </a>
              </li>
            </ul>
          </li>




<!--Visitors--->
   <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
              <p>
              Visitantes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="new-visitors.php" class="nav-link">  
                  <i class="far fa-circle nav-icon"></i>
                  <p>Novo(a)</p>
                </a>
              </li>   

              <li class="nav-item">
                <a href="visited-visitors.php" class="nav-link">  
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visitado(a)</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="notvisited-visitors.php" class="nav-link">  
                  <i class="far fa-circle nav-icon"></i>
                  <p>Não Visitado(a)</p>
                </a>
              </li>

                  <li class="nav-item">
                <a href="all-visitors.php" class="nav-link">  
                  <i class="far fa-circle nav-icon"></i>
                  <p>Todos(as)</p>
                </a>
              </li>
            </ul>
          </li>

<!--Reports--->
   <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
              Páginas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="aboutus.php" class="nav-link">  
                  <i class="far fa-file-alt nav-icon"></i>
                  <p>Sobre Nós</p>
                </a>
              </li>   

              <li class="nav-item">
                <a href="contact-us.php" class="nav-link">  
                  <i class="fas fa-file nav-icon"></i>
                  <p>Contato</p>
                </a>
              </li>
            </ul>
          </li>



<!--Profile--->
   <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i> 
              <p>
              Configurações da Conta
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="profile.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Perfil</p>
                </a>
              </li>

 <li class="nav-item">
                <a href="change-password.php" class="nav-link">
                  <i class="fas fa-cog nav-icon"></i>
                  <p>Alterar Senha</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="logout.php" class="nav-link">
  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Sair</p>
                </a>
              </li>

            </ul>
          </li> 

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  
