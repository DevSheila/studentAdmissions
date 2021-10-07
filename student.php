<?php
session_start();
include("config.php");

if($_SESSION['logged_student_admission'] == ''){
  header("Location:signin.php");
}

if(isset($_SESSION['admissionNumber'])){
  $studId = $_SESSION['stud_id'];

  $adm_no = $_SESSION['logged_student_admission'];
  $surname = $_SESSION['surname'];
  $other_name = $_SESSION['other_name'];
  $age = $_SESSION['age'];
  $course = $_SESSION['course'];
  $phone = $_SESSION['phone'];
  $DOB = $_SESSION['DOB'];
  $image = $_SESSION['image'] ;
  $gender = $_SESSION['gender'];
  $surname = $_SESSION['surname'];
  $stud_status =  $_SESSION['status'];


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Maseno University | Student Portal</title>
<link rel="icon" href="dist/img/Maseno-University-Logo.png" type="image/icon type">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="print.css" media="print"/>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Academics</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Finance</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Sports</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">About Maseno</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
           
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav> 
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/Maseno-University-Logo.png" alt="Maseno University Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Maseno University</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- User image here -->
          <img src="dist/img/avatar3.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <!-- username -->
          <a href="#" class="d-block"><?php echo  $_SESSION['logged_student_name']?></a>
          <a href="#" class="d-block"><?php echo  $_SESSION['logged_student_admission']?></a>
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
                Student Information
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Profile</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                <!-- Simple Link -->
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
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
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
              <li class="breadcrumb-item active"><?php echo  $_SESSION['logged_student_name']?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Finish Registration</h5>
              <br>
                
  <div class="mb-3">
    <!-- rename according to files -->
    <a href="stage1.php"><button class="btn btn-info">Stage I</button></a>
    <!-- if the previous is approved then display -->
    <a href="stage2.php"><button class="btn btn-info">Stage II</button></a>
    <a href="stage3.php"><button class="btn btn-info">Stage III</button></a>
  </div>
  


              </div>
            </div>
<!-- Some of the table have to be empty until the registration is complete -->
            <div class="card card-primary card-outline">
              <div class="card-body">
              <center> <h5 class="card-title">Academic Details</h5></center>
   
              </div>
              <table>
                <tr>
    <th>Personal Detail</th>
    <td><b>Information</b></td>
  </tr>
  <tr>
    <!-- dummy result slip as a link -->
    <th>Provisional Transcript:</th>
    <td class="bg bg-warning">Not Ready To Download</td>
  </tr>
  
</table>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
        

            <div class="card card-primary card-outline">
              <div class="card-header">
              <center>  <h5 class="m-0">Registration Status</h5></center>
              </div>
              <div class="card-body">
                <h6 class="card-title"></h6>
                <!-- <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style> -->
<?php
$status ="";
$query="SELECT status stud_profile"

?>
                <table style="width:100%;">
  <tr>
    <th>Stage</th>
    <td>Status:</td>
  </tr>
  <tr>
    <th>Stage I:</th>
    <?php
            $stage1_status='';
            $adm_no = $_SESSION['logged_student_admission'];
            $stage1Status = "SELECT * FROM docs_collected WHERE adm_no = '$adm_no'";
            $stage1Result = mysqli_query($conn,$stage1Status);
            while( $row = mysqli_fetch_array($stage1Result,MYSQLI_ASSOC)){
                $stage1_status= $row['status'];
            }
              
            if($stage1_status == ''){
              $stage1_status= 'no record';
            }
            
    ?>
     <td  class="bg 
                            <?php 
                            if($stage1_status== 'complete'){echo 'bg-primary';}
                            if($stage1_status == 'approved'){ echo 'bg-success';}
                            if($stage1_status == 'declined'){ echo 'bg-danger';}
                            if($stage1_status == 'no record'){ echo 'bg-warning';}
                            ?>" >
                             <?php echo $stage1_status;?>
       </td>
  <tr>
    <th>Stage II:</th>
    <?php
            
            $stage2_status='';
            $stage2Status = "SELECT * FROM docs_collected WHERE adm_no = '$adm_no'";
            $stage2Result = mysqli_query($conn,$stage2Status);
            while( $row = mysqli_fetch_array($stage2Result,MYSQLI_ASSOC)){
                $stage2_status= $row['status'];
            }
              
            if($stage2_status == ''){
              $stage2_status= 'no record';
            }
            
    ?>
    <td  class="bg 
                            <?php 
                            if($stage2_status == 'complete'){echo 'bg-primary';}
                            if($stage2_status == 'approved'){ echo 'bg-success';}
                            if($stage2_status == 'declined'){ echo 'bg-danger';}
                            if($stage1_status == 'no record'){ echo 'bg-warning';}
                            ?>" 
                            ><?php echo $stage2_status ;?>
       </td>
  </tr>
  <th>Stage III:</th>
    <?php
            
            $stage3_status='';
            $adm_no ='';
            $stage3Status = "SELECT * FROM nominal_roll WHERE adm_no = '$adm_no'";
            $stage3Result = mysqli_query($conn,$stage3Status);
            while( $row = mysqli_fetch_array($stage3Result,MYSQLI_ASSOC)){
                $stage3_status= $row['status'];
            }
              
            if($stage3_status == ''){
              $stage3_status= 'no record';
            }
            
    ?>
     <td  class="bg 
                            <?php 
                            if($stage3_status== 'complete'){echo 'bg-primary';}
                            if($stage3_status == 'approved'){ echo 'bg-success';}
                            if($stage3_status == 'declined'){ echo 'bg-danger';}
                            if($stage3_status == 'no record'){ echo 'bg-warning';}
                            ?>" >
                             <?php echo $stage3_status;?>
       </td>

</table>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2001-2021 <a href="https://maseno.ac.ke">Maseno University</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
