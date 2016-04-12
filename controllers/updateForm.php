<?php
include "./redirect.php";
$servername = "127.0.0.1";
$username = "root";
$password = "l;'";
$dbname="SSF";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo $_POST['FormID'];
$query = sprintf("Update Forms SET Name  = '%s', RollNumber= %d, Email= '%s', Phone= '%s', Event= '%s', Council= '%s',ExpiryDate = CAST('%s' AS DATE), TargetAmount = %f WHERE FormID = %d", $_POST['name'], $_POST['roll'], $_POST['email'], $_POST['phone'], $_POST['event'], $_POST['council'], $_POST['expiry'], $_POST['amount'], $_POST['FormID']);
//echo $query;
if (mysqli_query($conn, $query) == TRUE) {
    echo "<script>alert('Form Updated');window.location.href='../views/usergroups/gbm/viewForms.php';</script>";
} else {
    echo "<script>alert('Unable to Update Form!');window.location.href='../views/usergroups/gbm/viewForms.php';</script>";
}
mysqli_close($conn);
?>
