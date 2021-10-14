<?php
include("config.php");

$adm_no=$surname=$other_names=$gender = $age =$DOB =$email=$birthyear =$course =$new_image_name=$phone =$password =$confirmpassword ="";
//dsplay errors
 $adm_no_err=$surname_err=$other_names_err=$gender_err =$age_err =$DOB_err =$email_err =$course_err =$phone_err =$password_err =$confirmpassword_err ="";
if(isset($_POST['submit'])){
    //validate surname
   if(empty(trim($_POST['surname']))){
    $surname_err="Please Enter a Surname.";
   }else if(!preg_match('/[a-zA-Z]/',trim($_POST['surname']))){
    $surname_err="Your Name Chould Only Contain Letters";
   }else{
     $surname=trim($_POST['surname']);
   }
   
   //validate Other Names
   if(empty(trim($_POST['other_names']))){
    $other_name="Please your Other Name.";
   }else if(!preg_match("/^[a-zA-Z-' ]*$/",trim($_POST['other_names']))){
    $other_names_err="Your Name Chould Only Contain Letters";
   }else{
     $other_names=trim($_POST['other_names']);
   }
   //validate admission number and check if any like it exists instud_profile
   if(empty(trim($_POST['adm_no']))){
    $adm_no_err="Enter the assigned Admission Number";
   }
  //  else if(!preg_match('/^[a-zA-Z]+$/',trim($_POST['adm_no']))){
  //   $adm_no_err="Your Admission number should be like :CCS/00000/19";
  //  }
   else{
    // Prepare a select statement
    $sql = "SELECT id FROM stud_profile WHERE adm_no = ?";
     if($stmt=mysqli_prepare($conn,$sql)){
       //binding variables to the prepared statement
       mysqli_stmt_bind_param($stmt,"s",$param_adm_no);
       $param_adm_no = trim($_POST['adm_no']);
      //  execute prepare statement
       if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);//store the results
        if(mysqli_stmt_num_rows($stmt)==1){
          $adm_no_err = "Admission Number Already Exist.";
        }else{
          $adm_no = trim($_POST['adm_no']);
        }
       }
       //close statement
       mysqli_stmt_close($stmt);
     }else{
      echo "Something went Wrong try again";
    }
  
  
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
   if($age <17){
     $age_err="You don't meet the mininum age requirement.";
   }
  
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
      if(empty($password_err) && (trim($_POST["password"])!= $confirmpassword)){
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
   if(($adm_no_err && $surname_err && $other_name_err && $gender_err && $age_err
    && $DOB_err && $email_err && $course_err && $phone_err && $password_err && $confirmpassword_err)==null){
  $insertData="INSERT INTO stud_profile( `adm_no`, `surname`, `other_name`, `email`, `age`, `DOB`, `course`, `gender`, `image`, `phone`,`status`, `password`)
   VALUES ('$adm_no','$surname','$other_names','$email','$age','$DOB','$course','$gender','$new_image_name','$phone','complete','$password')";
    // $insertDataStage1 = "INSERT INTO docs_collected (`adm_no`,`name`) VALUES (`$adm_no`,`$surname.' '.$other_names`)";
    // mysqli_query($conn,$insertDataStage1);
if($stmt = mysqli_prepare($conn, $insertData)){
    if(mysqli_stmt_execute($stmt)){
      // Redirect to signin page
      echo'
      <Script>
      alert("Data submitted successfully and now pending Review");
      </Script>
      ';
       header("location: signin.php");
      // echo $adm_no, $surname,$other_names,$DOB,$age,$conn,$phone,$gender,$email,$new_image_name;
  } else{
      echo "Oops! Something went wrong. Please try again later.";
      

  }

  // Close statement
  mysqli_stmt_close($stmt);
}
   }else{
    echo'<div class="bg-info">';
    echo $adm_no_err,$surname_err, $other_names_err, $gender_err ,$DOB_err ,$age_err,$email_err ,$course_err ,$phone_err ,$password_err ,$confirmpassword_err;
    echo '</div>';
   }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Maseno University | Sign Up</title>
    <link rel="icon" href="dist/img/Maseno-University-Logo.png" type="image/icon type">
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/"> -->
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style3.css">
 <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.css">
        <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
        <link rel="stylesheet" href="font-awesome-4.7.0\fonts"> -->
  <!-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> -->

   <!-- Font Awesome -->
   <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">

   <div class="container ">


      <div class=" row ">
          <div class="col-6 col-md-6 mb-2">
            <div class="register-box">
              <div class="card card-outline card-primary">
                <div class="card-header text-center">
                <h1>Maseno University</h1>
                </div>
                <div class="card-body">
                  <p class="login-box-msg">Register as a new student</p>

                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" enctype="multipart/form-data">
                  <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Admission Number" name="adm_no"  required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span><i class="fas fa-book "></i></span>
                        </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Surname" name="surname" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Other names" name="other_names" >
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span><i class="fas fa-user" aria-hidden="false"></i></span>
                        </div>
                        </div>
                    </div>
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
                    <!-- try to do the age by sub current year from DOB -->
                    <!-- <div class="col-md-3">
                      <input type="number" class="form-control" placeholder="Age" name="age"  required>
                      <div class="input-group-append">
                        
                      </div> -->
                      
                    <!-- </div> -->
                    <div class="col-md-7">
                      <input type="date" class="form-control" placeholder="DOB" name="DOB"  required>
                      <div class="input-group-append">
                      </div>
                      </div>
                    </section>
                    </div>
                    <div class="input-group mb-3">
                      <input type="email" class="form-control" placeholder="Email"  name="email" required>
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
                      <input type="file" class="form-control" name="image" placeholder="Profile Picture"  required>
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
                      <!-- /.col -->
                      <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Register</button>
                      </div>
                      <style>
                          .container{
                              margin-top: 420px;
                          }
                        .link{
                            text-decoration: none;
                            color:white;
                        }
                        .link:hover{
                            color:black;
                        }
                      </style>
                      <!-- /.col -->
                    </div>
                  </form>

                  <div class="social-auth-links text-center">
                    <a href="#" class="btn btn-block btn-primary">
                      <i class="fab fa-facebook mr-2"></i>
                      Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                      <i class="fab fa-google-plus mr-2"></i>
                      Sign up using Google+
                    </a>
                  </div>

                </div>
                <!-- /.form-box -->
              </div><!-- /.card -->
            </div>
          <!-- /.register-box -->
          </div>
          <div class="col-6 col-md-6">
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
              <h3 >Welcome To Maseno University Student Portal</h3>
                <div class="carousel-item active">
                <img src="img/class.png" alt="" style="width: 700px; height: 100%;">

                  <div class="container">
                    <div class="carousel-caption text-start">
                      <h1>Quality Education.</h1>
                      <p>Among Kenya's top 10 universities Maseno offers quality education in various courses.</p>
                      <!-- <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> -->
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                <img src="img/maseno.jpg" alt="" style="width: 700px; height: 100%;">
                  <div class="container">
                    <div class="carousel-caption">
                      <h1>Campuses</h1>
                      <p>With two campuses Maseno tutors over 10000 students.</p>
                      <!-- <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p> -->
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                <img src="img/Maseno-University.png" alt="" style="width: 700px; height: 100%;">
                  <div class="container">
                    <div class="carousel-caption text-end">
                      <h1>Affordable Education.</h1>
                      <p>Our education is cheap to students with financial needs.</p>
                      <!-- <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p> -->
                    </div>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>

      </div>
   </div>

  <!-- jQuery -->

  <script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
