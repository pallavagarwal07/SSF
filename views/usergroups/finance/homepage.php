<?php
header('Location: ./viewForms.php');
die();
include '../../../controllers/redirect.php';
if($_SESSION["username"]!="finance") {
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
        <div class="container-fluid">
        <?php
            include 'nav.php';
        ?>
        Hi
<?php
echo $_SESSION["username"];
?>
        <form method="post" class="form-group">
            <button type="submit" class="btn btn-default" formaction="../../../controllers/logout.php">Logout</button>
            <button type="submit" class="btn btn-default" formaction="./viewForms.php">View Forms</button>
        </form>
        </div>
    </body>
</html>
