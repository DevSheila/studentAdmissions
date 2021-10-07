<?php
    include("config.php");

      // Array with names
    $a[] = "Anna";
    // Check connection
    if (!$conn ||mysqli_connect_errno()) {
        echo("Connection failed: " . mysqli_connect_error());
      }else{

        
        $sql = "SELECT * FROM docs_collected";
        $result = mysqli_query($conn,$sql);
        // $active = $row['active'];
        
        $count = mysqli_num_rows($result);
        while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $surname = $row['name'];
            array_push($a, $surname);
        }
        // print_r($a); 

      }




// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>
