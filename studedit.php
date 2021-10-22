<?php 
session_start();
include 'config.php';
$adm_no = $_SESSION['admissionNumber'];
 $sql ="SELECT * FROM stud_profile WHERE adm_no = '$adm_no'";
 $result = mysqli_query($conn,$sql);
 while ($row = mysqli_fetch_array($result)) {
 $surname = $row['surname'];
  $other_name = $row['other_name'];
   $email = $row['email'];
    $course = $row['course'];
     $age = $row['age'];
      $DOB = $row['DOB'];
 }
 ?>