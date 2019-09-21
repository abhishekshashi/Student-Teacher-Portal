<?php
	session_start();
	include "class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Teacher Login</title>
</head>
<body>
	<?php
if($_SESSION["name"] && $_SESSION["password1"]) {
?>
	<div>
			<h1><a href="index_teacher.php"><button class = "student_loginb">HOME</button></a>Teacher<a href="logout.php"><button class="logout_button">LOGOUT</button></a></h1>
			</div>
	<main>
	<?php echo " &emsp;<h3> Welcome ".$_SESSION["name"]."</h3>"; ?>
	<?php echo "<h4>Your Subject : ".$_SESSION["Subject"]."</h4>"; ?>

	
	<form action="view_teacher_detail.php" method="post">
		<input type="submit" name= "view_teacher_detail"  value = "VIEW YOUR DETAILS" class="index">
	<br/>
	<br/>
	</form>

	<form action="edit.php" method="post">
	<input type ="submit" name = "edit_teacher" value = "EDIT YOUR DETAILS" class="index">
	<br/>
	<br/>
	</form>

	<a href="Added.php"><button class="index">ADD SYLLABUS</button></a>
	<br/>
	<br/>
	
	<a href="view_teacher.php"><button class="index">VIEW SYLLABUS</button></a>
	<br/>
	<br/>

	<a href="delete_syllabus.php"><button class="index">DELETE SYLLABUS</button></a>
	<br/>
	<br/>

	<form action="add_marks.php" method="post">
	<input type ="submit" name = "add_marks" value = "ADD MARKS" class="index">
	</form>
	<br/>
	
	<form action="teacher_view_marks.php" method="post">
	<input type ="submit" name = "view_marks" value = "VIEW MARKSHEET" class="index">
	</form>
	<br/>
	
	<form action="delete_teacher.php" method="post">
	<input type ="submit" name = "delete_teacher_details" value = "DELETE YOUR ACCOUNT" class="index">
	</form>
	
	<?php	
	?>
	</main>
	<?php
}
else 
{
header("Location:index.php");
}
?>
</body>
</html>