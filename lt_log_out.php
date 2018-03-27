<?php 
session_start(); 

if(isset($_SESSION['user'])) {
	unset($_SESSION['user']);
	$_SESSION['log'] = false;
	echo "<script type='text/javascript'> window.location.href = 'lt_home.php';</script>";
}
?>