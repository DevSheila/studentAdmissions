<?php session_start();
include('config.php');
$adm_no=$_SESSION['admissionNumber'];
if (!$conn ||mysqli_connect_errno()) {
  echo("Connection failed: " . mysqli_connect_error());
}else{
  
    
  $_SESSION['admissionNumber']=$adm_no;
   $sql = "SELECT * FROM stud_profile WHERE adm_no = '$adm_no'";
    $result = mysqli_query($conn,$sql);
    // $active = $row['active'];
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
     
     $surname = $row['surname'];
      $admNo = $row['adm_no'];
      $id= $row['id']; 
    //  $name=$surname." ".$other_name;
      $docStatus= $row['status']; 
      // $docdateSubmitted= $row['date_submitted']; 
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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/Maseno-University-Logo.png" type="image/icon type">
  <title>Maseno | Stage 2</title>
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
            <h1 class="m-0">Stage 2 : Student Profile</h1>
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


<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Stage 2 : <?php echo $surname." ".$other_name;?> Profile</h3>

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
$gender = $age =$DOB =$email=$birthyear =$course =$new_image_name=$phone =$password =$confirmpassword ="";
 //dsplay errors
 $gender_err  =$DOB_err =$email_err =$course_err =$phone_err =$password_err =$confirmpassword_err ="";
 if(isset($_POST['submit'])){
     //validate surname
     //validate email
   if(empty(trim($_POST['email']))){
          $email_err= "Enter an  Email";
          //if type is email it may validate itself
   // }else if(filter_var($_POST['email']), FILTER_VALIDATE_EMAIL){
   //   $email = $_POST['email'];
     //if email is valid
   }else{
   //check if email already exists
     // $email = trim($_POST['email']);
    // Prepare a select statement
    $sql = "SELECT id FROM stud_profile WHERE email = ?";
    if($stmt=mysqli_prepare($conn,$sql)){
      //binding variables to the prepared statement
      mysqli_stmt_bind_param($stmt,"s",$param_email);
      $param_email = trim($_POST['email']);
     //  execute prepare statement
      if(mysqli_stmt_execute($stmt)){
       mysqli_stmt_store_result($stmt);//store the results
       if(mysqli_stmt_num_rows($stmt)==1){
         $adm_no_err = "Email user Already Exist.";
       }else{
         $email = trim($_POST['email']);
       }
      }
      //close statement
      mysqli_stmt_close($stmt);
    }
       //if email already exists
       // echo "This email already exists! Sign in or use another email ";
   
   else{
     $email=trim($_POST['email']);
   }
    }
    if(empty($_POST['gender'] && $_POST['course'] && $_POST['DOB'])){
      $gender_err = $course_err = $DOB_err ="Fill in all forms";
    }else{
     $gender=trim($_POST['gender']);
     $course=trim($_POST['course']);
     $DOB=trim($_POST['DOB']);
    }
    //get year to calculate year
    $date = Date("Y");
    $birth=explode("-",$DOB);
    $birthyear=$birth[0];
    $age=intval($date)-intval($birthyear);
   
    //validate phone number
    if(empty($_POST['phone'])){
      $phone_err="Enter Your Phone";
 //    }else if(strlen(trim($_POST['phone'])) < 10 || strlen(trim($_POST['phone'])) > 13)
 //    {
 // $phone_err = "Enter Phone Number of valid Length";
 //    }
 }else{
     $phone =$_POST['phone'];
    
    }
     // Validate password
     if(empty(trim($_POST["password"]))){
       $password_err = "Please enter a password.";     
   } elseif(strlen(trim($_POST["password"])) < 6){
       $password_err = "Password must have atleast 6 characters.";
   } else{
       // $password = trim($_POST["password"]);
   
   
   // Validate confirm password
   if(empty(trim($_POST["confirmpassword"]))){
       $confirmpassword_err = "Please confirm password.";     
   } else{
       $confirmpassword = trim($_POST["confirmpassword"]);
       if(empty($password_err) && ($password != $confirmpassword)){
           $confirmpassword_err = "Password did not match.";
            }else{
                $password = trim($_POST["password"]);
       }
   }
 }
 
  //image file validation
  $errors= array();
  $file_name = $_FILES['image']['name'];
  $file_size =$_FILES['image']['size'];
  $file_tmp =$_FILES['image']['tmp_name'];
  $file_type=$_FILES['image']['type'];
 //  str_replace(" ","", $file_name
 $file_ext = strtolower($file_name);
 $file_ext=explode('.',$file_name);
 $file_ext_end = end($file_ext);
  $time = time();
  $new_image_name = $time."_".$file_name;
  $extensions= array("jpeg","jpg","png");
  //check if image file is of  a valid  extension
        if(in_array($file_ext,$extensions)=== false){
          $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 5097152){
          $errors[]='File size must less than  5MB';
      }
 
    if(empty($errors)==true){
      $image_dir = "userimg";
      //for session
      $image_session = "$image_dir/$new_image_name";
        move_uploaded_file($file_tmp,"$image_dir/$new_image_name");
    }
   
    //push data into database
    if(($gender_err &&$age_err
     &&$DOB_err &&$email_err &&$course_err &&$phone_err &&$password_err &&$confirmpassword_err)===null){
   $insertData="UPDATE stud_profile SET `email`='$email',`age`='$age',`DOB`='$DOB',`course`='$course',`gender`='$gender',`image`='$new_image_name',`status`='complete',`phone`='$phone',`password`=`$password` WHERE `adm_no`=`$adm_no`";
 if($stmt = mysqli_prepare($conn, $insertData)){
     if(mysqli_stmt_execute($stmt)){
       // Redirect to signin page
        header("location: student.php");
       // echo $adm_no, $surname,$other_names,$DOB,$age,$conn,$phone,$gender,$email,$new_image_name;
   } else{
       echo "Oops! Something went wrong. Please try again later.";
       echo  '$gender_err ,$DOB_err ,$email_err ,$course_err ,$phone_err ,$password_err ,$confirmpassword_err,$errors';
 
   }
 
   // Close statement
   mysqli_stmt_close($stmt);
 }
    }else{
     
    }
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
                <h3 class="card-title">Student Profile Resubmission and Verification</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="stage2redo.php"  enctype="multipart/form-data">
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
          
                  
                  <div class="input-group mb-3">
                        <section class="row">
                        <div class="col-md-5">
                        <select class="form-control" id="gender" name="gender"  required >
                                <option value="" disabled selected>--Gender--</option>
                                      <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                        </select>
                        <div class="input-group-append">
                        
                        </div>
                    </div>
                    <div class="col-md-7">
                      <input type="date" class="form-control" placeholder="DOB" name="DOB"  required>
                      <div class="input-group-append">
                      </div>
                      </div>
                    </section>
                    </div>
                    <div class="input-group mb-3">
                        
                      <input type="email" class="form-control" placeholder="Email Adress"  name="email" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                    </div>

                    <div class="input-group mb-3">
                      <select class="form-control" id="course" name="course"  required >
                                <option value="" disabled selected>--select A course--</option>
                                      <option value="BSc. Computer Science">BSc. Computer Science</option>
                                    <option value="BSc. Computer Technology">BSc. Computer Technology</option>
                                    <option value="BSc. Internet Technology">BSc. Internet Technology</option>
                                      <option value="BSc. Computer Informatics">BSc. Computer Informatics</option>
                                      <option value="BSc. Software Engineering">BSc. Software Engineering</option>
                                      <option value="BSc. Machine Computing">BSc. Machine Computing</option>
                                </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-book"></span>
                        </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Phone Number" name="phone" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-phone"></span>
                        </div>
                      </div>
                    </div>
                    <p>Select an image less than 4MB with (.jpeg , .jpg, .png extension)</p>
                    <p><b>Profile Picture</b></p>
                    <div class="input-group mb-3">
                      <input type="file" class="form-control" placeholder="Profile Picture" name="image"  required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-image"></span>
                        </div>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" placeholder="Password" name="password" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" placeholder="Retype password" name="confirmpassword" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <i class="fas fa-lock"></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8">
                        <div class="icheck-primary">
                          <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                          <label for="agreeTerms">
                          I agree to the <a href="#">terms</a>
                          </label>
                        </div>
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


