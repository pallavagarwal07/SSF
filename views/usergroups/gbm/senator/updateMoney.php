<?php
include "../../../../controllers/redirect.php";
$servername = "127.0.0.1";
$username = "root";
$password = "l;'";
$dbname = "SSF";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query2 = sprintf("Insert into PledgedMoney (FormID, SenatorID, MoneyPledged, Date ) values ( %d, '%s', %f, CURDATE())" , $_POST['FormIDD'],$_SESSION['username'] ,$_POST['money'] );
$query3 = sprintf("Update Senators SET PledgeMoney = PledgeMoney + %f WHERE Username = '%s'" ,$_POST['money'], $_SESSION['username']);

$query4 = sprintf("Select TargetAmount from Forms where FormID = %d", $_POST['FormIDD']);
$result = mysqli_query($conn, $query4);
$row1 = mysqli_fetch_row($result);

$query5 = sprintf("select sum(MoneyPledged) from PledgeMoney where FormID = %d", $_POST['FormIDD']);
$result2= mysqli_query($conn, $query5);
$row2 = mysqli_fetch_row($result2);
if($row1[0] <= $row2){
    $query6 = sprintf("Update Forms SET ApprovalState = 4 where FormID = %d", $_POST['FormIDD']);
    $result3 = mysqli_query($conn, $query6);
}
if (mysqli_query($conn, $query2) == TRUE && mysqli_query($conn, $query3) == TRUE  ) {
    
    // echo $query2 ;

        //session_start();
        //$_SESSION["username"] = $_POST['name'];
        //$_SESSION["id"] = session_id();
        header('Location: ./../homepage.php?msg=s');
} else {
    
        header('Location: ./../homepage.php?msg=n');
}
mysqli_close($conn);

?>