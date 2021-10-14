<?php
// Initialize the session
session_start();
 
// // Check if the user is logged in, if not then redirect him to signin page
// if(!isset($_SESSION["adminloggedin"]) || $_SESSION["adminloggedin"] !== true){
//     header("location: adminsignin.php");
//     exit;
// }
        include("config.php");
        
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Maseno | Admin-DashBoard</title>

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
  <script src="jquery.min.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>	
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="img/Maseno-University-Logo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link active"><strong>Home</strong></a>
      </li>

      <!-- SidebarSearch Form -->
      
      <div class="search-box">
        <input type="text" autocomplete="off" placeholder=" Search Student....." />
        <!-- <i class='fa fa-search'></i> -->
        <div class="result"></div>
</div>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="img/Maseno-University-Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ADMISSIONS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo "userimg/".$_SESSION['image']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <p style="color:white;"> 
                    <?php
                    //sort out the undefined later
                                    if(($_SESSION['admin_id'] == '' ) ||($_SESSION['admin_name'] == '')){
                                      // $_SESSION['admin_id']='1234';
                                      // $_SESSION['admin_name']='caleb' ;
                                  }
                       echo $_SESSION['admin_name'].'<br>' ;

                       echo $_SESSION['admin_id'] ;

                       
                        
                      
                    ?>
              </p> <br>

              <a href="logout.php">LOGOUT</a>

            
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
                <a href="home.php" class="nav-link active">
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
                <a href="adminStage2.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stage 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="adminStage2.php" class="nav-link">
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
    <!-- Main content -->
    <section class="content ">
      <div class="container-fluid ">
      <style>
        /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
        margin-left: 600px;
    }
    
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid blueviolet; 
        /* border: none; */
        /* outline: none; */
        font-size: 14px;
        border-radius: 15px; 
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        background-color: #f2f2f2;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        background-color: #f2f2f2;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
     
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-4 m-3">
            <!-- small box -->
            <div class="small-box bg-navy">
              <div class="inner">
                <h3>STAGE 1</h3>
                <?php
                
                
                $stage1Sql = "SELECT * FROM docs_collected";
                $stage1Result = mysqli_query($conn,$stage1Sql);
                // $active = $row['active'];
                
                $stage1Count = mysqli_num_rows($stage1Result);

                echo "<h4>$stage1Count records</h4>";
              ?>

                <p>Documents Collection and Verification</p>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
              <a href="adminStage1.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-4 m-3 ">
            <!-- small box -->
            <div class="small-box bg-gray">
              <div class="inner">
                <h3>STAGE 2</h3>
                <?php
                
                
                $stage2Sql = "SELECT * FROM stud_profile";
                $stage2Result = mysqli_query($conn,$stage2Sql);
                // $active = $row['active'];
                
                $stage2Count = mysqli_num_rows($stage2Result);

                echo "<h4>$stage2Count records</h4>";
              ?>

                <p>Personal Details</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="adminStage2.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
            <!-- ./col -->
            <div class="col-lg-3 col-4 m-3 ">
            <!-- small box -->
            <div class="small-box bg-gray disabled">
              <div class="inner">
                <h3>STAGE 3</h3>           
                <?php
                
                
                $stage3Sql = "SELECT * FROM nominal_roll";
                $stage3Result = mysqli_query($conn,$stage3Sql);
                // $active = $row['active'];
                
                $stage3Count = mysqli_num_rows($stage3Result);

                echo "<h4>$stage3Count records</h4>";
              ?>

                <p>Nominal Roll</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="adminStage3.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <div class="row m-5">
        
          <!-- ./col -->
        
          <!-- ./col -->
        </div>
       
   
   

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- Search script -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
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


