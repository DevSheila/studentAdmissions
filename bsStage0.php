<?php
include("config.php");
session_start();

date_default_timezone_set("Africa/Nairobi");


    

    //>>>>>>>>>>>>>>>  CREATE RECORD <<<<<<<<<<<
    if(isset($_POST['save'])){
      $studentName = $_POST['studentName'];
      $studentAdmNo = $_POST['studentAdmNo'];
      $studentPassword = $_POST['studentPassword'];

      $errors= array();
      $date = date("l jS \of F Y h:i:s A");


        
                          // Check connection
                  if (!$conn ||mysqli_connect_errno()) {
                    echo("Connection failed: " . mysqli_connect_error());
                  }else{
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                      

                      $sql ="INSERT INTO stud_account( name, adm_no, password, date_created) VALUES ('$studentName','$studentAdmNo','$studentPassword','$date')";


                      
                    
                        if ($conn->query($sql) === TRUE) {
                      
                          header("Location: adminStage0.php");

                        } else {
                          echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        
                        $conn->close();
                      }
                    }
                
            }

    








        

 
?>