<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
   
if(!($_SESSION['admin_username'] && $_SESSION['admin_password'])){
    header("location:../../auth/login/index.php");
}
?>