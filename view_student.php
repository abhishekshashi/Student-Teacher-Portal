<?php
	session_start();
	include "class.php"
?>
<!DOCTYPE html>
<html>
<head>
	<title>view</title>
</head>
<body>
		<div style="text-align: center;">
		<h1><a href="indexed.php"><button class="student_loginb">HOME</button></a>Student
					<a href="logout.php"><button class="logout_button">LOGOUT</button></a></h1>
		<br/>
		<br/>
	</div>
		<h2> Name : <?php echo $_SESSION["name"];?></h2> 
		<h2> Class : <?php echo $_SESSION["class"];?></h2> 
	<h4>Search Syllabus of the  Subject </h4>
	<form action ="viewed_student.php" method="post"> 
		<input type="text" name="search_student" placeholder ="Enter Subject">
		<br/>
		<input type="submit" name="search_student_submit" value = "SEARCH" class="index">
		<br/>
		

	</form>
</body>
</html>