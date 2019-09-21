<?php
	session_start();
	include "class.php"
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD_SYLLABUS</title>
</head>
<body>
	<div style="text-align: center;">
		<h1><a href="index_teacher.php"><button class = "student_loginb">HOME</button></a>Teacher<a href="logout.php"><button class="logout_button">LOGOUT</button></a></h1>
	</div>
	<br/>
	<br/>
	<h2>Changing Syllabus as <?php echo $_SESSION["name"];?></h2>
	<h2>ADD Syllabus of <?php echo $_SESSION['Subject'];?></h3>
	<form action ="add_syllabus.php" method="post" name="add_form" > 
		<input type="text" name="class_teacher" placeholder="CLASS">
		<input type="text" name="syllabus" placeholder="SYLLABUS">
		<input class = "index" type="submit" name="add_button" value = "ADD SYLLABUS">

	</form>
</body>
</html>