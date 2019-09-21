<?php
	session_start();
	include "class.php";
	if(isset($_POST['view_class_marks']) && isset($_POST['view_class_marks_button']))
	{
		$obj->view();
	}
	else
	{
		$obj->view();
	}
?>