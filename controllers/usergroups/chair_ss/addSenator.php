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
$query = sprintf("insert into Senators (RollNumber,Name, Usermame, Post, UsedMoney, PledgeMoney) values ( %d, '%s', '%s', '%s', %f, %f)", $_POST['roll'], $_POST['name'],  $_POST['username'], $_POST['post'], 0.0, 0.0);
//echo $query;
if (mysqli_query($conn, $query) == TRUE) {
    echo "New Senator created successfully";
        //session_start();
        //$_SESSION["username"] = $_POST['name'];
        //$_SESSION["id"] = session_id();
        // header('Location: ./homepage.html');
} else {
    echo "Error: Senator not added!";
        //header('Location: ./newSenator.html');
}
mysqli_close($conn);
?>
