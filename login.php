<?php
$ftp_server="webhome.cc.iitk.ac.in";
$username = $_POST["username"];
$password = $_POST["password"];
//set up basic connection
$conn_id = ftp_connect($ftp_server);
// login with username and password
$login_result = ftp_login($conn_id, $username, $password);
ftp_close($conn_id);
if($login_result){
  echo "Yay!";
  }
  else{
    echo "Nay";
    }
    ?>
  }
}
