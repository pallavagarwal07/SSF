<?php
include "../../../controllers/redirect.php";
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
//echo $_POST['FormID'];
$query = sprintf("Update Forms SET Name  = '%s', RollNumber= %d, Email= '%s', Phone= '%s', Event= '%s', Council= '%s',ExpiryDate = CAST('%s' AS DATE), TargetAmount = %f, ApprovalState=%d WHERE FormID = %d", $_POST['name'], $_POST['roll'], $_POST['email'], $_POST['phone'], $_POST['event'], $_POST['council'], $_POST['expiry'], $_POST['amount'], $_POST['state'], $_POST['FormID']);
//echo $query;
if (mysqli_query($conn, $query) == TRUE) {
	header('Location: ./homepage.php?msg=se');
    // echo "<script>alert('Form Updated');window.location.href='./homepage.php?msg=s';</script>";
} else {
	header('Location: ./homepage.php?msg=ne');
    // echo "<script>alert('Unable to Update Form!');window.location.href='./homepage.php?msg=n';</script>";
}
mysqli_close($conn);
?>
