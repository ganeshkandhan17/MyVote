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
    <link rel="stylesheet" href="votingstyle.css">
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
            <form action="countvote.php" method="post">
                     <?php
                      $con = new mysqli('localhost', 'root', '', 'myvote');
                      if ($con->connect_errno) {
                          echo $con->connect_error;
                          die();
                      }
                      $email = $_POST['email'];
                      $admin = $_POST['adminname'];
                      $pass = $_POST['password'];
                      // Check if the email already exists
                      $checkQuery = "SELECT user FROM $admin WHERE user = '$email'";
                      $checkResult = $con->query($checkQuery);

                      if ($checkResult->num_rows > 0) {
                          echo '<script>alert("Email already exists"); window.location.href = "votinglogin.html";</script>';
                      } else {
                          $myquery = "SELECT * FROM $admin WHERE adminname = '$admin' AND PASSWOR = '$pass'";
                          $resul = mysqli_query($con, $myquery);

                          if ($resul) {
                              $count = mysqli_num_rows($resul);
                              if ($count > 0) {
                                  // Insert the new record
                                  $sql = "INSERT INTO $admin (user) VALUES ('$email')";
                                  if ($con->query($sql) === TRUE) {
                                      $query = "SELECT * FROM $admin";
                                      $result = mysqli_query($con, $query);

                      $myquery = "SELECT pol FROM $admin";
                      $res = $con->query($myquery);

                      if ($res->num_rows > 0) {
                          // Fetch each row and store the data in a PHP variable
                          while ($row = $res->fetch_assoc()) {
                              $jet = $row['pol'];
                          }
                      } else {
                          echo "No results found";
                      }
                      if (mysqli_num_rows($result) > 0) {
                          // Fetch column names
                          $fields = mysqli_fetch_fields($result);
                          // Start the table header
                          // Skip the first two column names
                          echo "<input id='hidden' readonly hidden name='adminname' value='".$admin."'>";
                          echo "<input id='hidden' readonly hidden name='password' value='".$pass."'>";
                          for ($i = 4; $i < count($fields); $i++) {
                              echo "<button id='votingbutton' name='pool".($i-3)."' value=".$fields[$i]->name."'>",$fields[$i]->name,"</button>";
                          }
                          // Fetch and display the data
                      } else {
                          echo "No records found.";
                      }
                                      // Redirect to a success page
                                      // header("Location: success.php");
                                      exit();
                                  } else {
                                      echo "Error: " . $sql . "<br>" . $con->error;
                                  }
                              } else {
                                  // Invalid admin credentials
                                  echo '<script>alert("Invalid admin credentials"); window.location.href = "votinglogin.html";</script>';
                              }
                          } else {
                              // Error executing the query
                              echo "Error: " . mysqli_error($con);
                          }
                      }
                      $con->close();
                      ?>

            </form>
        </div>

</body>
</html>
