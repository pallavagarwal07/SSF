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
$query = sprintf("insert into Forms (Name, Username, RollNumber, Email, Phone, Event, Council, CreationDate, ExpiryDate, TargetAmount, ApprovalState, Remark) values ('%s', '%s', %d, '%s', '%s', '%s', '%s', CURDATE(), CAST('%s' AS DATE), %f, %d, '%s')", $_POST['name'], $_SESSION["username"], $_POST['roll'], $_POST['email'], $_POST['phone'], $_POST['event'], $_POST['council'], $_POST['expiry'], $_POST['amount'], 1, NULL);
echo $query;
if (mysqli_query($conn, $query) == TRUE) {
    header('Location: ./homepage.php?msg=sb');
} else {
//     echo "<script>
//         alert('Unable to submit Form. Please Check!');
//     window.location.href='../../../views/usergroups/gbm/newForm.php';
// </script>";

    header('Location: ./homepage.php?msg=nb');
}
mysqli_close($conn);
?>
