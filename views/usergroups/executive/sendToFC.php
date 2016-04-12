<?php
echo "Abc";
 include "../../../controllers/redirect.php";
 if($_SESSION["username"]!="presidentsg" && $_SESSION["username"]!="culsecy" && $_SESSION["username"]!="fmcsecy" && $_SESSION["username"]!="sportsecy" && $_SESSION["username"]!="sntsecy") {
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
 $query = sprintf("Update Forms SET ApprovalState=6 WHERE FormID = %d" , $_POST['FormID1']);
 echo $query;
if (mysqli_query($conn, $query) == TRUE) {
   header('Location: ./viewForms.php?msg=sFC');
} else {
   header('Location: ./viewForms.php?msg=nFC');
}
mysqli_close($conn);
?>
