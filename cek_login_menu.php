<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	if(!isset($_SESSION['admin_username']) && !isset($_SESSION['admin_password'])){
		echo "<div class='right-button-margin'>";
   		echo "<a href='auth/login/index.php' class='btn btn-default pull-right'>Login</a>";
		echo "</div>";
	}else{
		echo "<div class='right-button-margin'>";
   		echo "<a href='logout.php' class='btn btn-default pull-right'>Logout</a>";
		echo "</div>";
	}
?>