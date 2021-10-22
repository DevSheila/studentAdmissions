<?php
session_start();
require('fpdf.php');
date_default_timezone_set("Africa/Nairobi");

class userdetails extends FPDF{
    function header(){
        $this->SetFont("Arial",'B',12);
        $this->Cell(15,2,'P.O. Box Private Bag,',0,0,"L");
        $this->Ln();
        $this->Cell(15,5,'Kisumu',0,0,"L");
        $this->Cell(400,2,'Tel:+254-57-351620/22',0,0,"C");
        $this->Ln();
        $this->Cell(420,5,'Fax:+254 - 57 -351221',0,0,"C");
        $this->Ln();  
        $this->Cell(420,5,'Email:info@maseno.ac.ke',0,0,"C");
        $this->Ln();    
        $this->Image("dist/img/Maseno-University-Logo.png",140,3,20);
        $this->Ln(); 
        $this->SetFont("Helvetica",'I',12);
        $this->SetTextColor(0,0,255);
        $this->Cell(280,15,'MASENO UNIVERSITY',0,0,"C");
        $this->Ln();
        $this->SetFont("Arial",'BU',12);
        $this->Cell(0,10,'SCHOOL OF COMPUTING ',0,0,"C");
        $this->Ln();
        $this->Cell(0,10,'STUDENT DETAILS',0,0,"C");
        // $this->SetFont('Times','',12);
        $this->Ln();
            }
           
    
     function DetailDisplay(){
        $jsondata = file_get_contents("stud.json");
        $json =json_decode($jsondata,true);
       if( isset($_SESSION['regNo']  ) ) {
      $regNo =$_SESSION['regNo'];
  
       foreach($json['students'] as $student){
      if( ($student['regNo']==$regNo)){
      $username =$student['username'];
       $userimage =$student['Image'];
       $regNo =$student['regNo'];
       $age = $student['age'];
       $phone = $student['phone'];
       $course = $student['course'];
       $gender = $student['gender'];
       $email = $student['email'];
    //   $displayimage="userimg/".$userimage;
              }
          }
    
      }
     $this->SetFont("Helvetica",'B',12);
     $this->Line(1,3,4,2);
    $this->Cell(40,5,"Regestration Number : ",0,0,"L");
    $this->SetFont('Arial','',12);
    $this->Cell(40,5, $regNo,0,0,"R");
    $this->SetFont("Helvetica",'B',12);
    $this->Cell(40,5,'Phone  Number : ',0,0,"C");
    $this->SetFont('Arial','',12);
    $this->Cell(40,5, $phone,0,0,"L");
    $this->SetFont("Helvetica",'B',12);
    $this->Cell(40,5,'UserName :',0,0,"C");
    $this->SetFont('Arial','',12);
    $this->Cell(40,5, $username,0,0,"L");
    // $this->Image("$displayimage",250,40,20);
    $this->Ln();
    $this->SetFont("Helvetica",'B',12);
    $this->Cell(20,10,"Course : ",0,0,"L");
    $this->SetFont('Arial','',12);
    $this->Cell(40,10,$course,0,0,"L");
    $this->SetFont("Helvetica",'B',12);
    $this->Cell(80,10,"Gender: ",0,0,"R");
    $this->SetFont('Arial','',12);
    $this->Cell(80,10,$gender,0,0,"L");
    $this->Ln();
    $this->SetFont("Helvetica",'B',12);
    $this->Cell(20,10,"Email : ",0,0,"L");
    $this->SetFont('Arial','',12);
    $this->Cell(40,10,$email,0,0,"L");
    $this->Ln();

    } 
    function admissionLetter(){
        
        $this->Cell(0,10,'STUDENT DETAILS',0,0,"C");
    }
    function Date(){
    $date = date("l jS \of F Y h:i:s A");
     $this->SetFont('Arial','I',12);
    $this->Cell(70,5,"Printed on :",0,0,"R");
    $this->Cell(70,5,$date,0,0,"L");
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,"Page".$this->PageNo()."/{nb}",0,0,"C");
                    }
}
$pdf=new userdetails();
  $pdf->AliasNbPages();
  $pdf->AddPage("M","A4",0);
   $pdf->DetailDisplay();
 $pdf->Date();
 $pdf->Output();

 ?>