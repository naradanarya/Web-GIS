<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <?php 
            
            if ($this->session->userdata('akses_level') == 'admin'){
              echo '<li class="nav-item has-treeview menu">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-database"></i>
                    <p>
                      Content
                      <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>';
              echo '<ul class="nav nav-treeview">';
              echo ' <li class="nav-item">';
              echo ' <a href="';
              echo base_url('backend/datapoint');
              echo '" class="nav-link">';
              echo ' <i class="fa fa-map nav-icon"></i>
              <p>Pemetaan</p>
            </a>';

              echo ' </li>';
              echo ' <li class="nav-item">';
              echo ' <a href="';
              echo base_url('backend/datapoint/tabel');
              echo '" class="nav-link">';
              echo ' <i class="fa fa-map-marker nav-icon"></i>
              <p>Data Point</p>
            </a>';

              echo ' </li>';

              echo ' <li class="nav-item">';
              echo ' <a href="';
              echo base_url('backend/datapoint/tambah');
              echo '" class="nav-link">';
              echo ' <i class="fa fa-plus nav-icon"></i>
              <p>Tambah Data Point</p>
            </a>';

              echo ' </li>';
              echo '</ul>';
              echo ' </li>';

              echo '<li class="nav-item has-treeview menu">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-wrench"></i>
                    <p>
                      Setting
                      <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>';
              echo '<ul class="nav nav-treeview">';
              echo ' <li class="nav-item">';
              echo ' <a href="';
              echo base_url('backend/account');
              echo '" class="nav-link">';
              echo ' <i class="fa fa-user nav-icon"></i>
              <p>Account</p>
            </a>';

              echo ' </li>';
              echo ' <li class="nav-item">';
              echo ' <a href="';
              echo base_url('backend/konfigurasi');
              echo '" class="nav-link">';
              echo ' <i class="fa fa-globe nav-icon"></i>
              <p>Website</p>
            </a>';

              echo ' </li>';
              echo '</ul>';
              echo ' </li>';
            }
            
            ?> 

<?php 
            
            if ($this->session->userdata('akses_level') == 'operator'){
              echo '<li class="nav-item has-treeview menu">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-database"></i>
                    <p>
                      Content
                      <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>';
              echo '<ul class="nav nav-treeview">';
              echo ' <li class="nav-item">';
              echo ' <a href="';
              echo base_url('backend/datapoint');
              echo '" class="nav-link">';
              echo ' <i class="fa fa-map nav-icon"></i>
              <p>Pemetaan</p>
            </a>';

              echo ' </li>';
              echo ' <li class="nav-item">';
              echo ' <a href="';
              echo base_url('backend/datapoint/tabel');
              echo '" class="nav-link">';
              echo ' <i class="fa fa-map-marker nav-icon"></i>
              <p>Data Point</p>
            </a>';

              echo ' </li>';
              echo ' <li class="nav-item">';
              echo ' <a href="';
              echo base_url('backend/datapoint/tambah');
              echo '" class="nav-link">';
              echo ' <i class="fa fa-plus nav-icon"></i>
              <p>Tambah Data Point</p>
            </a>';

              echo ' </li>';
              echo '</ul>';
              echo ' </li>';
              
            }
            
            ?> 
<?php 
            
            if ($this->session->userdata('akses_level') == 'user'){
              echo '<li class="nav-item has-treeview menu">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-database"></i>
                    <p>
                      Content
                      <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>';
              echo '<ul class="nav nav-treeview">';
              echo ' <li class="nav-item">';
              echo ' <a href="';
              echo base_url('backend/datapoint');
              echo '" class="nav-link">';
              echo ' <i class="fa fa-map nav-icon"></i>
              <p>Pemetaan</p>
            </a>';

              echo ' </li>';
              echo ' <li class="nav-item">';
              echo ' <a href="';
              echo base_url('backend/datapoint/tabel');
              echo '" class="nav-link">';
              echo ' <i class="fa fa-map-marker nav-icon"></i>
              <p>Data Point</p>
            </a>';

              echo ' </li>';
              echo '</ul>';
              echo ' </li>';
              
            }
            
            ?> 

            
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-12">
          <div class="card">
            <div class="card-header">
              <!-- <h3 class="card-title"><?php echo $title ?></h3> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">