<?php session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Maseno | Stage 1</title>
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


<div class="wrapper">

  <!-- Preloader -->
   <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="img/Maseno-University-Logo.png" alt="MasenoELogo" height="60" width="60">
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
      <img src="img/Maseno-University-Logo.png" alt="Maseno University Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ADMISSIONS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src=img/woman.jpg class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
      
              <h5 style="color:white;"> 
                    <?php

            
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
         

  <!-- /.card-body -->
</div>
<!-- /.card -->

<?php
 
$adm_no=$_SESSION['admissionNumber'];
if (!$conn ||mysqli_connect_errno()) {
  echo("Connection failed: " . mysqli_connect_error());
}else{
  
    
  $_SESSION['admissionNumber']=$adm_no;
   $sql = "SELECT * FROM docs_collected WHERE adm_no = '$adm_no'";
    $result = mysqli_query($conn,$sql);
    // $active = $row['active'];
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
     
      // $name = $row['name'];
      $admNo = $row['adm_no'];
      $id= $row['id']; 
      $admLetter = $row['adm_letter'];
      $kcseCert= $row['kcse_certificate'];
      $birthCert= $row['id_birth_cert']; 
      $docStatus= $row['status']; 
      $docdateSubmitted= $row['date_submitted']; 
    }

}
    //the name we can fetch from the stud_profile table
    $GetNamesql= "SELECT * FROM stud_profile WHERE adm_no = '$adm_no' ";
    $GetNameResult=mysqli_query($conn,$GetNamesql);
    while($row1=mysqli_fetch_assoc($GetNameResult)){
      $surname = $row1['surname'];
      $other_name = $row1['other_name'];
     
    }
?>
   

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
              <form id="quickForm" method="POST" action="stage1redo.php"  enctype="multipart/form-data">
              <div class="card-body">
              <div class="form-group">
                    <label for="profile" >Admission Number </label>
                      <input type="text" class="form-control " id="admno" name="admno" select disabled value="<?php echo $adm_no;?>"/>
                  </div>
                  <div class="form-group">
                    <label for="profile" >Surname </label>
                      <input type="text" class="form-control " id="surname" name="surname" select disabled value="<?php echo $surname;?>"/>
                  </div> 
                  <div class="form-group">
                    <label for="profile" >Other Names</label>
                      <input type="text" class="form-control " id="other_name" name="other_name" select disabled value="<?php echo $other_name;?>"/>
                  </div> 
              <div class="card-body">
              <p>Select a document less than 4MB with (.pdf  extension)</p>
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
                  <button type="submit" class="btn btn-primary" name="resubmit">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
      <!-- FOrm action PHP -->
      <?php
      if(isset($_POST['resubmit'])){
      // $id = $_POST['id'];
      $studentName = $surname." ". $other_name;
      $studentadmNo = $adm_no;
      $errors= array();
      $time = time();

      //adm letter
            $adm_letter_name = $_FILES['admLetter']['name'];
            $adm_letter_size =$_FILES['admLetter']['size'];
            $adm_letter_tmp =$_FILES['admLetter']['tmp_name'];
            $adm_letter_type=$_FILES['admLetter']['type'];
             $adm_letter_ext=strtolower(end(explode('.',$_FILES['admLetter']['name'])));
            $adm_letter_image_name = $time."_".$adm_letter_name;

      //kcse cert
            $kcseCert_name = $_FILES['kcseCert']['name'];
            $kcseCert_size =$_FILES['kcseCert']['size'];
            $kcseCert_tmp =$_FILES['kcseCert']['tmp_name'];
            $kcseCert_type=$_FILES['kcseCert']['type'];
             $kcseCert_ext=strtolower(end(explode('.',$_FILES['kcseCert']['name'])));
            $kcseCert_image_name = $time."_".$kcseCert_name;

      //birth cert
            $birthCert_name = $_FILES['birthCert']['name'];
            $birthCert_size =$_FILES['birthCert']['size'];
            $birthCert_tmp =$_FILES['birthCert']['tmp_name'];
            $birthCert_type=$_FILES['birthCert']['type'];
            $birthCert_ext=strtolower(end(explode('.',$_FILES['birthCert']['name'])));
            $birthCert_image_name = $time."_".$birthCert_name;


          $time = time();
          $extensions= array("pdf");
       
              //file size test
              if(($adm_letter_size > 4097152) || ($birthCert_size > 4097152) || ($kcseCert_size > 4097152)){
                  $errors[]='File size must be less than or equal to  4 MB';
                  $_SESSION['msg2']="File size must be less than or equal to  4 MB'.";
                  //file extension test
              }else if(in_array($birthCert_ext,$extensions)=== false){
                $errors[]=" File extension not allowed, please choose a pdf file.";
            }else if(in_array($adm_letter_ext,$extensions)===false){
              $errors[]=" File extension not allowed, please choose a pdf file.";
            }
            else if(in_array($kcseCert_ext,$extensions)===false){
              $errors[]=" File extension not allowed, please choose a pdf file.";
            }
        //empty file test
            if(empty($errors)==true){
                $image_dir = "studDocuments";
                //for session
                $admLetter_session = "$image_dir/$adm_letter_image_name";
                move_uploaded_file($adm_letter_tmp,"$image_dir/$adm_letter_image_name");

                $kcseCert_session = "$image_dir/$kcseCert_image_name";
                move_uploaded_file($kcseCert_tmp,"$image_dir/$kcseCert_image_name");

                $birthCert_session = "$image_dir/$birthCert_image_name";
                move_uploaded_file($birthCert_tmp,"$image_dir/$birthCert_image_name");

                $date = date("l jS \of F Y h:i:s A");
              //check if a record exists and if there is just do an update  rather than an insertion query

              $recordsql = "SELECT id FROM docs_collected WHERE adm_no='$adm_no'";
              $recordresult = mysqli_query($conn,$recordsql);
              // $resultrow = mysqli_fetch_assoc($recordresult);
              // $recordadmno = $resultrow['adm_no'];
              if(mysqli_num_rows($recordresult)==1){
                $sql= "UPDATE docs_collected SET adm_no='$studentadmNo',name='$studentName',adm_letter='$adm_letter_image_name',kcse_certificate='$kcseCert_image_name',id_birth_cert='$birthCert_image_name',status = 'complete',
              date_submitted='$date' WHERE adm_no = '$adm_no'";
              }
              // $count = mysqli_num_rows($recordresult);
              // if ($count > 1) {
                
              } else if($count = 0){
               $sql ="INSERT INTO docs_collected( adm_no, name, adm_letter, kcse_certificate, id_birth_cert, status, date_submitted) 
                      VALUES ('$studentadmNo','$studentName','$adm_letter_image_name','$kcseCert_image_name','$birthCert_image_name','complete','$date')";
                        }
                
                      
                    
                        if ($conn->query($sql) === TRUE) {
                      echo'
                      <Script>
                      alert("Data submitted successfully and now pending Review");
                      </Script>
                      ';

                        } else {
                          echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        
                        $conn->close();
                     
            }else{
                
              //   echo'
              //   <div class="alert">
              //  <?print_r( $errors) 

              //   </div>
              //   <Script>
              //   alert("No Data Submitted");
              //   </Script>
              //   ';
              
             }
           
                     ?>
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


