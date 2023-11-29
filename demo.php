<?php
$con = new mysqli('localhost', 'root', '', 'myvote');
if ($con->connect_errno) {
    echo $con->connect_error;
    die();
}

$email = $con->real_escape_string($_POST['email']);
$admin = $con->real_escape_string($_POST['adminname']);
$value = $con->real_escape_string($_POST['selected']);

$sql = "SELECT * FROM $admin WHERE user = '$email'";

// Execute the query
$result = $con->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {

        echo '<script>alert("Sorry, you have already voted."); window.location.href = "index.html";</script>';



} else {


    $mysqli = "INSERT INTO $admin (user) VALUES ('$email');";
    $addResult = $con->query($mysqli);

    $Query = "INSERT INTO $admin ($value) VALUES (1);";
    $addResult = $con->query($Query);

    if ($addResult) {
        echo '<script>alert("Vote added successfully."); window.location.href = "index.html";</script>';
    }
    else{
        echo "successfully";
    }
}

?>
