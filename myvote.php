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
    echo '<script>alert("Table name already exists"); window.location.href = "myvote.html";</script>';
} else {
    $npass = $_POST['pass'];
    $npol = $_POST['pol'];
    $game = $_POST['id'];

    $connection = new mysqli('localhost', 'root', '', 'vote');
    $file = "INSERT INTO user (email, adminname, password) VALUES ('$game', '$an', '$npass')";
$res = $connection->query($file);

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
    } 

   
 else {
    // Error executing the query for checking email and password in the 'register' table
    echo "Error: " . mysqli_error($con);
    exit();
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
                    echo "<p style='display:inline; margin-right:30px; margin-top:30px;letter-spacing: 5px;'>Admin Name</p>";
                    echo "<p style='display: inline; margin-top:30px; margin-left:30px;letter-spacing: 5px;'>Password</p><br>";
                    echo "<input style='display:inline; margin-top: 5px; margin-right:5px;' readonly value='$an'>";
                    echo "<input style='display:inline; margin-top: 5px;margin-left:5px;' readonly value='$npass'><br>";
                    echo "<p style='margin-top:15px;margin-bottom: 5px;letter-spacing: 5px;'>No of Pools</p>";
                    echo "<input style='margin-top:0px' readonly value='$npol'><br>";
                   // echo "<p style='margin: 0;letter-spacing:10px; margin-top: 15px;'>Time in min</p>";
                   // echo "<input style='margin-top:5px;' id='minute' readonly value='$tn'><br>";
              ?>
                <button style="margin-bottom:20px;height:35px" type="button" class="inbtn" id="create" disabled>Preview</button>
                <button style="margin-bottom:20px;height:35px" type="button" class="inbtn" id="delete" disabled>Delete</button><br>
                <button style="margin-top:0;height:35px" type="submit" class="inbtn" disabled>Submit</button>
                <button style="margin-top:0;height:35px" type="reset" id="reset"class="inbtn" disabled>Reset</button>
                </div>
              </form>
              <div id="analysisbox">
                <form action="result.php" type="post">

                  <?php
                    echo "<input type='text' name='adminname' hidden value='".$an."'>";
                    echo "<input type='password' name='password' hidden value='".$npass."'>"
                  ?>

                <h5 style="margin-top:25px;letter-spacing: 5px;">Result</h5>
                <button type="submit" style="margin-top: 40px;height: 40px;" class="inbtn" id="result">Result</button>
                </form>
              </div>
        </div>
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