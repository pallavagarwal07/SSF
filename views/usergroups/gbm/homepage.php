<?php
include '../../../controllers/redirect.php';
if($_SESSION["username"]=="chair_ss" || $_SESSION["username"]=="presidentsg" || $_SESSION["username"]=="culsecy" || $_SESSION["username"]=="fmcsecy" || $_SESSION["username"]=="sportsecy" || $_SESSION["username"]=="finance" || $_SESSION["username"]=="sntsecy") {
    echo "<script>
        alert('You do not have access rights!');
    window.location.href='../../../controllers/logout.php';
</script>";
}
?>
<?php
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
?>
<!DOCTYPE html>
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
        <link rel="stylesheet" href="../../../css/homepage.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <?php 
                include 'nav.php';
            ?>
            <div style="display:<?php  echo $_GET['msg']=='s'?'':'none'; ?>" class="alert alert-success" role="alert">
                Successfully Pledged Money.
            </div>
            <div style="display:<?php  echo $_GET['msg']=='n'?'':'none'; ?>" class="alert alert-danger" role="alert">
                Couldn't Pledge Money because you don't have sufficient funds.
            </div>
            <div style="display:<?php  echo $_GET['msg']=='se'?'':'none'; ?>" class="alert alert-success" role="alert">
                Successfully Updated Form.
            </div>
            <div style="display:<?php  echo $_GET['msg']=='ne'?'':'none'; ?>" class="alert alert-danger" role="alert">
                Couldn't Update Form.
            </div>
            <div style="display:<?php  echo $_GET['msg']=='sv'?'':'none'; ?>" class="alert alert-success" role="alert">
                Successfully Saved Form.
            </div>
            <div style="display:<?php  echo $_GET['msg']=='nv'?'':'none'; ?>" class="alert alert-danger" role="alert">
                Couldn't Save Form.
            </div>
            <div style="display:<?php  echo $_GET['msg']=='sb'?'':'none'; ?>" class="alert alert-success" role="alert">
                Successfully Submitted Form.
            </div>
            <div style="display:<?php  echo $_GET['msg']=='nb'?'':'none'; ?>" class="alert alert-danger" role="alert">
                Couldn't Submit Form.
            </div>
        <h1 style = "font-size: 60px; margin-top: 8% ;text-align: center" > Hi
<?php
echo $_SESSION["username"];
?>
        </h1> 
        </div>
    </body>
</html>
