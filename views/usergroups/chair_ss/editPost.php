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
<body style="background:#ebebe0" class="container">
        <?php
            include 'nav.php';
        ?>
        <div id="body" class="col-lg-8 centered" style="text-align: center;width: 100%;">
            <!--<h1>Senator Seed Fund</h1>-->
            
<?php
include "../../../controllers/redirect.php";
if($_SESSION["username"]!="chair_ss") {
    echo "<script>
        alert('You do not have access rights!');
    window.location.href='../../logout.php';
</script>";
}
// echo $_SESSION['username'];
$servername = "127.0.0.1";
$username = "root";
$password = "l;'";
$dbname = "SSF";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = sprintf("select * from Funds where Post = '%s' ", $_POST["PostIDD"]);
//echo $query;
$result = mysqli_query($conn, $query);
$row=mysqli_fetch_row($result);
echo '<form method="post" class="form-group panel panel-default" style="padding:40px;margin:10px auto;    display: inline-block;width: 675px;text-align: left;">
    <div class="panel-body" style="padding: 0;font-size: 18px;margin-bottom: 17px;">
            Post ID : ' .$_POST["PostID"].'
          </div>
';
echo 'Post:<input type="TEXT" class="form-control" disabled value= "'. $row[0].'" >' ;
echo 'Total Money:<input type="Number" class="form-control" name="TotalMoney" value ="'. $row[1] .'">';
echo '<button type="submit" name="PostID" style="margin-top:10px" class="btn btn-primary" value="'.$_POST['PostIDD'].'" formaction="./updatePost.php">Confirm</button>';
echo '</form></div></html>'; 
?>
