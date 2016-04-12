<?php
	$senatorDir='./';
	$insideSenateDir=false;
	if($GLOBALS['dir'] =='senator'){
		$senatorDir='../';
		$insideSenateDir=true;
	}
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
        <div class="navbar-header" style="width:100% ;">
             <ul class="nav navbar-nav navbar-right">
                <li><a class="" href="<?php if($insideSenateDir){echo"../";}?>../../../controllers/logout.php">Logout</a></li>
             </ul>
             <a class="navbar-brand" href="<?php echo $senatorDir; ?>homepage.php">Home</a>
             <ul class="nav navbar-nav navbar-left">
                <li><a class="" href="<?php echo $senatorDir; ?>newForm.php">Create New Form</a></li>
                <li><a class="" href="<?php echo $senatorDir; ?>viewForms.php">View My Forms</a></li>
                <?php
                if($insideSenateDir){
                	echo '<li><a class="" href="./addMoney.php">Add Money to Active Forms</a></li>';
                    echo '<li><a href="../../../viewPosts.php">View all Posts</a></li>';
                echo '<li><a href="../../../viewSenator.php">View all Senators</a></li>';
                }else{
                	if($GLOBALS['isSenator'] == true)
                	echo '<li><a class="" href="./senator/addMoney.php">Add Money to Active Forms</a></li>';
                echo '<li><a href="../../viewPosts.php">View all Posts</a></li>';
                echo '<li><a href="../../viewSenator.php">View all Senators</a></li>';
                }
                ?>
                
             </ul>
        </div>
  </div>
</nav>