<?php
include("config.php");
session_start();
// $update= false;
// $name = '';
// $admNo='';
// $admLetter ='';
// $birthCert ='';
// $kcseCert ='';

//>>>>>>>>>>>>>>>  FILE DOWNLOADS  <<<<<<<<<<<
      if(!empty($_GET['file'])){
        $filename = basename($_GET['file']);
        $filepath ='studDocuments/'.$filename;

        if(!empty($filename)&& file_exists($filepath)){

          //define headers
          header("Cache-Control:public");
          header("Content-Description:File Transfer");
          header("Content-Disposition:attatchment;filename=$filename");
          header("Content-Type:application/zip");
          header("Content-Transfer-Encoding:binary");

          readFile($filepath);
          exit;
        }else{
          echo "this file does not exist";
        }

      }

//>>>>>>>>>>>>>>>  CRUD OPERATIONS <<<<<<<<<<<

    
    // Check connection
    if (!$conn ||mysqli_connect_errno()) {
      echo("Connection failed: " . mysqli_connect_error());
    }else{
      
        
    
//>>>>>>>>>>>>>>>  DELETE RECORD <<<<<<<<<<<

        if(isset($_GET['delete'])){
          $id = $_GET['delete'];
          $sql ="DELETE FROM nominal_roll WHERE id= $id ";

          if ($conn->query($sql) === TRUE) {

          echo "Documents from id ".$id."have been deleted successfully";

          mysqli_query($conn,$sql);

          header("Location: adminStage3Form.php");


        }

// //>>>>>>>>>>>>>>>  EDIT RECORD <<<<<<<<<<<

// if(isset($_GET['edit'])){
//   $id = $_GET['edit'];
//   $update = true;
//   // header("Location: adminStage1Form.php");
//   echo"helloworl";


//   $sql= $mysqli->query("SELECT * FROM docs_collected WHERE id= $id");

//   if(count($sql) == 1){
 
//     // SELECT `id`, `adm_no`, `name`, `adm_letter`, `kcse_certificate`, `id_birth_cert`, `status`, `date_submitted` FROM `docs_collected` WHERE 1
//     $row = $sql ->fetch_array();
//     $name = $row['name'];
//     $admNo=$row['admno'];
//     $admLetter =$row['adm_letter'];
//     $birthCert =$row['id_birth_cert'];
//     $kcseCert =$row['kcse_certificate'];




//   }
// }
//  if($update == false){ echo 'bsStage1.php'; }else{ echo 'stage1Action.php';} 
//>>>>>>>>>>>>>>>  UPDATE RECORD <<<<<<<<<<<


    }
  }

?>