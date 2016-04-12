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
$GLOBALS['isSenator'] = false;
if(mysqli_num_rows($result) > 0)
{
    $GLOBALS['isSenator'] = true;
}
$GLOBALS['dir']='senator';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Kunal Kapila & Sanjari Srivastava">
        <title>
            Edit Form
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/homepage.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body class="container">
        <?php
        include '../nav.php';
        ?>
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
$query3 = sprintf("select RollNumber, Name, Username, PledgeMoney, UsedMoney, Funds.TotalMoney from Senators inner join Funds on Funds.Post=Senators.Post where Username = '%s'", $_SESSION['username']);
// echo $query3;
$result3 = mysqli_query($conn, $query3);
$row3=mysqli_fetch_row($result3);

$money = $row3[5]-$row3[4]-$row[3];

$query = sprintf("select FormID as 'Form ID', Event, CreationDate as 'Date of Creation', ExpiryDate as 'Date of Expiry', TargetAmount as 'Target Amount (in Rs.)', S.State as 'Status', Remark as 'Remarks', ApprovalState as 'StatusID' from Forms inner join  StatesOfApproval S ON S.ID = Forms.ApprovalState where ApprovalState = 3");
// echo $query;
// echo $query2;
$result = mysqli_query($conn, $query);
echo "<table class='table panel panel-default table-striped' width='100%' style='margin-top:55px;'>";
echo "<thead>";
while($field=mysqli_fetch_field($result))
{
    if($field->name!="StatusID"){
        echo "<td class='heading'><b>";
        echo $field->name;
        echo "</b></td>";
    }
}
echo "<td class='heading'><b>";
echo "Pledge Details";
echo "</b></td>";
echo "<td class='heading'><b>";
echo "Pledge Money";
echo "</b></td>";
echo "</thead>";
echo "<tbody>";
while ($row=mysqli_fetch_row($result))
{
    echo "<tr>";
    for($i=0; $i < mysqli_num_fields($result)-1; $i++) {
        echo "<td>";
        echo $row[$i];
        echo "</td>";
    }

	$query2 = sprintf("select MoneyPledged from PledgedMoney where FormID = %d and SenatorID = '%s'", $row[0], $_SESSION['username']);
	$result2 = mysqli_query($conn, $query2);
	// echo $query2;
	$row2 = mysqli_fetch_row($result2);
    echo "<td>";
    echo '<form method="post" class="form-group">';
        echo '<button type="submit" value="' . $row[0] . '" name="FormID" class="btn btn-primary" formaction="./pledgeDetails.php">Pledge Details</button>';
        echo '</td>';
        echo '<td>';
        echo '<input type = "number" name = "money" value = ' . $row2[0] . ' max = '.$money.'>';
        if($row2[0]==0)
            echo '<button type="submit" value="' . $row[0] . '" name="FormIDD" style= "margin-top : 5px" class="btn btn-default" formaction="./updateMoney.php">Confirm</button>';
        else 
            echo '<button type="submit" value="' . $row[0] . '" name="FormIDD" style= "margin-top : 5px" class="btn btn-default" disabled>Already Pledged</button>';
    echo "</form>";
    echo "</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo '</div>
    </body>
    </html>';

?>