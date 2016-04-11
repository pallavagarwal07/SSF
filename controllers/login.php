<?php
$servername = "localhost";
$username = "root";
$password = "l;'";
$dbname="SSF";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$query = sprintf("select Password from Users where Username = '%s'", $_POST[username]);
$result = mysqli_query($conn, $query) or die("Selection Query Failed!");
if(mysqli_num_rows($result)==0) {
    echo "<script>alert('Username does not exist in database!');window.location.href='../index.php';</script>";
} else {
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    if (password_verify($_POST['password'], $row['Password'])) {
        $_POST['password']="";
        session_start();
        $_SESSION["username"] = $_POST['username'];
        $_SESSION["id"] = session_id();
        echo "<script>alert('Login successful!');</script>";
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
        echo "<script>alert('Username and password do not match!');window.location.href='../index.php';</script>";
    }
}
mysqli_close($conn);
?>
