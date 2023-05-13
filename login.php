<?php
// session_start();

//connection form and mysql server

$con=mysqli_connect("sql312.epizy.com","epiz_34111150","uhrUzEhmDiwG7F","epiz_34111150_home");

//user name password receive login page

$usertrim= trim($_POST['email']);

$userstrip=stripcslashes($usertrim);
$finaluser = htmlspecialchars($userstrip);

// password 

$passtrim= trim($_POST['password']);

$passstrip=stripcslashes($passtrim);
$finalpass = htmlspecialchars($passstrip);

//comparision user input and data base

$sql = "SELECT * FROM register where email='$finaluser' AND confirmpassword = '$finalpass'";

//sql request excuted
$result = mysqli_query($con,$sql);

//if number of row isgreatervthan o there is username and passwword

// match is found else is not found

if(mysqli_num_rows($result)>=1)
{
  //user is stored to session and forward next page
  $_SESSION["myuser"]=$finaluser;
  header("Location:myvote.html");
}else{
  //error is shown
  $_SESSION["error"]="you are not valid user";
    echo"user name or password are not valid";
}
?>
