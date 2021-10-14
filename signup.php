<?php
session_start();
include("config.php");
if($_SESSION['logged_student_admission'] == ''){
  header("Location:signin.php");
}

$adm_no=$surname=$other_names=$gender = $age =$DOB =$email=$birthyear =$course =$new_image_name=$phone =$password =$confirmpassword ="";
//dsplay errors
$adm_no_err=$surname_err=$other_names_err=$gender_err  =$DOB_err =$email_err =$course_err =$phone_err =$password_err =$confirmpassword_err ="";
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
      if(!empty($_FILES["image"])){
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $time = time();
      $new_image_name = $time."_".$file_name;
      $extensions= array("jpeg","jpg","png");
      //check if image file is of  a valid  extension
            if(in_array($file_ext,$extensions) === false){
              $errors[]="extension not allowed, please choose a JPEG or PNG file.";
          }
          
          if($file_size > 2097152){
              $errors[]='File size must be excatly 2 MB';
          }
     
        if(empty($errors)==true){
          $image_dir = "userimg";
          //for session
          $image_session = "$image_dir/$new_image_name";
            move_uploaded_file($file_tmp,"$image_dir/$new_image_name");
        }
   }
   //push data into database
   if(($adm_no_err && $surname_err&&$other_name_err&&$gender_err &&$age_err
    &&$DOB_err &&$email_err &&$course_err &&$phone_err &&$password_err &&$confirmpassword_err)==null){
  $insertData="INSERT INTO stud_profile( `adm_no`, `surname`, `other_name`, `email`, `age`, `DOB`, `course`, `gender`, `image`, `phone`,`status`, `password`)
   VALUES ('$adm_no','$surname','$other_names','$email','$age','$DOB','$course','$gender','$new_image_name','$phone','complete','$password')";
if($stmt = mysqli_prepare($conn, $insertData)){
    if(mysqli_stmt_execute($stmt)){
      // Redirect to signin page
       header("location: signin.php");
      // echo $adm_no, $surname,$other_names,$DOB,$age,$conn,$phone,$gender,$email,$new_image_name;
  } else{
    echo "Oops! Something went wrong. Please try again later.";

}

  // Close statement
  mysqli_stmt_close($stmt);
}
   }else{
    echo   $adm_no_err,$surname_err,$other_names_err,$gender_err ,$DOB_err ,$email_err ,$course_err ,$phone_err ,$password_err ,$confirmpassword_err,$errors;

}
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stage 2 :Personal Details</title>
    <link rel="icon" href="dist/img/Maseno-University-Logo.png" type="image/icon type">
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/"> -->
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style3.css">
 <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body >

   <div class="container ">


      <div class=" row ">
          <div class="col-6 col-md-6 mb-2">
            <div class="register-box">
              <div class="card card-outline card-primary">
                <div class="card-header text-center">
                <h1>Stage 2 :Personal Details</h1>
                </div>
                <div class="card-body">
                  <p class="login-box-msg">Stage 2 :Personal Details</p>

                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" enctype="multipart/form-data">
                  <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Admission Number" name="adm_no" value="<?php echo $_SESSION['logged_student_admission']?>" readonly required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span><i class="fas fa-book "></i></span>
                        </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Surname" name="surname" value="<?php echo $_SESSION['logged_student_name']?>"  readonly required>
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
                      <select class="form-control" id="school" name=""  required onchange="showSuggestion(this.value)" >
                                      <option value="" disabled selected >Select A School</option>
                                      <option value="School Of Computing And Informatics"  >School Of Computing And Informatics</option>
                                      <option value="School Of Medicine">School Of Medicine</option>
                                      <option value="School Of Arts And Design">School Of Arts And Design</option>


                                   
                      </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-book"></span>
                        </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                      <select class="form-control" id="course" name="course"  required >
                      <option value="" disabled selected>--select A course--</option>
                                      <!-- <option value="BSc. Computer Science">BSc. Computer Science</option>
                                    <option value="BSc. Computer Technology">BSc. Computer Technology</option>
                                    <option value="BSc. Internet Technology">BSc. Internet Technology</option>
                                      <option value="BSc. Computer Informatics">BSc. Computer Informatics</option>
                                      <option value="BSc. Software Engineering">BSc. Software Engineering</option>
                                      <option value="BSc. Machine Computing">BSc. Machine Computing</option> -->
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
                    <p>Select an image less than 2MB with (.jpeg , .jpg, .png extension)</p>
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
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                      </div>
                      
                    </div>
                  </form>

                 

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

   <script>

function showSuggestion(str){
    console.log(str);

    if(str.length ==0){
        document.getElementById('course').innerHTML = '';
    }else{
        //AJAX REQ

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
              document.getElementById('course').innerHTML = this.responseText;

              // document.getElementById('course').innerHTML = `<option value="School Of Computing And Informatics"  >${this.responseText}</option>`;
              console.log(this.responseText);

            }
        }



        xmlhttp.open("GET","course.php?q="+str,true);
        xmlhttp.send();


    }

}

</script>

  <!-- jQuery -->

  <script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>



