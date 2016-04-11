<?php
include '../../../controllers/redirect.php';
if($_SESSION["username"]!="chair_ss") {
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
        Hi
<?php
echo $_SESSION["username"];
?>

        <form method="post" class="form-group">
            <button type="submit" class="btn btn-default" formaction="../../../controllers/logout.php">Logout</button>
        </form>
        <div class="container-fluid">
            <div id="main" class="col-lg-8">
                <form method="post" class="form-group">

                    Name:<input type="TEXT" class="form-control" name="name" placeholder="Enter the Post">
                    Funds:<input type="Number" step="any" class="form-control" name="funds" placeholder="Enter the funds for this post">
                    <button type="submit" class="btn btn-default" formaction="../../../controllers/usergroups/chair_ss/addPost.php">Add Post</button>
                </form>
            </div>
        </div>
    </body>
</html>
