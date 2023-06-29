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
    <script src="myvote.js" defer></script>
    <script src="timer.js" defer></script>
    <link rel="stylesheet" href="myvotestyle.css">
 </head>
 <body class="container-fluid">
       <?php
$con = new mysqli('localhost', 'root', '', 'myvote');

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: " . $con->connect_error;
    die();
}

$an = $_POST['adminname'];
$sq = "SHOW TABLES LIKE '$an'";
$reslt = $con->query($sq);

// Check if table exists
if ($reslt->num_rows > 0) {
    // Table already exists, display pop-up message or perform any action you want
    echo '<script>alert("Table already exists"); window.location.href = "myvote.html";</script>';
} else {
    $npass = $_POST['pass'];
    $npol = $_POST['pol'];

    $sql = "CREATE TABLE $an (adminname VARCHAR(50), PASSWOR VARCHAR(50), pol VARCHAR(50), user VARCHAR(50))";
    $result = $con->query($sql);

    if ($result) {
        $mysqli = "INSERT INTO $an (adminname, PASSWOR, pol) VALUES ('$an', '$npass', '$npol')";
        $out = $con->query($mysqli);

        for ($i = 1; $i <= $npol; $i++) {
            ${'p' . $i} = $_POST['pool' . $i];
            $mysql = "ALTER TABLE $an ADD ${'p' . $i} VARCHAR(50) NOT NULL";
            $put = $con->query($mysql);
        }

        // Table created successfully
    } else {
        echo "Error creating table: " . $con->error;
    }
}

$con->close();
?>

      <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand" href="index.html"><image src="logo.png" height="30"></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#closethedoor">
            <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="closethedoor" >
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="#" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Create</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
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
        <div id="box">
          <h1></h1>
              <h1 style="margin-top: 10px;">Create Pool</h1>
              <?php
                    $an=$_POST['adminname'];
                    $npass=$_POST['pass'];
                    $npol=$_POST['pol'];
                    $tn=$_POST['tiger'];
                    echo "<p style='display:inline; margin-right:30px; margin-top:30px;letter-spacing: 5px;'>Admin Name</p>";
                    echo "<p style='display: inline; margin-top:30px; margin-left:30px;letter-spacing: 5px;'>Password</p><br>";
                    echo "<input style='display:inline; margin-top: 5px; margin-right:5px;' readonly value='$an'>";
                    echo "<input style='display:inline; margin-top: 5px;margin-left:5px;' readonly value='$npass'><br>";
                    echo "<p style='margin-top:15px;margin-bottom: 5px;letter-spacing: 5px;'>No of Pools</p>";
                    echo "<input style='margin-top:0px' readonly value='$npol'><br>";
                    echo "<p style='margin: 0;letter-spacing:10px; margin-top: 15px;'>Time in min</p>";
                    echo "<input style='margin-top:5px;' id='minute' readonly value='$tn'><br>";
              ?>
                <button style="margin-bottom:20px;height:35px" type="button" class="inbtn" id="create" disabled>Preview</button>
                <button style="margin-bottom:20px;height:35px" type="button" class="inbtn" id="delete" disabled>Delete</button><br>
                <button style="margin-top:0;height:35px" type="submit" class="inbtn" disabled>Submit</button>
                <button style="margin-top:0;height:35px" type="reset" id="reset"class="inbtn" disabled>Reset</button>
                </div>
              </form>
              <div id="analysisbox">
                <h1>Analysis</h1>
                <h5 style="margin-top:25px;letter-spacing: 5px;">Time Remaining</h5>
                <div id="timerbox">
                  <div class="box1">
                    <p id="min">00</p>
                    <p>Min</p>
                  </div>
                  <div class="box2">
                    <p id="sec">00</p>
                    <p>Sec</p>
                  </div>
                </div>
                <button href="result.php"style="margin-top: 40px;height: 40px;"class="inbtn" id="result" disabled>Result</button>
                <div>


                </div>
              </div>
        </div>
</body>
</html>