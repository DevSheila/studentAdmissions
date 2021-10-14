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
  <link rel="stylesheet" href="print1.css" media="print"/>

<style>
  a{
    color:black;
  }
  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">

  <?php
    session_start();
    $_SESSION['paginate']='false';
    if( $_SESSION['admin_id'] == ''){
      header("Location:adminsignin.php");
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
        <a href="home.php" class="nav-link">Home</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="adminStage1.php" class="nav-link active">  <strong>Records</strong></a>
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
                <a href="adminStage1.php" class="nav-link active">
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
                <a href="adminStage3.php" class="nav-link">
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
            <h1 class="m-0">Stage 1: Documents Collection and Verification</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Stage 1 Records</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php
    include("config.php");




    
    // Check connection
    if (!$conn ||mysqli_connect_errno()) {
      echo("Connection failed: " . mysqli_connect_error());
    }else{

   
    
    
        
        $sql = "SELECT * FROM docs_collected ";
        $result = mysqli_query($conn,$sql);
        // $active = $row['active'];
        
        $count = mysqli_num_rows($result);

     
      
        

        
      
        if($count > 0) {
        // If there's a record of current student
          ?>
          <section class="container">
 
          </section>
         <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                
                
                  $allRecordsSql = "SELECT * FROM docs_collected";
                  $allRecordsResult = mysqli_query($conn,$allRecordsSql);
                  // $active = $row['active'];
                  
                  $allRecordsCount = mysqli_num_rows($allRecordsResult);

                  echo "<h3>$allRecordsCount</h3>";
                ?>
                

                <p>Total Stage 1 Records</p>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
           
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                
                
                  $completeStatusSql = "SELECT * FROM docs_collected WHERE status = 'complete'";
                  $completeStatusResult = mysqli_query($conn,$completeStatusSql);
                  // $active = $row['active'];
                  
                  $completeStatusCount = mysqli_num_rows($completeStatusResult);

                  echo "<h3>$completeStatusCount</h3>";
                ?>
                

                <p>Complete</p>
              </div>
              <div class="icon">
                <i class="ion  ion-checkmark"></i>
              </div>
           
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
                
                
                $approvedStatusSql = "SELECT * FROM docs_collected WHERE status = 'approved'";
                $approvedStatusResult = mysqli_query($conn,$approvedStatusSql);
                // $active = $row['active'];
                
                $approvedStatusCount = mysqli_num_rows($approvedStatusResult);

                echo "<h3>$approvedStatusCount</h3>";
              ?>

                <p>Aproved</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php
                
                
                $declinedStatusSql = "SELECT * FROM docs_collected WHERE status = 'declined'";
                $declinedStatusResult = mysqli_query($conn,$declinedStatusSql);
                // $active = $row['active'];
                
                $declinedStatusCount = mysqli_num_rows($declinedStatusResult);

                echo "<h3>$declinedStatusCount</h3>";
              ?>

                <p>Declined</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            
            </div>
          </div>
          <!-- ./col -->
        </div>
    </div>
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Stage 1 - Document Collection & Verifctation</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body p-0">
  
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th >
                    #SERIAL
                </th>
                <th >
                   ID
                </th>
                <th >
                   STUDENT
                </th>
                <th>
                    ADM_NO
                </th>
                <th  class="text-center">
                    ADM LETTER
                </th>

                <th>
                KCSE CERT/ SLIP
                </th>


                <th>
                BIRTH CERT/ NATIONAL ID
                </th>

                <th>
               STATUS
                </th>

                <th>
               ACTION
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
        $serial = 0;
         while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $docId= $row['id']; 
           $name = $row['name'];
           $adm_no=$row['adm_no'];
           $admLetter = $row['adm_letter'];
           $kcseCert= $row['kcse_certificate'];
           $birthCert= $row['id_birth_cert']; 
           $docStatus= $row['status']; 
           $docdateSubmitted= $row['date_submitted']; 
           $serial ++;
           ?>
           
            <tr>
                <td>
                    <?php echo $serial?>
                </td>
                <td>
                    <?php echo $docId?>
                </td>
                <td>
                <?php echo $name?>
                </td>

                <td>
                <?php echo $adm_no?>
                </td>
                <td >
                <a href="stage1Action.php?file=<?php echo $admLetter?>"><?php echo $admLetter;?> <i class="fa fa-download" aria-hidden="true"></i></a>
           
                </td>

                <td>
                <a href="stage1Action.php?file=<?php echo $kcseCert?>"><?php echo $kcseCert;?> <i class="fa fa-download" aria-hidden="true"></i></a>

                </td>

                <td>
                <a href="stage1Action.php?file=<?php echo $birthCert;?>"><?php echo $birthCert;?> <i class="fa fa-download" aria-hidden="true"></i></a>
               

                </td>

                <td>
                <div class="input-group-prepend">
                    <button type="button"
                            class="btn 
                            <?php 
                            if($docStatus == 'complete'){echo 'btn-primary';}
                            if($docStatus == 'approved'){ echo 'btn-success';}
                            if($docStatus == 'declined'){ echo 'btn-danger';}?> 
                              dropdown-toggle"
                            data-toggle="dropdown">
                    <?php echo $docStatus?>

                    </button>
                    <ul class="dropdown-menu">
                      <li class="dropdown-item"><a href="bsStage1.php?updateApproved=<?php echo $docId?>">Approved</a></li>
                      <li class="dropdown-item"><a href="bsStage1.php?updateDeclined=<?php echo $docId?>">Declined</a></li>
             
                    </ul>
                  </div>

                </td>


            
                <td class="project-actions text-right">
               
                    <a class="btn btn-info btn-sm" href="bsStage1.php?edit=<?php echo $docId?>">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="stage1Action.php?delete=<?php echo $docId?>">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                    </a>
                </td>
            </tr>

            <?php
         }

         ?>

            
        

        </tbody>
    </table>

    <div class="d-flex justify-content-center m-1">
         <a  class="btn  btn-sm btn-primary print-btn" onclick ="window.print();" id="login-btn" >Print</a>
                               
    </div>

    <nav aria-label="Page navigation example " class ="m-2">
  <ul class="pagination justify-content-end">

    <li class="page-item"><a class="page-link" href="adminStage1.php?pagination=<?php echo 1 ?>">1</a></li>
    <li class="page-item"><a class="page-link" href="adminStage1.php?pagination=<?php echo 3?>">2</a></li>
    <li class="page-item"><a class="page-link" href="adminStage1.php?pagination=<?php echo 6?>">3</a></li>
    <li class="page-item">
      <a class="page-link" href="bsStage1.php?pagination=<?php echo 12?>">Next</a>
    </li>
  </ul>
</nav>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->


   

</section>
         
            

   
       <?php
         
    
        }else{
        ?>

   <section>
     
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



