<?php
include "./redirect.php";
$servername = "127.0.0.1";
$username = "root";
$password = "l;'";
$dbname="SSF";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = sprintf("insert into Funds Values ('%s', %f)", $_POST["name"], $_POST["funds"]);
if (mysqli_query($conn, $query) == TRUE) {
    echo "<script>
        alert('Post Inserted');
    window.location.href='addPost.php';
</script>";
} else {
    echo "<script>
        alert('Unable to insert Post. Please Check!');
    window.location.href='addPost.php';
</script>";
}
mysqli_close($conn);
?>

