<?php
$servername = "127.0.0.1";
$username = "root";
$password = "l;'";
$dbname="SSF";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = sprintf("insert into Users (Username, Password) values ('%s', '%s')", $_POST['username'], password_hash($_POST['password'], PASSWORD_BCRYPT));
if (mysqli_query($conn, $query) == TRUE) {
    session_start();
    $_SESSION["username"] = $_POST['username'];
    $_SESSION["id"] = session_id();
    echo "<script>alert('Registration successful!');</script>";
    if($_SESSION['username']=='chair_ss'){
        echo "<script>window.location.href='../views/usergroups/chair_ss/homepage.php';</script>";
    }
    else if($_SESSION['username']=='sntsecy' || $_SESSION['username']=='sportsecy' || $_SESSION['username']=='presidentsg' || $_SESSION['username']=='culsecy' || $_SESSION['username']=='fmcsecy'){
        echo "<script>window.location.href='../views/usergroups/executive/homepage.php';</script>";
    }
    else if($_SESSION['username']=='finance'){
        echo "<script>window.location.href='../views/usergroups/finance/homepage.php';</script>";
    }
    else {
        echo "<script>window.location.href='../views/usergroups/gbm/homepage.php';</script>";
    }
} else {
    echo "<script>alert('Error while registering this username. Please change your username!');window.location.href='../index.php';</script>";
}
mysqli_close($conn);
?>
