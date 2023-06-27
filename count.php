<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myvote";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data from the 'test' table
$sql = "SELECT * FROM test";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Initialize sums array
    $sums = array();

    // Fetch column names
    $fieldinfo = $result->fetch_fields();
    $columnCount = count($fieldinfo);
    for ($i = 4; $i < $columnCount; $i++) {
        $column = $fieldinfo[$i]->name;
        $sums[$column] = 0; // Initialize sum for each column
    }

    // Fetch data rows and calculate sums
    while ($row = $result->fetch_assoc()) {
        $values = array_values($row);
        for ($i = 4; $i < $columnCount; $i++) {
            $value = $values[$i];
            // Check if the value is numeric before adding to the sum
            if (is_numeric($value)) {
                $column = $fieldinfo[$i]->name;
                $sums[$column] += $value;
            }
        }
    }

    // Display column names and sums
    foreach ($sums as $column => $sum) {
        echo "Column: " . $column . ", Sum: " . $sum . "<br>";
    }
} else {
    echo "No data found in the 'test' table.";
}

// Close connection
$conn->close();
?>
