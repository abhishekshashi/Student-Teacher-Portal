<?php
	session_start();
	include "class.php";
	$Submit_Student = isset($_POST["submit_student"]);
	$Submit_Teacher = isset($_POST["submit_teacher"]);
	if(isset($_POST["email"]) && isset($_POST["password1"]))
	{
	
	$obj->login_User($Submit_Student,$Submit_Teacher);
	}
	
	
?>