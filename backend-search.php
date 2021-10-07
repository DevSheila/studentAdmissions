<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$conn = mysqli_connect("localhost", "root", "", "stud_admissions");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM stud_profile WHERE adm_no LIKE ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
           
                    
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $docId= $row['id']; 
                    $surname = $row['surname'];
                    $othername = $row['other_name'];
                    $name=$surname." ".$othername;
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $age = $row['age'];
                    $gender = $row['gender'];
                    $docStatus= $row['status']; 
                    $adm_no=$row['adm_no'];
                   $dob=$row['DOB'];
             //."<a href='adminStage2.php?id=$docId'>View</a> " for linking
                    echo "<p>" . $row["surname"]  ." ". $row["other_name"]  ." ". $row["adm_no"] ."  ". $row["email"] ." "."</p>";
                //    echo'
                //    <tr>
                //  <th> $docId</th>
                // <th> $surname</th>
                // <th> $othername<th>
                // <th> $emailecho</th>
                //  </tr>  
                //  </table>';
                   
                    
                   
                   
                  
                                    }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($conn);
?>