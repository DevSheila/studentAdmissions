<<<<<<< HEAD
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
         $this->Cell(44,5,'Name',1,0,"L");
        //  $this->Cell(10,5,'Ohter Name',1,0,"L");
        $this->Cell(34,5,' AdmNo.',1,0,"L");
        $this->Cell(55,5,'COURSE',1,0,"L");
        $this->Cell(20,5,"GENDER",1,0,"L");
        $this->Cell(25,5,"DOB",1,0,"L");
        $this->Cell(60,5,"EMAIL",1,0,"L");
        $this->Cell(30,5,"PHONE",1,1,"L");
        $this->SetFont('Arial','',12);
        $sql = "SELECT * FROM stud_profile";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
            $docId= $row['id'];
            $surname =  $row['surname']; 
            $other_name =$row['other_name'];
           $name = "$surname $other_name";
          
           $adm_no=$row['adm_no'];
           $course= $row['course']; 
           $gender = $row['gender'];
           $DOB= $row['DOB'];
           $email= $row['email']; 
           $phone= $row['phone']; 
      
          
         $this->Cell(10,5,$docId,1,0,"L");
        //  $this->Cell(10,5, $other_name,1,0,"L");
         $this->Cell(44,5,"$name",1,0,"L");
         $this->Cell(34,5,$adm_no,1,0,"L");
         $this->Cell(55,5,$course,1,0,"L");
         $this->Cell(20,5,$gender,1,0,"L");
         $this->Cell(25,5,"$DOB",1,0,"L");
         $this->Cell(60,5,$email,1,0,"L");
         $this->Cell(30,5,$phone,1,1,"L");
        
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

=======
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
         $this->Cell(44,5,'Name',1,0,"L");
        //  $this->Cell(10,5,'Ohter Name',1,0,"L");
        $this->Cell(34,5,' AdmNo.',1,0,"L");
        $this->Cell(55,5,'COURSE',1,0,"L");
        $this->Cell(20,5,"GENDER",1,0,"L");
        $this->Cell(25,5,"DOB",1,0,"L");
        $this->Cell(60,5,"EMAIL",1,0,"L");
        $this->Cell(30,5,"PHONE",1,1,"L");
        $this->SetFont('Arial','',12);
        $sql = "SELECT * FROM stud_profile";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
            $docId= $row['id'];
            $surname =  $row['surname']; 
            $other_name =$row['other_name'];
           $name = "$surname $other_name";
          
           $adm_no=$row['adm_no'];
           $course= $row['course']; 
           $gender = $row['gender'];
           $DOB= $row['DOB'];
           $email= $row['email']; 
           $phone= $row['phone']; 
      
          
         $this->Cell(10,5,$docId,1,0,"L");
        //  $this->Cell(10,5, $other_name,1,0,"L");
         $this->Cell(44,5,"$name",1,0,"L");
         $this->Cell(34,5,$adm_no,1,0,"L");
         $this->Cell(55,5,$course,1,0,"L");
         $this->Cell(20,5,$gender,1,0,"L");
         $this->Cell(25,5,"$DOB",1,0,"L");
         $this->Cell(60,5,$email,1,0,"L");
         $this->Cell(30,5,$phone,1,1,"L");
        
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

>>>>>>> be9acfd (conditions for student page display AJAX search)
 ?>