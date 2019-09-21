<?php
	session_start();
	include "class.php";
	if(isset($_SESSION['name']) && isset($_SESSION['password1']))
	{
		//echo "string";
	$Password1 = $_SESSION['password1'];
	$Name = $_SESSION['name'];
	$obj->view();
	}	
?>