<?php

$con = new mysqli('localhost', 'root', '', 'vote');
if ($con->connect_errno) {
    echo $con->connect_error;
    die();
}

$nnumber = $_POST['number'];
$opassword = $_POST['oldpassword'];
$password = $_POST['newpassword'];

// Prepare the SQL query to check if the mobile number exists in the database
$query = "SELECT COUNT(*) as count FROM register WHERE number = '$nnumber'";
$resul = mysqli_query($con, $query);

if ($resul) {
    $row = mysqli_fetch_assoc($resul);
    $count = $row['count'];

    if ($count > 0) {
        // Mobile number exists in the database, check if the given password matches
        $quer = "SELECT * FROM register WHERE number = '$nnumber' AND password = '$opassword'";
        $res = mysqli_query($con, $quer);

        if ($res) {
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                // Mobile number and old password match, update the password
                $sql = "UPDATE register SET confirmpassword = '$password',password = '$password'   WHERE number='$nnumber' AND password='$opassword'";
                $result = $con->query($sql);

                if ($result) {
                    // Password update successful
                    echo '<script>alert("Password changed successfully."); window.location.href = "SignIn.html";</script>';

                } else {
                    // Error updating the password
                    echo "Error: " . mysqli_error($con);
                }
            } else {
                // Mobile number and old password do not match
            

    echo '<script>alert("Mobile number and password do not match."); window.location.href = "changepass.html";</script>';   
            }
        } else {
            // Error executing the query
            echo "Error: " . mysqli_error($con);
        }
    } else {
        // Mobile number does not exist in the database
        echo '<script>alert("Mobile number not found in the database. Please enter a valid number."); window.location.href = "changepass.html";</script>';   
    }
} else {
    // Error executing the query
    echo "Error: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
