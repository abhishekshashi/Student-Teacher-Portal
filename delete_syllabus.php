<?php
	session_start();
	include "class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>delete_syllBUS</title>
</head>
<body>

	<div style="text-align: center;">
		<h1><a href="index_teacher.php"><button class="student_loginb">HOME</button></a>Teacher
		<a href="logout.php"><button class="logout_button">LOGOUT</button></a></h1>
	</div>
	<br/>
	<br/>
		<h2> Name : <?php echo $_SESSION["name"];?></h2> 
		<h2> Subject : <?php echo $_SESSION["Subject"];?></h2> 
	<h4>Delete Syllabus of the  Classes  </h4>
	<form action ="deleted.php" method="post"> 
		<input type="text" name="delete_class" placeholder ="Enter class">
		
		<input type="text" name="delete_sylabus" placeholder ="Enter Topic">
		<br/>
		<input type="submit" name="delete_submit" value = "DELETE" class="index">
		<br/>
		

	</form>
</body>
</html>