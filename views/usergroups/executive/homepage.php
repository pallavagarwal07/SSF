
<?php include "../../../controllers/redirect.php";
if($_SESSION["username"]!="presidentsg" && $_SESSION["username"]!="culsecy" && $_SESSION["username"]!="fmcsecy" && $_SESSION["username"]!="sportsecy" && $_SESSION["username"]!="sntsecy") {
    echo "<script>
        alert('You do not have access rights!');
    window.location.href='../../../controllers/logout.php';
</script>";
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
        <?php include "./nav.php";?>
         <h1 style = "font-size: 60px; margin-top: 8% ;text-align: center" > Hi
<?php
echo $_SESSION["username"];
?>
        </h1> 
        </div>
    </body>
</html>
