<?php
// Array with names
$a[] = "Bsc. Computer Science";
$a[] = "Bsc. Computer Technology";
$a[] = "Bsc. Maths and Computer Science";

// Array with names
$m[] = "Bsc. Nuerology with IT";
$m[] = "Bsc. Pharmacy with IT";
$m[] = "Bsc. Nursing";

// Array with names
$d[] = "Bsc. Interor Design With IT";
$d[] = "Bsc. Music Production With IT";
$d[] = "Bsc. Theater Arts With IT";




// get the q parameter from URL
$q = $_REQUEST["q"];

$hint[] = "";

if ($q == 'School Of Computing And Informatics') {
  $q = strtolower($q);
  $len=strlen($q);
 
  $hint=$a;


}


if ($q == 'School Of Medicine') {
  $q = strtolower($q);
  $len=strlen($q);
 
  $hint=$m;
}

if ($q == 'School Of Arts And Design') {
  $q = strtolower($q);
  $len=strlen($q);
 
  $hint=$d;
}

echo '<option value="" disabled selected>Select Course</option>';
// Output "no suggestion" if no hint was found or output correct values
foreach($hint as $name) {

  
  echo '<option value='.$name.'>'.$name.'</option>';
  
}



?>
