<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">


</head>
<body class="hold-transition sidebar-mini layout-fixed">

  <?php
    session_start();
    // $update= false;
    // $name = '';
    // $admNo='';
    // $admLetter ='';
    // $birthCert ='';
    // $kcseCert ='';

  ?>
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link">Home</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="adminStage3.php" class="nav-link"> Records</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block active">
        <a href="adminStage3Form.php" class="nav-link"> <strong>Form </strong></a>
      </li>
   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ADMISSIONS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <h5 style="color:white;"> 
                    <?php

if(($_SESSION['admin_id']=='' ) ||($_SESSION['admin_name'] == '')){
    $_SESSION['admin_id']=='1234';
    $_SESSION['admin_name']=='caleb' ;
}
                        echo$_SESSION['admin_name']."-";

                       echo $_SESSION['admin_id'] ;
                      
                    ?>
              </h5>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="home.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="adminStage1.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stage 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="adminStage2.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stage 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="adminStage3.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stage  3</p>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Stage 3: NOMINAL ROLL</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Stage 3 Forms</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-2"></div>
      
          <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">NOMINAL ROLL</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="bsStage3.php"  enctype="multipart/form-data">
                <div class="card-body">
                <p>Select a document less than 4MB with (.pdf , .txt extension)</p>

                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']?>" class="form-control" >
                  </div>
                <div class="form-group">
                    <label for="exampleInputstudentName1">STUDENT NAME</label>
                    <input type="text" name="studentName" value="<?php echo $_SESSION['name']?>" class="form-control" id="exampleInputstudentName1" placeholder="Student Name">
                  </div>
         
                  <div class="form-group">
                    <label for="exampleInputadmno1">ADM NO</label>
                    <input type="text" name="admno" value="<?php echo  $_SESSION['admNo']?>" class="form-control" id="exampleInputadmno1" placeholder="Student admission number">
                  </div>
     

                  <div class="form-group">
                    <label for="feesfile" >BANK SLIP /CHEUQUE</label>
                    <input type="file" class="form-control " id="feesfile" name="feesfile"/>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputstudentName1">FEESTOTAL</label>
                    <input type="number" name="feestotal" value="" class="form-control" id="exampleInputstudentName1" placeholder="Fees Paid Total">
                  </div>
         
                  <div class="form-group">
                    <label for="exampleInputadmno1">ACCOMODATION PLAN</label>
                    <!-- <input type="text" name="admno" value="" class="form-control" id="exampleInputadmno1" placeholder="Student admission number"> -->
                    <select class="form-control" id="accomodation" name="accomodation"  required >
                        <option value="resident">Resident</option>
                        <option value="non resident">Non Resident </option>
                         
                    </select>  
                </div>
     

               
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <?php

                  if($_SESSION['update'] == 'true'){
                    ?>
                    <!-- <a type="submit" class="btn btn-success" name ="update" href="bsStage1.php?update">Update</a> -->
                    <button type="submit" class="btn btn-success" name ="update">Update</button>

                  <?php
                   }else{
                  ?>
                  <button type="submit" class="btn btn-primary" name ="save">Submit</button>

                  <?php
                    }
                  ?>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
      
            <div class="col-md-2"></div>
          
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->



 </div>
<!-- ./wrapper -->

</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>


