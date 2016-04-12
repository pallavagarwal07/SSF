<?php
include "../../../controllers/redirect.php";
$servername = "127.0.0.1";
$username = "root";
$password = "l;'";
$dbname="SSF";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = sprintf("Update Forms SET Name  = '%s', RollNumber= %d, Email= '%s', Phone='%s', Event= '%s', ExpiryDate = CAST('%s' AS DATE), TargetAmount = %f, Remark='%s', ApprovalState=%d WHERE FormID = %d", $_POST['name'], $_POST['roll'], $_POST['email'], $_POST['phone'], $_POST['event'], $_POST['expiry'], $_POST['amount'], $_POST['remark'], $_POST['state'], $_POST['FormID']);
if($_POST['state']==7){
	$query2= sprintf("Select FormID, SenatorID, MoneyPledged from PledgedMoney where FormID = ", $_POST['FormID']);
	$result2 = mysqli_query($conn, $query);
	while($row=mysqli_fetch_row($result2)){
		$query3 = sprintf("Insert into UsedMoney (FormID, SenatorID, UsedMoney, Date) values (%d, %s, %f, CURDATE())", $row[0],$row[1],$row[2]);
		$query4 = sprint("Delete from PledgedMoney where FormID = %d and SenatorID = '%s'", $row[0], $row[1] );
		$query4 = sprintf("Update Senators SET PledgeMoney = PledgeMoney-%f , UsedMoney = UsedMoney + %f", $row[2], $row[2]);
		$result3 =mysqli_query($conn, $query3);
		$result4 = mysqli_query($conn, $query4);

	}

}
// echo $query;
if (mysqli_query($conn, $query) == TRUE) {
    echo "<script>alert('Form Updated by Executive');window.location.href='./viewForms.php';</script>";
} else {
    echo "<script>alert('Executive Unable to Update Form!');window.location.href='./viewForms.php';</script>";
}
mysqli_close($conn);
?>
