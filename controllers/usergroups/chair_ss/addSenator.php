<?php
include "../../redirect.php";
if($_SESSION["username"]!="chair_ss") {
    echo "<script>
        alert('You do not have access rights!');
    window.location.href='../../logout.php';
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
$query = sprintf("insert into Senators (RollNumber, Name, Username, Post, UsedMoney, PledgeMoney) values ( %d, '%s', '%s', '%s', %f, %f)", $_POST['roll'], $_POST['name'],  $_POST['username'], $_POST['post'], 0.0, 0.0);
echo $query;
if (mysqli_query($conn, $query) == TRUE) {
    echo "<script>
        alert('Senator Added');
    window.location.href='../../../views/usergroups/chair_ss/newSenator.php';
</script>";
} else {
    echo "<script>
        alert('Unable to add Senator. Please Check!');
    window.location.href='../../../views/usergroups/chair_ss/newSenator.php';
</script>";
}
mysqli_close($conn);
?>
