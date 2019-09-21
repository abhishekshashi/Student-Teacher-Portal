<?php
	session_start();
	include "class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Marksheet</title>
</head>
<body>
	<div style="text-align: center;">
		<h1><a href="index_teacher.php"><button class="student_loginb">HOME</button></a>Teacher
		<a href="logout.php"><button class="logout_button">LOGOUT</button></a></h1>
	</div>
	<br/>
	<br/>
	<h2>ADDING MARKS TO MARKSHEET</h2>
	<h3>ADD MARKS of <?php echo $_SESSION['Subject'];?></h3>
	<form action ="add_marksheet.php" method="post" name="add_form" > 
		<input type="text" name="student_name" placeholder="NAME">
		<br/>
		<input type="text" name="student_email" placeholder="EMAIL"><br/>
		<input type="text" name="student_class" placeholder="CLASS"><br/>
		<input type="text" name="student_subject" placeholder="SUBJECT"><br/>
		<input type="text" name="student_marks" placeholder="MARKS"><br/>
		<input class="index" type="submit" name="add_button_marks" value = "ADD MARKS">

	</form>
</body>
</html>