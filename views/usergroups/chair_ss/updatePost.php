<?php
include "../../../controllers/redirect.php";
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
$query = sprintf("Update Funds SET TotalMoney= %f WHERE Post = '%s'", $_POST['TotalMoney'], $_POST['PostID']);
//echo $query;
if (mysqli_query($conn, $query) == TRUE) {
	header('Location: ../../viewPosts.php?msg=s');    
} else {
    
	header('Location: ../../viewPosts.php?msg=n');  
}
mysqli_close($conn);
?>
