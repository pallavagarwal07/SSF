<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Kunal Kapila & Sanjari Srivastava">
<title>
SSF
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="css/homepage.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
  <div class="container-fluid">
        <div class="navbar-header" style="width:100%">
             <ul class="nav navbar-nav navbar-right">
                <li><a class="" href="../../../controllers/logout.php">Logout</a></li>
             </ul>
             <a class="navbar-brand" href="../../">Home</a>
             <ul class="nav navbar-nav navbar-left">
                <li><a href="./viewPosts.php">View all Posts</a></li>
                <li><a href="./viewSenator.php">View all Senators</a></li>
             </ul>
        </div>
  </div>
</nav>
<?php
include "../controllers/redirect.php";
$servername = "127.0.0.1";
$username = "root";
$password = "l;'";
$dbname = "SSF";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "select Name, Username, RollNumber as 'Roll Number', Senators.Post, Funds.TotalMoney-UsedMoney-PledgeMoney as 'Available Money', UsedMoney as 'Used Money', PledgeMoney as 'Money already Pledged' from Senators inner join Funds on Funds.Post=Senators.Post";
$result = mysqli_query($conn, $query);
echo "<table class='table table-striped panel panel-default' width='100%'>";
echo "<thead>";
while($field=mysqli_fetch_field($result))
{
        echo "<td class='heading'><b>";
        echo $field->name;
        echo "</b></td>";
}
echo "<td class='heading'><b>";
echo "Edit";
echo "</b></td>";
echo "<td class='heading'><b>";
echo "Delete";
echo "</b></td>";
echo "</thead>";
echo "<tbody>";
while ($row=mysqli_fetch_row($result))
{
    echo "<tr>";
    for($i=0; $i < mysqli_num_fields($result); $i++) {
        echo "<td>";
        echo $row[$i];
        echo "</td>";
    }
    echo "<td>";
    echo '<form method="post" class="form-group">';
        echo '<button type="submit" value="' . $row[1] . '" name="Username" class="btn btn-default" formaction="./usergroups/chair_ss/editSenator.php">Edit</button>';
    echo "</form>";
    echo "</td>";
    echo "<td>";
    echo '<form method="post" class="form-group">';
    echo '<button type="submit" value="' . $row[1] . '" name="Username" class="btn btn-default" formaction="../controllers/usergroups/chair_ss/deleteSenator.php">Delete</button>';
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