<?php
$page_title = "INTEGRA";

//include_once 'config/database.php';
//include_once 'objects/pegawai.php';

include_once "../../header.php";

?>
<center>
<h2>Logino</h1> 
</center>
<form role="form" method = "post">

  <div class="form-group">
    <label for="email">NRP:</label>
    <input type="text" class="form-control" id="email" name="username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd"  name="password">
  </div>
  <button type="submit" class="btn btn-default" name="login">Login</button>
</form>

 <?php
 	if($_POST){
	 	include '../../config/database.php';
	 	include_once '../../objects/mahasiswa.php';
	 	

	 	$database = new Database();	
		$db = $database->getConnection();
	 	$user = $_POST['username'];
	 	$password = $_POST['password'];
	 	$pemakai = new Mahasiswa($db);

	 	if($pemakai->login($user,$password)){
	 		if(!isset($_SESSION)) 
   			 { 
  			      session_start(); 
		    }
	 		$_SESSION['admin_username']=$user;
	 		$_SESSION['admin_password']=$password;
	 		
	 		header("location:../../index.php");
	 	}else{
	 		 echo '<div class="alert alert-danger alert-dismissable">';
          		echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
         		  echo 'Username Atau Password Salah.';
      		 echo '</div>';
	 	}
	 } 
	
 	?>
<?
include_once "../../footer.php";
?>