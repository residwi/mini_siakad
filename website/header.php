<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/AdminLTE/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url($_SESSION['role']); ?>/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">UPWI</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">SIAKAD UPWI</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- Notifications: style can be found in dropdown.less -->

            <!-- Tasks: style can be found in dropdown.less -->
            <!-- end task item -->

            <!-- User Account: style can be found in dropdown.less -->

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url(''); ?>assets/image/<?php echo $_SESSION['image']; ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['role']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo base_url(''); ?>assets/image/<?php echo $_SESSION['image']; ?>" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION['nama']; ?> - <?php echo $_SESSION['usercode']; ?>
                  </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url('logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a data-toggle="control-sidebar"><?php echo $tanggal; ?></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li class="treeview <?= (@$treeview == 'menu') ? 'active' : ''; ?>">
            <a href="#">
              <i class="fa fa-tasks"></i> <span>Menu</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php 
                if ($_SESSION['role']=='admin') {
                  echo'
                  <li>
                    <a href="'.base_url('admin/daftar-dosen/').'">
                      <i class="fa fa-plus-square"></i>Daftar Dosen
                    </a>
                  </li>
                  <li>
                    <a href="'.base_url('admin/daftar-mahasiswa/').'">
                      <i class="fa fa-plus-square"></i>Daftar Mahasiswa
                    </a>
                  </li>
                  <li>
                    <a href="'.base_url('admin/daftar-matkul/').'">
                      <i class="fa fa-plus-square"></i>Daftar Matkul
                    </a>
                  </li>
                  <li>
                    <a href="'.base_url('admin/daftar-jadwal/').'">
                      <i class="fa fa-plus-square"></i>Daftar Jadwal
                    </a>
                  </li>
                  ';
                }elseif ($_SESSION['role']=='dosen') {
                  echo'
                  <li>
                    <a href="'.base_url('dosen/daftar-matkul/').'">
                      <i class="fa fa-plus-square"></i>Daftar Matkul
                    </a>
                  </li>
                  <li>
                    <a href="'.base_url('dosen/daftar-jadwal/').'">
                      <i class="fa fa-plus-square"></i>Daftar Jadwal
                    </a>
                  </li>
                  ';
                }
              ?>
              
            </ul>
          </li>
      </section>
      <!-- /.sidebar -->
    </aside>