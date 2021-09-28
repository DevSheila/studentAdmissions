<?php
session_start();
include("config.php");
$staff_no=$password="";
if(isset($_POST['submit'])){
  $staff_no=$_POST['staff_no'];
  $password=$_POST['password'];
  $query = "SELECT * FROM admin_profile WHERE dep_id='$staff_no' AND password = '$password'";
  $res = mysqli_query($conn,$query) or die(mysqli_error($conn));
  $row = mysqli_num_rows($res);
  if($row == 1){
    $_SESSION['staff_no'] = $staff_no;
    $sessionStater=mysqli_fetch_assoc($res);
    $_SESSION['admin_id'] = $sessionStater['dep_id'];
    $_SESSION['admin_name'] = $sessionStater['name'];
  
    
    header("Location:home.php");
  }else{
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
      <input type="text" class="form-control" id="floatingInput" name="staff_no" placeholder="MSU/00000/019">
      <label for="floatingInput">Staff Number</label>
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
    <p class="mt-5 mb-3 text-muted">Not An Admin?<a href="signin.php">Student Log In</a></p>
    
    <p class="mt-5 mb-3 text-muted">&copy; 2001–2021 Maseno University.</p>
  </form>
</main>


    
  </body>
</html>
