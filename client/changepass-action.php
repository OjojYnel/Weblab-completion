<?php
include 'config.php';





// initializing variables

$currentpassword = "";
$newpassword = "";
$confirmpassword = "";
$errors = array(); 



if (isset($_POST['change_pass'])) {

    //register new password

$currentpassword = mysqli_real_escape_string($con,$_POST['currentpassword']); 
$newpassword = mysqli_real_escape_string($con,$_POST['newpassword']); 
$confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']); 

//check pass in db

$queryget = mysqli_query("SELECT password FROM users WHERE username='$user'");
$row = mysql_fetch_assoc($queryget);

$oldpassworddb = $row['password'];

   
   
           

    
    


//validation
if (empty($currentpassword)) { 
    array_push($errors, "Password is required"); 
  }

  if (empty($newpassword)) { 
    array_push($errors, "New Password is required"); 
  }

  if (empty($confirmpassword)) { 
    array_push($errors, "Confirm Password is required"); 
  }

  if ($newpassword != $confirmpassword) {
    array_push($errors, "The two passwords do not match");
  }




// if($newpassword == $confirmpassword){

// // $changepassword = mysqli_query($con,"UPDATE users set " )

// } else {
//     $alertpass = "Password does not match";
// }

if (count($errors) == 0) {

    $currentpassword = md5($newpassword);

    $query = "UPDATE users SET password = '$newpassword' WHERE username= '$user_id' ";


    mysqli_query($con, $query);

 
    
//   	$query = "INSERT INTO users (username, first_name, last_name, password) 
//       VALUES('$username','$firstname','$lastname','$password')";
// mysqli_query($con, $query);


}




}






?>