<?php
include "../../redirect.php";
$servername = "127.0.0.1";
$username = "root";
$password = "l;'";
$dbname="SSF";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = sprintf("insert into Forms (Name, Username, RollNumber, Email, Phone, Event, Council, CreationDate, ExpiryDate, TargetAmount, ApprovalState, Remark) values ('%s', '%s', %d, '%s', '%s', '%s', '%s', CURDATE(), CAST('%s' AS DATE), %f, %d, '%s')", $_POST['name'], $_SESSION["username"], $_POST['roll'], $_POST['email'], $_POST['phone'], $_POST['event'], $_POST['council'], $_POST['expiry'], $_POST['amount'], 1, NULL);
echo $query;
if (mysqli_query($conn, $query) == TRUE) {
    echo "<script>
        alert('Form Submitted');
    window.location.href='../../../views/usergroups/gbm/newForm.php';
</script>";
} else {
    echo "<script>
        alert('Unable to submit Form. Please Check!');
    window.location.href='../../../views/usergroups/gbm/newForm.php';
</script>";
}
mysqli_close($conn);
?>
