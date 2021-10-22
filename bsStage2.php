<?php
include("config.php");
session_start();

date_default_timezone_set("Africa/Nairobi");

$_SESSION['update']='false';
$_SESSION['pagination']='false';

$_SESSION['id'] =0 ;
$_SESSION['name'] = '';
$_SESSION['admNo']='';
$_SESSION['admLetter'] ='';
$_SESSION['birthCert'] ='';
$_SESSION['kcseCert'] ='';


// $adm_letter = $_FILES['profile'];
// $kcse_cert= $_FILES['image2'];
// $id_birth_cert= $_FILES['image3'];

// if(isset($_POST['submit'])){
//   $file = $_FILES['profile'];
//   print_r($file);
// }else{
//   echo "nothing";

// }


$name = '';
$admNo='';
$admLetter ='';
$birthCert ='';
$kcseCert ='';
    
//>>>>>>>>>>>>>>>  UPDATE STATUS TO APPROVED<<<<<<<<<<<

if(isset($_GET['updateApproved'])){
  $id = $_GET['updateApproved'];
  $date = date("l jS \of F Y h:i:s A");

  $sql= "UPDATE stud_profile SET status ='approved'WHERE id = $id";
  if ($conn->query($sql) === TRUE) {

  echo "Documents from id ".$id."have been status updated successfully";

  mysqli_query($conn,$sql);

  header("Location: adminStage2.php");

  }

}

//>>>>>>>>>>>>>>>  UPDATE STATUS TO APPROVED<<<<<<<<<<<

if(isset($_GET['updateDeclined'])){
  $id = $_GET['updateDeclined'];
  $date = date("l jS \of F Y h:i:s A");

  $sql= "UPDATE stud_profile SET status ='declined'WHERE id = $id";
  if ($conn->query($sql) === TRUE) {

  echo "Documents from id ".$id."have been status updated successfully";

  mysqli_query($conn,$sql);

  header("Location: adminStage2.php");

  }

}
    //>>>>>>>>>>>>>>>  CREATE RECORD <<<<<<<<<<<
    if(isset($_POST['save'])){
      $studentName = $_POST['studentName'];
      $studentadmNo = $_POST['admno'];

      $errors= array();
      $time = time();

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

                                       $sql ="INSERT INTO docs_collected( adm_no, name, adm_letter, kcse_certificate, id_birth_cert, status, date_submitted) 
                      VALUES ('$studentadmNo','$studentName','$adm_letter_image_name','$kcseCert_image_name','$birthCert_image_name','complete','$date')";


                      
                    
                        if ($conn->query($sql) === TRUE) {
                      
                          header("Location: adminStage1.php");

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



//>>>>>>>>>>>>>>>  EDIT RECORD <<<<<<<<<<<

    if(isset($_GET['edit'])){
      $id = $_GET['edit'];
      $update = true;
      echo"helloworld";
        // Check connection
        if (!$conn ||mysqli_connect_errno()) {
          echo("Connection failed: " . mysqli_connect_error());
        }else{
              $sql= "SELECT * FROM docs_collected WHERE id= $id";
              $result = mysqli_query($conn,$sql);
              $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
               
              $count = mysqli_num_rows($result);
              
              // If result matched $myusername and $mypassword, table row must be 1 row
            
              if($count == 1) {

                $_SESSION['update'] = 'true';
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['admNo']=$row['adm_no'];
                $_SESSION['admLetter'] =$row['adm_letter'];
                $_SESSION['birthCert'] =$row['id_birth_cert'];
                $_SESSION['kcseCert'] =$row['kcse_certificate'];
                header("Location: adminStage1Form.php");

            
              

              }else{
                
                  echo "Unsuccessful";
                }
              // if ($conn->query($sql) === TRUE) {
                // SELECT id, adm_no, name, adm_letter, kcse_certificate, id_birth_cert, status, date_submitted FROM docs_collected WHERE 1
                // $row = $sql ->fetch_array();
      
        }
    }

    //>>>>>>>>>>>>>>>  UPDATE RECORD <<<<<<<<<<<

    

    if(isset($_POST['update'])){
      $id = $_POST['id'];
      $studentName = $_POST['studentName'];
      $studentadmNo = $_POST['admno'];

      $sql= "SELECT * FROM docs_collected WHERE id= $id";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);
              
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      


        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['admNo']=$row['adm_no'];
        $_SESSION['admLetter'] =$row['adm_letter'];
        $_SESSION['birthCert'] =$row['id_birth_cert'];
        $_SESSION['kcseCert'] =$row['kcse_certificate'];

    
      

      
       
   
     


             
         
                           // Check connection
                   if (!$conn ||mysqli_connect_errno()) {
                     echo("Connection failed: " . mysqli_connect_error());
                   }else{
                     if($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                      // $sql ="INSERT INTO doc_collected( adm_no, name, adm_letter, kcse_certificate, id_birth_cert, status, date_submitted) 
                      // VALUES ('$studentadmNo','$studentName','$adm_letter_image_name','$kcseCert_image_name','$birthCert_image_name','complete','$date')";

                      // if($adm_letter_image_name == null ){
                      //   $adm_letter_image_name = $_SESSION['admletter'];
                      // }

                      // if($kcseCert_image_name == null ){
                      //   $kcseCert_image_name = $_SESSION['kcseCert'];
                      // }

                      // if($birthCert_image_name == null ){
                      //   $birthCert_image_name = $_SESSION['birthCert'];
                      // }
      
                      $sql= "UPDATE docs_collected SET adm_no='$studentadmNo',name='$studentName',adm_letter='$adm_letter_image_name',kcse_certificate='$kcseCert_image_name',id_birth_cert='$birthCert_image_name',
                      date_submitted='$date'WHERE id = $id";
 
                       
                     
                         if ($conn->query($sql) === TRUE) {
                       
                           header("Location: adminStage1.php");
 
                         } else {
                           echo "Error: " . $sql . "<br>" . $conn->error;
                         }
                         
                         $conn->close();
                       }
                     }

                    //  echo "heey";
                 
             }else{
                //  print_r($errors);
               
             }
 
        
    



        
// //>>>>>>>>>>>>>>>  PAGINATION RECORD <<<<<<<<<<<

// if(isset($_POST['pagination'])){
//   $start = $_POST['pagination'];
// $_SESSION['pagination']='true';

//   $sql ="SELECT * FROM docs_collected LIMIT 3,$start ";

//   if ($conn->query($sql) === TRUE) {

//   echo "Success";

//   mysqli_query($conn,$sql);

//   header("Location: adminStage1.php");
//   }


// }





        

 
?>