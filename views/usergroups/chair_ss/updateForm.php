<?php
include "../../../controllers/redirect.php";
if($_SESSION["username"]!="chair_ss") {
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
$query = sprintf("Update Forms SET Name  = '%s', RollNumber= %d, Email= '%s', Phone='%s', Event= '%s', ExpiryDate = CAST('%s' AS DATE), TargetAmount = %f, Remark='%s', ApprovalState=%d WHERE FormID = %d", $_POST['name'], $_POST['roll'], $_POST['email'], $_POST['phone'], $_POST['event'], $_POST['expiry'], $_POST['amount'], $_POST['remark'], $_POST['state'], $_POST['FormID']);
echo $query;
if (mysqli_query($conn, $query) == TRUE) {
	header('Location: ./viewForms.php?msg=s');    
} else {
    
	header('Location: ./viewForms.php?msg=n');  
}
mysqli_close($conn);
?>
