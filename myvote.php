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
    <link rel="stylesheet" href="myvotestyle.css">
 </head>
 <body class="container-fluid">
        <?php
       $con=new mysqli('localhost','root','','myvote');
        if($con->connect_errno)
        {
            echo $con->connect_error;
            die();
        }

        $an=$_POST['adminname'];
        $npass=$_POST['pass'];
        $npol=$_POST['pol'];
  //      ${'p'.$i}=$_POST['pool'.$i];
  //      echo ${'p'.$i};

        $sql="CREATE TABLE $an(adminname VARCHAR(50), PASSWOR VARCHAR(50))";
        $mysqli="INSERT INTO $an (adminname, PASSWOR) VALUES ('$an', '$npass')";
        $result = $con->query($sql);
        $out= $con->query($mysqli);

        for($i=1;$i<=$npol;$i++){
            ${'p'.$i}=$_POST['pool'.$i];
        $mysql="ALTER TABLE $an ADD ${'p'.$i} VARCHAR (50) NOT NULL";
        $put=$con->query($mysql);
        }

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
              <form id="createpool" action="#" method="post">
                <input style="margin-right:5px;" id="input1" type="text" name="adminname" placeholder="Admin name" required>
                <input style="margin-left:5px;" id="input2" type="Password" name="email" placeholder="Password" required><br>
                <input id="input3" type="number" placeholder="No of poll"required><br>
                <p style="margin: 0;letter-spacing:10px; margin-top: 15px;">Time in min</p>
                <input style="margin-top:5px;"type="number" min="0" max="60" id="time"><br>
                <button style="margin-bottom:20px;height:35px" type="button"class="inbtn" id="create">Preview</button>
                <button style="margin-bottom:20px;height:35px" type="button"class="inbtn" id="delete">Delete</button><br>
                <ul id="list">
                  
                </ul>
                <button style="margin-top:0;height:35px" type="submit" class="inbtn">Submit</button>
                <button style="margin-top:0;height:35px" type="reset" id="reset"class="inbtn">Reset</button>
                </div>
              </form>
              <div id="analysisbox" class="disabled">
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
                <button href="result.html"style=" margin-top: 40px;height: 40px;"class="inbtn" id="result">Result</button>
                <div>
        <h1>$an</h1>

                </div>
              </div>
        </div>
</body>
</html>