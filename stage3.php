<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Portal </title>

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

  ?>
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
        <a href="student.php" class="nav-link">Home</a>
      </li>
   
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
            <h1 class="m-0">Stage 3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="student.php">Home</a></li>
              <li class="breadcrumb-item active">Stage 3</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php
    include("config.php");
    $surname = $_SESSION['surname'];
    $other_name = $_SESSION['other_name'];
    $name=$surname." ".$other_name;
    $adm_no=$_SESSION['admissionNumber'];
    // $_SESSION['admin']=$adm_no;


    
    // Check connection
    if (!$conn ||mysqli_connect_errno()) {
      echo("Connection failed: " . mysqli_connect_error());
    }else{
      
        
      $_SESSION['admissionNumber']=$adm_no;
    
    
        
        $sql = "SELECT * FROM nominal_roll WHERE adm_no = '$adm_no'";
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
           $name = $row['name'];
           $admNo = $row['adm_no'];
           $docId= $row['id']; 
           $fees_file = $row['fees_file'];
           $fees_total= $row['fees_total'];
          
           $docStatus= $row['status']; 
           $accomodation= $row['accomodation']; 
           ?>
           

           <div class="col-12 col-md-12 col-sm-12  d-flex align-items-stretch flex-column">
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Nominall Roll</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <strong><i class="fas fa-user mr-1"></i>STUDENT NAME</strong><br>
              
              <p class="text-muted"><?php echo $name;?></p>

              <hr>

              <strong><i class="fas fa-address-card mr-1"></i>ADMISSION NUMBER</strong><br>
              <p class="text-muted"><?php echo $admNo?></p>

              <hr>

               <strong><i class="far fa-file-alt mr-1"></i>ACCOMODATION</strong><br>
               <p class="text-muted"><?php echo $accomodation;?></p>


          
                <hr>
                <strong><i class="fas fa-book mr-1"></i>FEES FILE</strong> <br>
                <a href="stage3Action.php?file=<?php echo $fees_file?>"><?php echo $fees_file;?> <i class="fa fa-download" aria-hidden="true"></i></a>

                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i>FEES TOTAL</strong><br>
                <p class="text-muted"><?php echo $fees_total;?></p>

                <hr>

           


                <!-- <strong><i class="fas fa-calendar-alt mr-1"></i>DATE SUBMITTED</strong><br>
                
                <p class="text-muted"><?php// echo  $docdateSubmitted; ?></p>
                <hr> -->


                
                <strong>STATUS<br>
                
                <p class="text-muted"><?php echo $docStatus; ?></p>

  
          
              </div>
              <center>
    <div>
              <p class="badge-dark">This stage has been approved , 
                if the documents are not the ones you submitted visit the Administrator or 
                <a href="tel:+245723383534"><i class="fa fa-phone"> </i> Call Us  &nbsp;+245723383534</a></p>
            </div>
    </center>
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
              <form id="quickForm" method="POST" action="stage1.php"  enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="profile" >Surname</label>
                      <input type="text" class="form-control " id="surname" name="surname" disabled selected value="<?php echo $surname;?>"/>
                  </div>
                  <div class="form-group">
                    <label for="profile" >Other Names</label>
                      <input type="text" class="form-control " id="other_name" name="other_name"disabled selected value="<?php echo $other_name;?>"/>
                  </div>
                  
                <p>Select a document less than 4MB with (.pdf , .txt extension)</p>
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
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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


        <?php
        }
     
      }
    ?>
    <?php
    $birthCert=$kcseCert=$admLetter="";
    if(isset($_POST['submit'])){
      $errors= array();
      $time = time();
    //use our session to insert names as a concertination of surname and other_name 
    $surname = $_SESSION['surname'];
    $other_name = $_SESSION['other_name'];
    // if we need to separate the names explode the comma
    $name=$surname.", ".$other_name;
      //adm letter
            $adm_letter_name = $_FILES['admLetter']['name'];
            $adm_letter_size =$_FILES['admLetter']['size'];
            $adm_letter_tmp =$_FILES['admLetter']['tmp_name'];
            $adm_letter_type=$_FILES['admLetter']['type'];
            // $adm_letter_ext=strtolower(end(explode('.',$_FILES['admLetter']['name'])));
            $adm_letter_image_name = $time."_".$adm_letter_name;

      //kcse cert
            $kcseCert_name = $_FILES['kcseCert']['name'];
            $kcseCert_size =$_FILES['kcseCert']['size'];
            $kcseCert_tmp =$_FILES['kcseCert']['tmp_name'];
            $kcseCert_type=$_FILES['kcseCert']['type'];
            // $kcseCert_ext=strtolower(end(explode('.',$_FILES['kcseCert']['name'])));
            $kcseCert_image_name = $time."_".$kcseCert_name;

      //birth cert
            $birthCert_name = $_FILES['birthCert']['name'];
            $birthCert_size =$_FILES['birthCert']['size'];
            $birthCert_tmp =$_FILES['birthCert']['tmp_name'];
            $birthCert_type=$_FILES['birthCert']['type'];
            // $birthCert_ext=strtolower(end(explode('.',$_FILES['birthCert']['name'])));
            $birthCert_image_name = $time."_".$birthCert_name;


          $time = time();
          $extensions= array("pdf","txt");
          //check if image file is of  a valid  extension
                // if((in_array($adm_letter_ext,$extensions)=== false)  || (in_array($kcseCert_ext,$extensions)=== false) || (in_array($birthCert_ext,$extensions)=== false)){
                //   $errors[]="extension not allowed, please choose a PDF or txt file.";
                //   $_SESSION['msg1']="extension not allowed, please choose a PDF or txt file.";
                // }
              
              if(($adm_letter_size > 4097152) || ($birthCert_size > 4097152) || ($kcseCert_size > 4097152)){
                  $errors[]='File size must be less than or equal to  4 MB';
                  $_SESSION['msg2']="File size must be less than or equal to  4 MB'.";
              }
        
            if(empty($errors)==true){
                $image_dir = "studDocuments";
                //for session
                $admLetter_session = "$image_dir/$adm_letter_image_name";
                move_uploaded_file($adm_letter_tmp,"$image_dir/$adm_letter_image_name");

                $kcseCert_session = "$image_dir/$kcseCert_image_name";
                move_uploaded_file($kcseCert_tmp,"$image_dir/$kcseCert_image_name");

                $birthCert_session = "$image_dir/$birthCert_image_name";
                move_uploaded_file($birthCert_tmp,"$image_dir/$birthCert_image_name");
                //.".".$img_ext)
                // echo "Success";
                // print_r($new_image_name);
                $date = date("l jS \of F Y h:i:s A");
              
                $_SESSION['image'] = $_FILES["kcseCert"]["name"];
            
        
                          // Check connection
                  if (!$conn ||mysqli_connect_errno()) {
                    echo("Connection failed: " . mysqli_connect_error());
                  }else{
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                      // username and password sent from form 
                      // $myusername = mysqli_real_escape_string($conn,$_POST['username']);
                      // $myemail= mysqli_real_escape_string($conn,$_POST['email']);
                      // $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
              //for first time users , declined users will have to try and update  WHERE adm_no= '$adm_no'
                      $sql ="INSERT INTO docs_collected( adm_no, name, adm_letter, kcse_certificate, id_birth_cert, status, date_submitted) 
                      VALUES ('$adm_no','$name','$adm_letter_image_name','$kcseCert_image_name','$birthCert_image_name','complete','$date')";


                      
                    
                        if ($conn->query($sql) === TRUE) {
                          echo "Wait for Document Verification";
                          // header("Location: student.php");

                        } else {
                          echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        
                        $conn->close();
                      }
                    }
                
            }else{
                print_r($errors);
              
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


