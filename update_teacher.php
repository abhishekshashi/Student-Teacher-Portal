<?php
	session_start();
	include 'class.php';
	$sql = "UPDATE teacher SET Name ='$_POST[lname]' , Email='$_POST[lemail]' , Subject = '$_POST[lsubject]' , Age = '$_POST[lage]' , Mobile = '$_POST[lmobile]'  WHERE T_ID='$_POST[l_id]'";

?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<h1><a href="index_teacher.php"><button class="student_loginb">HOME</button></a>Teacher
		<a href="logout.php"><button class="logout_button">LOGOUT</button></a></h1>
		<br/>
		<br/>
	</body>
	</html>
		<?php
		$result = mysqli_query($obj->run,$sql);
		if(!$result)
	{
		echo "update failed";
		
		//header("refresh:4;url=index.php");
	}
	else {
		echo "Updated Succcesfully";	# code...
	}
	?>
	
	
	
