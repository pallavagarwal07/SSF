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
        <link rel="stylesheet" href="css/homepage.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body style="background:#ebebe0">
        <div class="container">
            <?php
                include "../../../controllers/redirect.php";
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
                include 'nav.php';
            ?>
            <div id="main" class="col-lg-12" style="text-align:center">
                <form method="post" class="form-group panel panel-default" style="padding:40px;margin:10px auto;    display: inline-block;width: 675px;text-align: left;">
                    <div class="panel-body" style="padding: 0;font-size: 18px;margin-bottom: 17px;">
                        New Form
                    </div>
                    Name:<input type="TEXT" class="form-control" name="name" placeholder="Enter your name">
                    Roll Number:<input type="Number" class="form-control" name="roll" placeholder="Enter your roll number">
                    Phone Number:<input type="tel" class="form-control" name="phone" placeholder="Enter your number">
                    Email ID:<input type="email" class="form-control" name="email" placeholder="Enter your email">
                    Event Details:<input type="url" class="form-control" name="event" placeholder="Enter link for the event details document">
                    Taget Amount (in Rs.):<input type="number" step="any" class="form-control" name="amount" placeholder="Enter the target amount">
                    Expiry Date:<input type="date" class="form-control" name="expiry" placeholder="Enter date of expiry" data-date-format="mm/dd/yyyy">
                    Council:
                    <select class="form-control" name="council">
                        <option value="culsecy">Cultural Council</option>
                        <option value="sportsecy">Games and Sports Council</option>
                        <option value="presidentsg">Presidential Council</option>
                        <option value="fmcsecy">Films and Media Council</option>
                        <option value="sntsecy">Science and Technology Council</option>
                    </select>
                    <div style="margin-top:25px;">
                        <button type="submit" class="btn btn-default btn-primary" formaction="../../../controllers/usergroups/gbm/saveForm.php">Save</button>
                        <button type="submit" class="btn btn-default" formaction="../../../controllers/usergroups/gbm/submitForm.php">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
