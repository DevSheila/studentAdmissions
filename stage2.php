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
    include("config.php");
    if($_SESSION['logged_student_admission'] == null){
      header("Location:signin.php");
    }

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
        <a href="student.php" class="nav-link">Home</a>
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
                  <a href="student.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Home</p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="stage1.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stage 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="stage2.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stage 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="stage3.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stage  3</p>
                </a>
              </li>
            </ul>
              
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
            <h1 class="m-0">Stage 2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="student.php">Home</a></li>
              <li class="breadcrumb-item active">Stage 2 -PERSONAL DETAILS</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php



    
    // Check connection
    if (!$conn ||mysqli_connect_errno()) {
      echo("Connection failed: " . mysqli_connect_error());
    }else{
      
        
    
       $adm_no=$_SESSION['logged_student_admission'];

    
    
        
        $sql = "SELECT * FROM stud_profile WHERE adm_no = '$adm_no'";
        $result = mysqli_query($conn,$sql);
        // $active = $row['active'];
        
        $count = mysqli_num_rows($result);
        
      
      if($count > 0) {
        // If there's a record of current student
          ?>
          <div class="container">
            <div class="row">
   
         
            
          <?php
         while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $surname = $row['surname'];
            $othername = $row['other_name'];

           $name=$surname." ".$othername;
           $admNo = $row['adm_no'];
           $email = $row['email'];
           $phone = $row['phone'];
           $age = $row['age'];
           $gender = $row['gender'];
           $status= $row['status']; 

           ?>
           

           <div class="col-12 col-md-12 col-sm-12  d-flex align-items-stretch flex-column">
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Personal Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <strong><i class="fas fa-user mr-1"></i>STUDENT NAME</strong><br>
              
              <p class="text-muted"><?php echo $name;?></p>

              <hr>

              <strong><i class="fas fa-address-card mr-1"></i>ADMISSION NUMBER</strong><br>
              <p class="text-muted"><?php echo $admNo?></p>

              <hr>

              <strong><i class="fas fa-address-card mr-1"></i>EMAIL</strong><br>
              <p class="text-muted"><?php echo $email?></p>

              <hr>

              <strong><i class="fas fa-address-card mr-1"></i>PHONE</strong><br>
              <p class="text-muted"><?php echo $phone?></p>

              <hr>

              <strong><i class="fas fa-address-card mr-1"></i>AGE </strong><br>
              <p class="text-muted"><?php echo $admNo?></p>

              <hr>

              <strong><i class="fas fa-address-card mr-1"></i>GENDER</strong><br>
              <p class="text-muted"><?php echo $admNo?></p>

              <hr>

              <strong><i class="fas fa-address-card mr-1"></i>STATUS</strong><br>
              <p class="text-muted"><?php echo $status?></p>

              <hr>

              
  
          
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <?php
         }

         ?>
     
         </div>
          </div>
       <?php
         
    
        }else{
        ?>
<section class="content">
      <div class="col-12 col-md-12 col-sm-12  d-flex align-items-stretch flex-column">
           <div class="card card-primary">
              <div class="card-header text-center">
                <h3 class="card-title text-center">STUDENT PERSONAL DETAILS</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body text-center">
                <h3>No Records available</h3>
                <a href="signup.php" type="button" class="btn btn-primary">Enter Record</a>
              </div>
           </div>
      </div>
</section>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->


        <?php
        }
     
    }
    ?>


 </div>
<!-- ./wrapper -->

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


