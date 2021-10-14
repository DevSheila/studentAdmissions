<?php
session_start();
include('config.php');
require_once 'pdf.php';

//include required phpmailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

//define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


          $studName ='';
          $studAdmission = '';
          $studCourse = '';
          $studGender = '';
          $studAge = '';
          $stage1Status = '';
          $stage2Status = '';
          $stage3Status = '';
if($_SESSION['logged_student_admission'] == ''){
    header("Location:signin.php");
}

  // Check connection
  if (!$conn ||mysqli_connect_errno()) {
    echo("Connection failed: " . mysqli_connect_error());
  }else{
     $adm_no=$_SESSION['logged_student_admission'];


      $stage1Sql = "SELECT * FROM docs_collected WHERE adm_no = '$adm_no'";
      $stage1Result = mysqli_query($conn,$stage1Sql);
      $stage1Count = mysqli_num_rows($stage1Result);
      if($stage1Count >0) {
        while( $stage1Row = mysqli_fetch_array($stage1Result,MYSQLI_ASSOC)){
          $stage1Status = $stage1Row['status'];
        }
      }


      $stage2Sql = "SELECT * FROM stud_profile WHERE adm_no = '$adm_no'";
      $stage2Result = mysqli_query($conn,$stage2Sql);
      $stage2Count = mysqli_num_rows($stage2Result);
      if($stage2Count > 0 ) {
        while( $stage2Row = mysqli_fetch_array($stage2Result,MYSQLI_ASSOC)){
          $studSurname= $stage2Row['surname'];
          $studOtherName = $stage2Row['other_name'];
          $studName =$studSurname.' '.$studOtherName ;
          $studAdmission = $stage2Row['adm_no'];
          $studCourse = $stage2Row['course'];
          $studGender = $stage2Row['gender'];
          $studAge = $stage2Row['age'];
          $stage2Status = $stage2Row['status'];


        }
      }

      $stage3Sql = "SELECT * FROM nominal_roll WHERE adm_no = '$adm_no'";
      $stage3Result = mysqli_query($conn,$stage3Sql);
      $stage3Count = mysqli_num_rows($stage3Result);
      if($stage3Count > 0 ) {
        while( $stage3Row = mysqli_fetch_array($stage3Result,MYSQLI_ASSOC)){
          $stage3Status = $stage3Row['status'];
        }
      }
      if(($stage1Status == 'approved') &&($stage2Status=='approved') && ($stage3Status == 'approved')){

  


        $file_name = md5(rand()).'.pdf';
        $html_code = '<style>'.file_get_contents("dist/css/adminlte.min.css").'</style>';
        $html_code .= '<style>'.file_get_contents("plugins/fontawesome-free/css/all.min.css").'</style>';
        $html_code .= '<style>'.file_get_contents("plugins/icheck-bootstrap/icheck-bootstrap.min.css").'</style>';

        $html_code.='
        <div class="container ">
        <div class="row d-flex justify-content-center ">
        <div class="col-lg-8 col-md-8 col-8 m-5">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                
                </div>

                <h3 class="profile-username text-center">'.$studName.'</h3>

                <p class="text-muted text-center">'.$studAdmission .'</p>

                <ul class="">
                <li class="list-group-item">
                    <b>Course</b> <a class="float-right">'.$studCourse.'</a>
                </li>
                <li class="list-group-item">
                    <b>Year</b> <a class="float-right">'.$date = date("Y") .'</a>
                </li>
                <li class="list-group-item">
                    <b>Gender</b> <a class="float-right">'.$studGender  .'</a>
                </li>
                <li class="list-group-item">
                    <b>Age</b> <a class="float-right">'.$studAge .'</a>
                </li>
                </ul>

            
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        </div>
        </div>

        ';


        $pdf = new Pdf();
        $pdf->loadHtml($html_code);
        $pdf->render();
        $file= $pdf->output();
        file_put_contents('studentId/'.$file_name,$file);




        //create instance of php mailer
        $mail= new PHPMailer();
        //set  mailer to user smtp
        $mail->isSMTP();
        //define smtp host
        $mail ->Host="smtp.gmail.com";
        //enable smtp authentication
        $mail->SMTPAuth = "true";
        //set type of encryption(ssl/tls)
        $mail->SMTPSecure="tls";
        //set port to connect smtp
        $mail->Port= "587";
        //set gmailusername
        $mail->Username="sheilasharon10@gmail.com";
        //set gmail password
        $mail->Password="Vicecity@8";
        //set email subject
        $mail->Subject="Student ID";
        //set sender email
        $mail->setFrom("sheilasharon10@gmail.com");
        //Enable HTML
        $mail->isHTML(true);
        $mail->addAttachment($file_name);
        $mail ->Body ="<h1>Your Temporary School ID</h1><br>";

        // set plaintext body
        // $mail ->Body ="This is plain text email body";
        //Add recepient
        $mail->addAddress("sheilasharon10@gmail.com");
        //finally sendemail
        if($mail->Send()){
            echo "Email sent ..!";
        }else{
            echo "Error ... !";
        }

        //close smtp connection
        $mail ->smtpClose();

        // unlink($file_name);

    }else{
        echo "Some stages are yet to be approved";
        print_r($stage1Status);
        print_r($stage2Status);
        print_r($stage3Status);

        // header('Location:student.php');
    }


  }







?>

