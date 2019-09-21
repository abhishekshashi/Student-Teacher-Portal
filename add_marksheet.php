<?php
	session_start();
	include "class.php";
	if(isset($_POST['student_name']) && isset($_POST['student_email']) && isset($_POST['student_class']) && isset($_POST['student_subject']) && isset($_POST['student_marks']) && isset($_POST['add_button_marks']))
	{
		$obj->add_marks();
	}

?>