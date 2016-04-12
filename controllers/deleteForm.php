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
$query=sprintf("Delete from Forms where FormID = %d and Username = '%s'",$_POST['FormIDD'] ,$_SESSION['username']);
if (mysqli_query($conn, $query) == TRUE) {
    echo "<script>alert('Form Deleted');window.location.href='../views/usergroups/gbm/viewForms.php';</script>";
} else {
    echo "<script>alert('Unable to delete Form!');window.location.href='../views/usergroups/gbm/viewForms.php';</script>";
}
mysqli_close($conn);
?>
