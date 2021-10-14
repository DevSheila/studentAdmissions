<?php
session_start();
include("config.php");
$adm_no=$password="";


$_SESSION['stud_id'] = '';
$_SESSION['admissionNumber'] = '';
$_SESSION['other_name'] = '';
$_SESSION['surname'] = '';
$_SESSION['age'] = '';
$_SESSION['DOB'] = '';
$_SESSION['phone'] ='';
$_SESSION['email'] ='';
$_SESSION['course'] = '';
$_SESSION['image'] = '';
$_SESSION['gender'] = '';
$_SESSION['status'] = '';
if(isset($_POST['submit'])){
  $adm_no=$_POST['adm_no'];
  $password=$_POST['password'];

      // login query code block

      $loginQuery = "SELECT * FROM stud_account WHERE adm_no='$adm_no' AND password = '$password'";
      $loginResult = mysqli_query($conn,$loginQuery) or die(mysqli_error($conn));
      $loginNumRow = mysqli_num_rows($loginResult);

      if($loginNumRow  == 1){
        $loginRow = mysqli_fetch_assoc($loginResult);
        $_SESSION['logged_student_name'] = $loginRow ['id'];
        $_SESSION['logged_student_admission'] = $loginRow ['adm_no'];
        $_SESSION['logged_student_name'] = $loginRow ['name'];

        $query = "SELECT * FROM stud_profile WHERE adm_no='$adm_no'";
        $res = mysqli_query($conn,$query) or die(mysqli_error($conn));
        $row = mysqli_num_rows($res);
    
    
    
        if($row == 1){
          // $_SESSION['adm_no'] = $adm_no;
          $sessionStater=mysqli_fetch_assoc($res);
        
    
          $_SESSION['stud_id'] = $sessionStater['id'];
          $_SESSION['admissionNumber'] = $sessionStater['adm_no'];
          $_SESSION['other_name'] = $sessionStater['other_name'];
          $_SESSION['surname'] = $sessionStater['surname'];
          $_SESSION['age'] = $sessionStater['age'];
          $_SESSION['DOB'] = $sessionStater['DOB'];
          $_SESSION['phone'] = $sessionStater['phone'];
          $_SESSION['email'] = $sessionStater['email'];
          $_SESSION['course'] = $sessionStater['course'];
          $_SESSION['image'] = $sessionStater['image'];
          $_SESSION['gender'] = $sessionStater['gender'];
          $_SESSION['status'] = $sessionStater['status'];

          //redirect to student page

          // print_r($row)
          ;}
  // end of login query code block

  header("Location:student.php");





   

     
    }else{
      // print_r($row);
      echo "invalid Login Details.";
    }

      
  }

?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Maseno University | Sign In</title>
    <link rel="icon" href="img/Maseno-University-Logo.png" type="image/icon type">
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/"> -->

    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style3.css">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data"><center>
    <img class="mb-4" src="img/Maseno-University-Logo.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    </center>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="adm_no" placeholder="CCS/00000/019">
      <label for="floatingInput">Admission Number</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>
    <!-- <p class="mt-5 mb-3 text-muted">Not Registered Yet?<a href="signup.php">Register Here</a></p> -->
    
    
    <p class="mt-5 mb-3 text-muted">&copy; 2001–2021 Maseno University.<a href="adminsignin.php">Administrator Log In</a></p>
  </form>
</main>


    
  </body>
</html>
