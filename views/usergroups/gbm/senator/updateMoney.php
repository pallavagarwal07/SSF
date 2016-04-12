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
$query = sprintf("select * from Senators where Username = '%s'", $_SESSION['username']);
//echo $query;
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) == 0)
{
	echo "<script>
        alert('You do not have access rights!');
    window.location.href='../../../../controllers/logout.php';
</script>";
}
$query6 = sprintf("select UsedMoney, PledgeMoney,TotalMoney from Senators S inner join Funds F on F.Post = S.Post where Username = '%s'", $_SESSION['username']);
$result6 = mysqli_query($conn, $query6);
$row6 = mysqli_fetch_row($result6);
$money = $row6[2] -$row6[1] -$row6[0]-$_POST['money'];
//echo $_POST['money'];
//echo $query6;
//echo $money;
if($money < 0){
	//echo "less";
	header('Location: ../homepage.php?msg=n');
	die();
}

$query2 = sprintf("Insert into PledgedMoney (FormID, SenatorID, MoneyPledged, Date ) values ( %d, '%s', %f, CURDATE())" , $_POST['FormIDD'],$_SESSION['username'] ,$_POST['money'] );
$query3 = sprintf("Update Senators SET PledgeMoney = PledgeMoney + %f WHERE Username = '%s'" ,$_POST['money'], $_SESSION['username']);



if (mysqli_query($conn, $query2) == TRUE && mysqli_query($conn, $query3) == TRUE  ) {
    $query4 = sprintf("Select TargetAmount from Forms where FormID = %d", $_POST['FormIDD']);
$result = mysqli_query($conn, $query4);
$row1 = mysqli_fetch_row($result);
echo $query4;
echo $row1[0];
$query5 = sprintf("select sum(MoneyPledged) from PledgedMoney where FormID = %d", $_POST['FormIDD']);
$result2= mysqli_query($conn, $query5);
$row2 = mysqli_fetch_row($result2);
echo $query5." ";
echo $row2[0];
if($row1[0] <= $row2[0]){
    $query6 = sprintf("Update Forms SET ApprovalState = 4 where FormID = %d", $_POST['FormIDD']);
    $result3 = mysqli_query($conn, $query6);
}
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