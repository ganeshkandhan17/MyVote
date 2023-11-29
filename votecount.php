

<?php
// Rest of your code here
$con = new mysqli('localhost', 'root', '', 'myvote');
if ($con->connect_errno) {
    echo $con->connect_error;
    die();
}

$admin = $_POST['adminname'];
$value = $_POST['selected'];

$Query = "INSERT INTO $admin ($value) VALUES (1);";
$addResult = $con->query($Query);

if ($addResult) {
    echo '<script>alert("Vote added successfully."); window.location.href = "index.html";</script>';
}
?>
<script>
    // JavaScript code to redirect to index.html if the user clicks the back button
    if (window.history && window.history.pushState) {
        window.history.pushState('', null, './index.html');
        window.addEventListener('popstate', function() {
            window.location.href = 'index.html';
        });
    }
</script>
