<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyVote</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="result.css">
 </head>
 <body class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand" href="index.html"><image src="logo.png" height="30"></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#closethedoor">
            <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="closethedoor" >
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="index.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://github.com/ganeshkandhan17/MyVote">Github</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#About">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Contact_Us">Contact Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <image src="profile.png" height="25">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <p style="font-size: 12.5px; padding:0px 10px; font-weight:bold;">id : <span id="id"></span></p>
              <hr>
              <a class="dropdown-item" href="index.html">Log Out</a>
              <a class="dropdown-item" href="changepass.html">Change Password</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <table class="table-hover">
      <thead>
        <tr>
          <th style="border-radius: 20px 0 0 20px;">Pools</th>
          <th style="border-radius: 0 20px 20px  0px;">Vote</th>
        </tr>
      </thead>
      <tbody>
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
$an = isset($_GET['adminname']) ? $_GET['adminname'] : '';
$pass = isset($_GET['password']) ? $_GET['password'] : '';

//echo $an;
//echo $pass;

    
    $myquery = "SELECT * FROM $an Where adminname = '$an' AND PASSWOR = '$pass'";
    $result = mysqli_query($conn, $myquery);

    if ($result) {
        // Check if a row was found with the provided username and password
        if (mysqli_num_rows($result) > 0) {
            // Query to fetch data from the 'test' table
            $sql = "SELECT * FROM $an ";
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
                    echo "<tr>";
                    echo "<td>" . $column . "</td>";
                    echo "<td>" . $sum . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "No data found in the '$an' table.";
            }
        } else {
            // Display an error message if the password is wrong
            echo '<script>alert("Invalid username or password. Please try again");window.location.href = "resultlogin.html";</script>';

        }
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }

    // Close connection
    $conn->close();

?>

          
      </tbody>

    </table>

 </body>
 <footer>
  <div id="Contact_Us">
        <h1 style="letter-spacing: 5px; margin :10px;">Contact Us</h1>
    <div class="container1">
        <div>
          <p><b>Front-End Developer</b></p>
          <p id="name">Ganesh Kandhan <br>V M</p>
          <a href="https://www.linkedin.com/in/ganeshkandhan"><img src="linkedinlogo.png"></a>
          <a href="https://www.github.com/ganeshkandhan17"><img src="githublogo.png"></a>
        </div>
        <div>
          <p><b>Back-End Developer</b></p>
          <p id="name">Purushothaman <br>S</p>
          <a href="https://www.linkedin.com/in/purushothaman-s-076028286/"><img src="linkedinlogo.png"></a>
          <a href="https://www.github.com/purushothamanjerry"><img src="githublogo.png"></a>
        </div>
    </div>
  </div>
  <div id="About">
    <h1 id="Abouthead"style="letter-spacing: 5px; margin :10px;">About</h1>
    <p>
      MyVote is a simple and responsive voting website includes features such as user authentication (login and signup), the ability to create and vote on polls, view results, and manage passwords (forget and change password functionalities).<br><a href="https://github.com/ganeshkandhan17/MyVote">Github</a>
    </p>
    <h2 id="techfont"style="letter-spacing: 5px; margin: 30px;">Technical Stacks</h2>
    <div id="flex2">
      <div>
        <h3>Front-End</h3>
        <ul>
          <li>HTML</li>
          <li>CSS</li>
          <li>Java Script</li>
          <li>Bootstrap</li>
        </ul>
      </div>
      <div>
        <h3>Back-End</h3>
        <ul>
          <li>PHP</li>
          <li>SQL</li>
        </ul>
      </div>
    </div>
</div>
</footer>
</html>