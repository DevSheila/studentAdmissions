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

  <link rel="stylesheet" href="print.css" media="print"/>


</head>
<body class="hold-transition sidebar-mini layout-fixed">

  <?php
    session_start();
$_SESSION['paginate']='false';


  ?>
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="img/Maseno-University-Logo.png" alt="MasenoLogo" height="60" width="60">
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
        <a href="adminStage2.php" class="nav-link active">  <strong>Records</strong></a>
      </li>

      <li class="nav-item d-none d-sm-inline-block ">
        <a href="signup.php" class="nav-link"> <strong>Form </strong></a>
      </li>
   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="img/Maseno-University-Logo.png" alt="Maseno Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ADMISSIONS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/woman.jpg" class="img-circle elevation-2" alt="User Image">
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
                <a href="adminStage1.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stage 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="adminStage2.php" class="nav-link active">
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
            <h1 class="m-0">Stage 2: StudentPersonal Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Stage 2 Records</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php
    include("config.php");
        if(isset($_GET['page_no']) && $_GET['page_no']!=""){
          $page_no = $_GET['page_no'];
        }else{
          $page_no = 1;
        }
        //fails with a bigger number???????????
        $total_records_per_page = 3;
        $endpoint =($page_no - 1)*$total_records_per_page;
        $prev_page = $page_no - 1;
        $nxt_page = $page_no + 1;
        // $adjacents = "2"; 
        
        //>>>>>>>>>>>>>>>  PAGINATION RECORD <<<<<<<<<<<

    //get the total number of pages for pagination

          $sql_counter ="SELECT COUNT(*) AS total_records  FROM stud_profile";

    
          $result = mysqli_query($conn,$sql_counter);
          // $active = $row['active'];
          $total_records = mysqli_fetch_array($result);
          $total_records = $total_records['total_records'];
          //We need to find the number of pages by dividing the total records by the number of records per page 
       //ceil() rounds up decimals to nearest integer
          $page_count = ceil($total_records / $total_records_per_page);
          $second_last = $page_count - 1;
          // $count = mysqli_num_rows($result);

        //we use our $endpoint as limit
        $query =" SELECT *  FROM stud_profile LIMIT $endpoint, $total_records_per_page";
      $countsql = mysqli_query($conn, $query);
        ?>
         <!-- Main content -->
    <section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Stages- Student Personal Details</h3>

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
                   EMAIL
                </th>

                <th>
               AGE
                </th>


                <th>
               GENDER
                </th>

                <th>
                    DOB
                </th>

                <th>
              PHONE
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
        
         while( $row = mysqli_fetch_array($countsql,MYSQLI_ASSOC)){
           $docId= $row['id']; 
           $surname = $row['surname'];
           $othername = $row['other_name'];
           $name=$surname." ".$othername;
           $email = $row['email'];
           $phone = $row['phone'];
           $age = $row['age'];
           $gender = $row['gender'];
           $docStatus= $row['status']; 
           $adm_no=$row['adm_no'];
          $dob=$row['DOB'];

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
                <?php echo $email?>
                </td>

                <td>
                <?php echo $age?>
                </td>

                <td>
                <?php echo $gender?>

                </td>

                <td>
                <?php echo $dob?>

                </td>

                <td>
                <?php echo $phone?>

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
                      <li class="dropdown-item"><a href="bsStage2.php?updateApproved=<?php echo $docId?>">Approved</a></li>
                      <li class="dropdown-item"><a href="bsStage2.php?updateDeclined=<?php echo $docId?>">Declined</a></li>
             
                    </ul>
                </div>

                </td>


            
                <td class="project-actions text-right">
               
                    
                    <a class="btn btn-danger btn-sm" href="stage2Action.php?delete=<?php echo $docId?>">
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
    <center>
    <div class="pagination justify-content-end" style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$page_count; ?></strong>
</div>
<ul  class="pagination justify-content-end">
  <?php if($page_no > 1){
  echo "<li  class='page-item'><a class= `page-link` href='?page_no=1'>First Page</a></li>";
  }  ?>
  <li  class="page-item" <?php if($page_no <= 1){echo "class='disabled page-item'";}?>>
  <a class="page-link" <?php if ($page_no > 1){echo " href='?page_no=$prev_page'";
  } ?>>Previous</a>
   </li>
   <li  class="page-item" <?php if($page_no >=$page_count){
     echo "class='disabled page-item'";
   }?>>
  <a class="page-link " <?php if($page_no < $page_count){
    echo"href='?page_no=$nxt_page'";
    }?> >Next</a> 
  </li>
  <?php if($page_no < $page_count){
    echo "<li  class='page-item'><a class= `page-link` href='?page_no=$page_count'>Last>></a></li>";
  }?>

</ul>
</center>
    <div class="d-flex justify-content-center m-1">
      <!-- personal details download -->
         <a  class="btn  btn-sm btn-primary print-btn" href="stage2Details.php "id="login-btn" >Print</a>
                               
    </div>

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->


   

</section>
         
            

   
     
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
         
        <div class="row">
        <div class="col-md-2"></div>
      
          <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Documents Collection and Verification</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="bsStage1.php"  enctype="multipart/form-data">
                <div class="card-body">
                <p>Select an image less than 2MB with (.jpeg , .jpg, .png extension)</p>
                  <div class="form-group">
                    <label for="profile" >ADMISSION LETTER </label>
                      <input type="file" class="form-control " id="admLetter" name="admLetter"/>
                  </div>
                  <div class="form-group">
                    <label for="profile" >KCSE CERTIFICATE / RESULT SLIP</label>
                      <input type="file" class="form-control " id="kcseCert" name="kcseCert"/>
                  </div>

                  <div class="form-group">
                    <label for="profile" >ID/BIRTH CERTIFICATE</label>
                      <input type="file" class="form-control " id="bithCert" name="birthCert"/>
                  </div>

               
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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


