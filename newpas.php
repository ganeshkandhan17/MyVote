<?php 

$con=new mysqli('localhost','root','','vote');
if($con->connect_errno)
{
    echo $con->connect_error;
    die();

}

$nnumber=$_POST['number'];

$opassword=$_POST['oldpassword'];
$password=$_POST['newpassword'];

///echo $nnumber;
//echo $opassword;

//echo $password;


$sql = "UPDATE register SET confirmpassword = '$password', password = '$password' WHERE number='$nnumber' AND confirmpassword='$opassword'";

if($result = $con->query($sql))
{
	echo  'password changed successfully'. "<br>";
	

}else{
	echo 'password not changed';
}

 ?>