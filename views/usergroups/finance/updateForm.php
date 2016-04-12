<?php
include "../../../controllers/redirect.php";
if($_SESSION["username"]!="finance") {
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
$query = sprintf("Update Forms SET Name  = '%s', RollNumber= %d, Email= '%s', Phone='%s', Event= '%s', ExpiryDate = CAST('%s' AS DATE),  Remark='%s', ApprovalState=%d WHERE FormID = %d", $_POST['name'], $_POST['roll'], $_POST['email'], $_POST['phone'], $_POST['event'], $_POST['expiry'], $_POST['remark'], $_POST['state'], $_POST['FormID']);
echo $query;
if($_POST['state']==7){
	$query2= sprintf("Select FormID, SenatorID, MoneyPledged from PledgedMoney where FormID = %d", $_POST['FormID']);
	$result2 = mysqli_query($conn, $query2);
	//echo $query2." ";
	while($row=mysqli_fetch_row($result2)){
		$query3 = sprintf("Insert into UsedMoney (FormID, SenatorID, MoneyUsed, Date) values (%d, '%s', %f, CURDATE())", $row[0],$row[1],$row[2]);
		$query4 = sprintf("Delete from PledgedMoney where FormID = %d and SenatorID = '%s'", $row[0], $row[1] );
		$query5 = sprintf("Update Senators SET PledgeMoney = PledgeMoney-%f , UsedMoney = UsedMoney + %f where Username='%s'", $row[2], $row[2], $row[1]);
		echo $query3." ";
echo $query4." ";
echo $query5." ";
		$result3 =mysqli_query($conn, $query3);
		$result4 = mysqli_query($conn, $query4);
		$result5 = mysqli_query($conn, $query5);

	}
}
if($_POST['state']==10){
	$query2= sprintf("Select FormID, SenatorID, MoneyPledged from PledgedMoney where FormID = %d", $_POST['FormID']);
	$result2 = mysqli_query($conn, $query2);
	echo $query2;
	while($row=mysqli_fetch_row($result2)){
		// $query3 = sprintf("Insert into UsedMoney (FormID, SenatorID, MoneyUsed, Date) values (%d, '%s', %f, CURDATE())", $row[0],$row[1],$row[2]);
		$query4 = sprintf("Delete from PledgedMoney where FormID = %d and SenatorID = '%s'", $row[0], $row[1] );
		$query5 = sprintf("Update Senators SET PledgeMoney = PledgeMoney-%f  where Username='%s'", $row[2], $row[1]);
echo $query3;

		// $result3 =mysqli_query($conn, $query3);
		$result4 = mysqli_query($conn, $query4);
		$result5 = mysqli_query($conn, $query5);

	}

}
// echo $query;
if (mysqli_query($conn, $query) == TRUE) {
    // echo "<script>alert('Form Updated by Executive');window.location.href='./viewForms.php';</script>";
    header('Location: ./viewForms.php?msg=s');
} else {
    // echo "<script>alert('Executive Unable to Update Form!');window.location.href='./viewForms.php';</script>";
	header('Location: ./viewForms.php?msg=n');
}
mysqli_close($conn);
?>
