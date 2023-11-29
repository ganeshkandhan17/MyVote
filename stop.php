<?php 
$conn = new mysqli('localhost', 'root', '', 'vote');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Get email and adminname from your PHP input, form, or variables
//$email = $_POST['email']; // Replace 'email' with the name of your email input field
//$adminname = $_POST['adminname']; // Replace 'adminname' with the name of your adminname input field
$email ="purushothamanjerry03@gmail.com";
$adminname = "gta";

// Step 3: Construct and execute the DELETE SQL query
$sql = "DELETE FROM user WHERE email = ? AND adminname = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $adminname);

if ($stmt->execute()) {
    echo "Row deleted successfully.";
} else {
    echo "Error deleting row: " . $conn->error;
}

// Step 4: Close the database connection
$stmt->close();
$conn->close();
?>
