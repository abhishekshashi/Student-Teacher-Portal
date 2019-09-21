<?php
	session_start();
	include "class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div style="text-align: center;">
		<h1><a href="index_teacher.php"><button class="student_loginb">HOME</button></a>Teacher
		<a href="logout.php"><button class="logout_button">LOGOUT</button></a></h1>
	</div>
	<br/>
	<br/>
	<h2><?php echo $_SESSION["name"];?></h2>
	<h2>Marksheet of  <?php echo $_SESSION['Subject'];?></h2>
	<h4>Enter the class of which you wish to see the marksheet : </h4>
	<form action ="view_marks.php" method="post" name="add_form" > 
		<input type="text" name="view_class_marks" placeholder="CLASS">
		<input class="index" type="submit" name="view_class_marks_button" value = "VIEW MARKSHEET">

	</form>
</body>
</html>