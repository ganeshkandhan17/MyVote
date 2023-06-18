<?php
$number = $_POST['number'];
$email  = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];



if($password==$confirmpassword){
if (!empty($number) || !empty($email) || !empty($password) || !empty($confirmpassword) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "vote";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());

}
else{
  $SELECT = "SELECT email From register Where email = ? Limit 1";
  $INSERT = "INSERT Into register (number , email ,password, confirmpassword )values(?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $number,$email,$password,$confirmpassword);
      $stmt->execute();
      header("Location: SignIn.html");
      exit;
     } else {
      function function_alert($message){
      echo "<script>alert('$message');</script>";
    }
    function_alert("email already exists");
     }
     $stmt->close();
     $conn->close();
    }
} else {
  echo "<script>alert('All fields are required');</script>";
 die();
}
}
else{
  echo "<script>alert('Password And Confirm password are not same');</script>";
}
?>
