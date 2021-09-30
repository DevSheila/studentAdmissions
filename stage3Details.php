<?php
session_start();
require('fpdf184/fpdf.php');

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
        $this->Image("img/maseno-university-logo.png",140,3,20);
        $this->Ln(); 
        $this->SetFont("Helvetica",'I',12);
        $this->SetTextColor(0,0,255);
        $this->Cell(280,15,'MASENO UNIVERSITY',0,0,"C");
        $this->Ln();
        $this->SetFont("Arial",'BU',12);
        $this->Cell(0,10,'STUDENT REGISTRATION.',0,0,"C");
        $this->Ln();
        $this->Cell(0,10,'STAGE 2:STUDENT PROFILE',0,0,"C");
        // $this->SetFont('Times','',12);
        $this->Ln();
            }
         
    function DisplayTableHeader(){
        include ('config.php');
        $this->SetFont('Arial','B',12);
        //$this->Line(1,3,4,2);
        $this->Cell(10,5,' ID',1,0,"L");
         $this->Cell(44,5,'Name',1,0,"L"); //  $this->Cell(10,5,'Ohter Name',1,0,"L");
        $this->Cell(34,5,' AdmNo.',1,0,"L");
        $this->Cell(55,5,'FEES FILE',1,0,"L");
        $this->Cell(50,5,"FEES TOTAL",1,0,"L");
        $this->Cell(45,5,"ACCOMODATION",1,0,"L");
        $this->Cell(40,5,"STATUS",1,1,"L");
       
        $this->SetFont('Arial','',12);
        $sql = "SELECT * FROM nominal_roll";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
            $docId= $row['id'];
           $name = $row['name'];
          
           $adm_no=$row['adm_no'];
           $fees_file= $row['fees_file']; 
           $fees_total = $row['fees_total'];
           $accomodation= $row['accomodation'];
           $status= $row['status']; 
            
      
          
         $this->Cell(10,5,$docId,1,0,"L");
         $this->Cell(44,5,"$name",1,0,"L");
         $this->Cell(34,5,$adm_no,1,0,"L");
         $this->Cell(55,5,$fees_file,1,0,"L");
         $this->Cell(50,5,$fees_total,1,0,"L");
         $this->Cell(45,5,"$accomodation",1,0,"L");
         $this->Cell(40,5,$status,1,1,"L");
         
        
        }
    }
   
    function admissionLetter(){
        
        // $this->Cell(0,10,'STUDENT DETAILS',0,0,"C");
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
 $pdf->DisplayTableHeader();
 $pdf->Date();
 $pdf->Output();

 ?>