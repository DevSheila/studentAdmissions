<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to signin page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: signin.php");
    exit;
}
include("config.php");

if(isset($_SESSION['admissionNumber'])){
  $studId = $_SESSION['stud_id'];

  $adm_no = $_SESSION['admissionNumber'];
  $surname = $_SESSION['surname'];
  $other_name = $_SESSION['other_name'];
  $age = $_SESSION['age'];
  $course = $_SESSION['course'];
  $phone = $_SESSION['phone'];
  $DOB = $_SESSION['DOB'];
  $image = $_SESSION['image'] ;
  $gender = $_SESSION['gender'];
  $surname = $_SESSION['surname'];
  $email = $_SESSION['email'];
  $stage2_statusfinder =  $_SESSION['status'];
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
  <!-- <link rel="stylesheet" href="print.css" media="print"/> -->
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
      <img src="img/Maseno-University-Logo.png" alt="Maseno University Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Maseno University</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- User image here -->
          <img src="<?php echo "userimg/".$image; ?>" style="height: 50px; width: 50px; border-radius: 50%;" alt="User Image">
        </div>
       
        <div class="info">
          <!-- username -->
          <br>
          <a href="#" class="d-block"><?php echo "$adm_no"?></a>
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
            <h1 class="m-0">My Portal</h1>
            <?php
             $stage3Status = "SELECT * FROM nominal_roll WHERE adm_no = '$adm_no'";
            $stage3Result = mysqli_query($conn,$stage3Status);
            while( $row = mysqli_fetch_array($stage3Result,MYSQLI_ASSOC)){
                $stage3_status= $row['status'];
            }
              
             if($stage3_status==="approved"){
              echo 'welcome ,'.$surname." ".$other_name." ".'  Password Reset <a href="reset.php">Here</a> ';
            }
            else{
               echo '<div>
               <p class="badge-danger">This is a Temporary Account. A valid Account will Be given to you upon Registration completion </p>
             </div>';
            }
            ?>
            
          </div><!-- /.col -->
         
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
              <li class="breadcrumb-item active"><?php echo $surname.",".$other_name;?></li>
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
                <h5 class="card-title">Finish Registration(Resubmit Only Declined Or No record Statuses)</h5>
              <br>
                
  <div class="mb-3">
    <!-- rename according to files -->
    <?php 
   $stage1_statusfinder='';
   $stage1Statusfinder = "SELECT * FROM docs_collected WHERE adm_no = '$adm_no'";
   $stage1Resultfinder = mysqli_query($conn,$stage1Statusfinder);
   while( $rowfinder = mysqli_fetch_array($stage1Resultfinder,MYSQLI_ASSOC)){
       $stage1_statusfinder= $rowfinder['status'];
      //  $image = $rowfinder['image'];
   
    if($stage1_statusfinder === "declined"){
   echo '<a href="stage1redo.php"><button class="btn btn-info">Stage I</button></a>';
    }else if($stage1_statusfinder==='complete'){
      echo '<a href="#"><button class="btn btn-info">Stage I(Pending Review)</button></a>';
    }else if($stage1_statusfinder===''){
      echo '<a href="stage1redo.php"><button class="btn btn-danger">Stage I(No Record)</button></a>';
    }
    else if($stage1_statusfinder === "approved"  || $stage1_statusfinder === "complete"){
      echo '<a href="stage1.php"><button class="btn btn-success">Stage I(Done)</button></a>';
    }
    }
  
  
    ?>
    <!-- if the previous is approved then display -->
    <!-- <a href="stage2.php"><button class="btn btn-info">Stage II</button></a> -->
    <?php 
   $stage2_statusfinder='';
   $stage2Statusfinder = "SELECT * FROM stud_profile WHERE adm_no = '$adm_no'";
   $stage2Resultfinder = mysqli_query($conn,$stage2Statusfinder);
   while( $rowfinder2 = mysqli_fetch_array($stage2Resultfinder,MYSQLI_ASSOC)){
       $stage2_statusfinder= $rowfinder2['status'];
   
    if($stage2_statusfinder === "declined"){
   echo '<a href="stage2redo.php"><button class="btn btn-info">Stage II</button></a>';
    }else if($stage2_statusfinder==='complete'){
      echo '<a href="#"><button class="btn btn-info">Stage II(Pending Review)</button></a>';
    }else if($stage2_statusfinder===''){
      echo '<a href="stage2redo.php"><button class="btn btn-danger">Stage II(No Record)</button></a>';
    }
    else if($stage2_statusfinder === "approved"){
      echo '<a href="stage2.php"><button class="btn btn-success">Stage II(Done)</button></a>';
    }
    }
  
  
    ?>
    <!-- <a href="stage3.php"><button class="btn btn-info">Stage III</button></a> -->
    <?php 
   $stage3_statusfinder='';
   $stage3Statusfinder = "SELECT * FROM nominal_roll WHERE adm_no = '$adm_no'";
   $stage3Resultfinder = mysqli_query($conn,$stage3Statusfinder);
   while( $rowfinder3 = mysqli_fetch_array($stage3Resultfinder,MYSQLI_ASSOC)){
       $stage3_statusfinder= $rowfinder3['status'];
   
    if($stage3_statusfinder === "declined"){
   echo '<a href="stage3redo.php"><button class="btn btn-info">Stage III</button></a>';
    }else if($stage3_statusfinder==='complete'){
      echo '<a href="#"><button class="btn btn-info">Stage III(Pending Review)</button></a>';
    }else if($stage3_statusfinder===''){
      echo '<a href="stage3redo.php"><button class="btn btn-danger">Stage III(No Record)</button></a>';
    }
    else if($stage3_statusfinder === "approved"){
      echo '<a href="stage3.php"><button class="btn btn-success">Stage III(Done)</button></a>';
    }
    }
  
  
    ?>
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
            <div class="card">
              <div class="card-header">
                <center><h5 class="m-0">Personal Details
                <button type="submit" name="edit" class="btn btn-success">Edit</button>
                <a   href = "studDetails.php" class="btn  btn-sm btn-success " >Print</a>
              </div>
              <table style="width:100%;">
  <tr>
    <th style="width:40%;"> Detail</th>
    <td>Information</td>
      </tr>
  <tr>
    <th>Surname:</th>
    <td class="bg bg-light"><?php echo $surname;?></td>
  </tr>
  <tr>
    <th>Other Names:</th>
    <td class="bg bg-light"><?php echo $other_name;?></td>
  </tr>
  <tr>
    <th>Course:</th>
    <td class="bg bg-light"><?php echo $course;?></td>
  </tr>
  <!-- <tr>
    <th>Study Year:</th>
    <td class="bg bg-light">Year</td>
  </tr> -->
  <tr>
    <th>Age:</th>
    <td class="bg bg-light"><?php echo $age;?></td>
  </tr>
</table>
            </div>

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
            $stage1Status = "SELECT * FROM docs_collected WHERE adm_no = '$adm_no'";
            $stage1Result = mysqli_query($conn,$stage1Status);
            while( $row = mysqli_fetch_array($stage1Result,MYSQLI_ASSOC)){
                $stage1_status= $row['status'];
            }
              
            if($stage1_status == ''){
              $stage1_status= 'no record <button class="btn-dark"><a href="stage1redo.php">Finish Here</a></button>';
            }
            
            
    ?>
     <td  class="bg 
                            <?php 
                            if($stage1_status== 'complete'){echo 'bg-primary';}
                            if($stage1_status == 'approved'){ echo 'bg-success';}
                            if($stage1_status == 'declined'){ echo 'bg-danger';}
                            if($stage1_status == 'no record <button  class="btn btn-dark"><a href="stage1redo.php">Finish Here</a></button>'){ echo 'bg-warning';}
                            ?>" >
                             <?php echo $stage1_status;?>
                           
  

    <td  class="bg 
                            <?php 
                            
                            if($stage2_statusfinder == 'complete'){echo 'bg-primary';}
                            if($stage2_statusfinder == 'approved'){ echo 'bg-success';}
                            if($stage2_statusfinder == 'declined'){ echo 'bg-danger';
                            }
                            if($stage2_statusfinder == 'no record <button  class="btn btn-dark"><a href="stage2.php">Finish Here</a></button>'){ echo 'bg-warning';}
                            ?>" >
                           
                            </td>
                           <th>
                           <?php if($stage1_status == 'declined'){
                              echo '<button  class="btn btn-danger"><a href="stage1redo.php">Resubmit  Stage 1 Here</a></button';
                            }
                       ?>
                           </th>
                              <tr>
    <th>Stage II:</th>
    <td class ="bg
                      <?php 
                            //Might remove $stdu_status because for changes to be reflected you'd have to logout and signin to have new session (done)
                           
                            if($stage2_statusfinder == 'complete'){echo 'bg-primary';}
                            if($stage2_statusfinder == 'approved'){ echo 'bg-success';}
                            if($stage2_statusfinder == 'declined <button  class="btn btn-dark"><a href="stage2.php">Resubmit  Here</a></button>'){ echo 'bg-danger';}
                            if($stage2_statusfinder == 'no record <button  class="btn btn-dark"><a href="stage2.php">Finish Here</a></button>'){ echo 'bg-warning';}
                            ?>" >
                            <?php if($stage1_status == 'approved'){
                              echo $stage2_statusfinder;
                       ?>
       
                            <?php
                            }else if ($stage1_status != 'approved'){
                              $stage2_statusfinder = 'pending Review';
                              echo $stage2_statusfinder;
                            }
                            ?>
                         
       </td>
  </tr>
  <th>Stage III:</th>
    <?php
            
            $stage3_status='';
            $stage3Status = "SELECT * FROM nominal_roll WHERE adm_no = '$adm_no'";
            $stage3Result = mysqli_query($conn,$stage3Status);
            while( $row = mysqli_fetch_array($stage3Result,MYSQLI_ASSOC)){
                $stage3_status= $row['status'];
            }
              
            if($stage3_status == ''){
              $stage3_status= 'no record <button  class="btn btn-dark">Visit School Administration For completion</button>';
            }
            
    ?>
     <td  class="bg 
                            <?php 
                            if($stage3_status== 'complete'){echo 'bg-primary';}
                            if($stage3_status == 'approved'){ echo 'bg-success';}
                            if($stage3_status == 'declined <button  class="btn btn-dark"><a href="stage3.php">Resubmit  Here</a></button>'){ echo 'bg-danger';}
                            if($stage3_status == 'no record'){ echo 'bg-warning';}
                            ?>" >
                             <?php if($stage2_statusfinder == 'approved'){
                            ?>
       
                            <?php
                            }else if ($stage2_statusfinder != 'approved'){
                              $stage3_status = 'pending Review';
                            }
                            ?>
                            
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
     School Of Computing And Informatics
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
