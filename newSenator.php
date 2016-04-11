<?php

echo '<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Kunal Kapila & Sanjari Srivastava">
        <title>
            Add Senator
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/homepage.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <!--<body>-->
        <div id="body" class="col-lg-8">
            <!--<h1>Senator Seed Fund</h1>-->
            <form method="post" class="form-group">

                Name:<input type="TEXT" class="form-control" name="name" placeholder="Enter Senator\'s name">
                Roll Number:<input type="Number" class="form-control" name="roll" placeholder="Enter Senator\'s roll number">
                Username:<input type="TEXT" class="form-control" name="email" placeholder="Enter Senator\'s username">
                Post:';

include "./redirect.php";
$servername = "127.0.0.1";
$username = "root";
$password = "l;'";
$dbname = "SSF";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = sprintf("select Post from Funds");

$result = mysqli_query($conn, $query);

echo '<select class="form-control" name="post">';
while ($row=mysqli_fetch_row($result)){

   echo '<option value="'.$row[0].'">'.$row[0].'</option>';

}

echo '</select>';

echo '<button type="submit" class="btn btn-default" formaction="addSenator.php">Add Senator</button>
</form>
</div>
<!--</body>-->
</html> ' ;

?>
