<?php
echo "register";
$servername = "127.0.0.1";
$username = "root";
$password = "l;'";
$dbname="SSF";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "established";

$query = sprintf("insert into Users (username, password) values ('%s', '%s')", $_POST['username'], password_hash($_POST['password'], PASSWORD_BCRYPT));
echo $query;
if (mysqli_query($conn, $query) == TRUE) {
    echo "New record created successfully";
        session_start();
        $_SESSION["username"] = $_POST['name'];
        $_SESSION["id"] = session_id();
        //header('Location: ./homepage.html');
} else {
    echo "Error: Username already exists!";
        header('Location: ./index.html');
}
mysqli_close($conn);
?>
