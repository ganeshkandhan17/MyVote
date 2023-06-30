<?php
$con = mysqli_connect("localhost", "root", "", "vote");

// Check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$email = $_POST['email'];
$password = $_POST['password'];

// Prepare the query to check email and password in the 'register' table
$query = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($con, $query);

// Check if the query execution was successful
if ($result) {
    // Check if a row was found with the provided email and password
    if (mysqli_num_rows($result) > 0) {
        // The email and password are matching in the 'register' table
        header("Location: myvote.html");

        
    } else {
        echo '<script>alert("Invalid user"); window.location.href = "SignIn.html";</script>';
        // No matching email and password found in the 'register' table
        // Handle the appropriate action or show an error message
    }
} else {
    // Error executing the query for checking email and password in the 'register' table
    echo "Error: " . mysqli_error($con);
    exit();
}

// Close the database connection
mysqli_close($con);
?>
