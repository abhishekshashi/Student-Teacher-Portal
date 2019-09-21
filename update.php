<?php
	session_start();
	include 'class.php';
	$sql = "UPDATE student SET Name ='$_POST[lname]' , Email='$_POST[lemail]' , Class = '$_POST[lclass]' , Age = '$_POST[lage]' , Mobile = '$_POST[lmobile]'  WHERE ID='$_POST[l_id]'";
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<h1><a href="indexed.php"><button class="student_loginb">HOME</button></a>Student
		<a href="logout.php"><button class="logout_button">LOGOUT</button></h1>
		<br/>
		<br/>
		</a>
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
	
	
	
