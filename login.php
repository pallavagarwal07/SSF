<?php
//echo $_POST['username'];
$servername = "localhost";
$username = "root";
$password = "l;'";
$dbname="SSF";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$query = sprintf("select Password from Users where Username = '%s'", $_POST[username]);
//echo $query;
$result = mysqli_query($conn, $query) or die("Selection Query Failed!");
if(mysqli_num_rows($result)==0) {
    echo "Username does not exist in database!";
        //header('Location: ./index.html');
} else {
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    if (password_verify($_POST['password'], $row['Password'])) {
        session_start();
        //echo "login successful";
        $_SESSION["username"] = $_POST['username'];
        $_SESSION["id"] = session_id();
        //echo $_SESSION["username"];
        //header('Location: ./homepage.html');
    } else {
        echo "Username and password do not match";
        //header('Location: ./index.html');
    }
}
?>
