<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Maseno University | Sign In</title>
    <link rel="icon" href="dist/img/Maseno-University-Logo.png" type="image/icon type">
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/"> -->
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="signStyle.css">
<!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="font-awesome-4.7.0\font-awesome-4.7.0\css/css/font-awesome.min.css">

  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <!-- <div class=" col-md-3 container">

   
    </div> -->
<div class=" row container">
<div class="col-md-6">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
     <h1>Maseno University</h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register as a new student</p>

      <form action="../../index.html" method="post" enctype="multipart/form-data">
      <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Registration Number" name="regNo"  required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-badge"></span>
            </div>
            </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="First name" name="firstname" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Last name" name="lastname" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
            </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Other names" name="othername" default="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <section class="row">
            <div class="col-md-4">
           <input type="text" class="form-control" placeholder="Gender" name="gender"  required>
            <div class="input-group-append">
            
            </div>
        </div>
        <!-- try to do the age by sub current year from DOB -->
        <div class="col-md-3">
          <input type="number" class="form-control" placeholder="Age" name="age"  required>
          <div class="input-group-append">
            
          </div>
          
        </div>
        <div class="col-md-5">
          <input type="date" class="form-control" placeholder="DOB" name="DOB"  required>
          <div class="input-group-append">
            
          </div>
        </section>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email"  required>
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
          <input type="text" class="form-control" placeholder="Phone Number"  required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <p>Select an image less than 2MB with (.jpeg , .jpg, .png extension)</p>
        <p><b>Profile Picture</b></p>
        <div class="input-group mb-3">
          <input type="file" class="form-control" placeholder="Profile Picture"  required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-image"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password"  required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password"  required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
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
            <button type="submit" class="btn btn-primary btn-block"><a class="link" href="student.php" >Register</a></button>
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

      <a href="signin.php" class="text-center">I am Already A student</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
</div>
<div class="col-md-6">
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
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
