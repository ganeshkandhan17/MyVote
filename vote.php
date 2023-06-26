<?php

$con = new mysqli('localhost', 'root', '', 'myvote');
if ($con->connect_errno) {
    echo $con->connect_error;
    die();
}

$email = $_POST['email'];
$admin = $_POST['adminname'];
$query = "SELECT * FROM $admin";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    
    // Fetch column names
    $fields = mysqli_fetch_fields($result);
    
    // Start the table header
    echo "<tr>";
    
    // Skip the first two column names
    for ($i = 4; $i < count($fields); $i++) {
        echo "<th>" . $fields[$i]->name . "</th>";
    }
    
    echo "</tr>";
    
    // Fetch and display the data
    
    
    echo "</table>";
} else {
    echo "No records found.";
}

$myquery = "SELECT pol FROM $admin";
$res = $con->query($myquery);

if ($res->num_rows > 0) {
    // Fetch each row and store the data in a PHP variable
    while ($row = $res->fetch_assoc()) {
        $jet = $row['pol'];
        
        // Do something with the fetched data
        echo $jet. "<br>";
    }
} else {
    echo "No results found";
}


$pass = $_POST['password'];

// Check if the email already exists
$checkQuery = "SELECT user FROM $admin WHERE user = '$email'";
$checkResult = $con->query($checkQuery);

if ($checkResult->num_rows > 0) {
    echo '<script>alert("Email already exists"); window.location.href = "vote.html";</script>';
} else {
    $myquery = "SELECT * FROM $admin WHERE adminname = '$admin' AND PASSWOR = '$pass'";
    $resul = mysqli_query($con, $myquery);

    if ($resul) {
        $count = mysqli_num_rows($resul);
        if ($count > 0) {
            // Insert the new record
            $sql = "INSERT INTO $admin (user) VALUES ('$email')";
            if ($con->query($sql) === TRUE) {
                // Redirect to a success page
                // header("Location: success.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        } else {
            // Invalid admin credentials
            echo '<script>alert("Invalid admin credentials"); window.location.href = "vote.html";</script>';
        }
    } else {
        // Error executing the query
        echo "Error: " . mysqli_error($con);
    }
}


$con->close();


?>
