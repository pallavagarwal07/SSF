<?php
include '../../../controllers/redirect.php';
if($_SESSION["username"]=="chair_ss" || $_SESSION["username"]=="presidentsg" || $_SESSION["username"]=="culsecy" || $_SESSION["username"]=="fmcsecy" || $_SESSION["username"]=="sportsecy" || $_SESSION["username"]=="finance" || $_SESSION["username"]=="sntsecy") {
    echo "<script>
        alert('You do not have access rights!');
    window.location.href='../../../controllers/logout.php';
</script>";
}
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
    echo "<script>alert('Form Deleted');window.location.href='../../../';</script>";
} else {
    echo "<script>alert('Unable to delete Form!');window.location.href='../../..';</script>";
}
mysqli_close($conn);
?>
