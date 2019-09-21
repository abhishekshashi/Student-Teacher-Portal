<?php
	session_start();
	include "class.php";
	$_SESSION['delete_class'] = $_POST['delete_class'];
	$_SESSION['delete_sylabus'] = $_POST['delete_sylabus'];
	$obj->delete();
?>