<?php
session_start();
$valid_session = isset($_SESSION['id']) ? $_SESSION['id'] === session_id() : FALSE;
if($valid_session){
    if($_SESSION['username']=='chair_ss'){
        echo "<script>window.location.href='../views/usergroups/chair_ss/homepage.php';</script>";
    }
    else if($_SESSION['username']=='sntsecy' || $_SESSION['username']=='sportsecy' || $_SESSION['username']=='presidentsg' || $_SESSION['username']=='culsecy' || $_SESSION['username']=='fmcsecy'){
        echo "<script>window.location.href='../views/usergroups/executive/homepage.php';</script>";
    }
    else if($_SESSION['username']=='finance'){
        echo "<script>window.location.href='../views/usergroups/finance/homepage.php';</script>";
    }
    else {
        echo "<script>window.location.href='../views/usergroups/gbm/homepage.php';</script>";
    }
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
        Senator Seed Fund
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/homepage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div id="container" class="col-lg-8">
        <h1>Senator Seed Fund</h1>
        <form method="post" class="form-group">
            Username: <input type="text" name="username" class="form-control" placeholder="Username">
            Password: <input type="PASSWORD" name="password" class="form-control" placeholder="Password">
            <button type="submit" class="btn btn-primary" formaction="./controllers/login.php">Login</button>
            <button type="submit" class="btn btn-default" formaction="./controllers/register.php">Register</button>
        </form>
    </div>
</body>
</html>
