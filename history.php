<!DOCTYPE html>
<html>
<head>
    <title>History</title>
    <style>
        body {
            background-image: url(bg1.png);
            background-attachment: fixed;
            width: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            padding-bottom: 1cm;
        }

        /* Center the row-box */
        .row-box {
            display: flex;
            justify-content: center; /* Center the content horizontally */
            align-items: center;
            height: 60px; /* Set the desired height of the row box */
            border: 1px solid #ccc;
            padding: 0 20px; /* Add some padding to separate the content from the edges */
            margin-bottom: 10px; /* Add margin between rows */
            background-color: yellow; /* Change the background color to yellow */

    }

        /* Style the adminname in the row box */
        .adminname {
            flex: 1; /* Allow the adminname to occupy the remaining space */
            font-size: 18px;
        }

        /* Style the buttons */
        .action-button {
            padding: 10px 20px;
            margin-left: 10px; /* Add some space between the buttons */
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
        }

        .result-button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
        }

        .end-button {
            background-color: #f44336;
            color: #fff;
            border: none;
        }
    </style>
</head>
<body>
    <!-- PHP code goes here -->

    <?php
    // Your PHP code here (replace the provided email with the one you want to query)
    $conn = new mysqli('localhost', 'root', '', 'vote');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = "purushothamanjerry03@gmail.com"; // Replace with the email you want to query

    // Query to retrieve names associated with the given email
    $query = "SELECT adminname FROM user WHERE email = '$email'";
    $result = $conn->query($query);

    // Check if the query was successful
    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="row-box">';
                echo '<div class="adminname">' . $row['adminname'] . '</div>';
                echo '<button class="action-button result-button">Result</button>';
                echo '<button class="action-button end-button">End</button>';
                echo '</div>';
            }
        } else {
            echo '<div class="row-box">';
            echo '<div class="adminname">No names found for the email: ' . $email . '</div>';
            echo '</div>';
        }
    } else {
        echo "Error executing the query: " . $conn->error;
    }

    // Close the connection
    $conn->close();
    ?>
</body>
</html>

