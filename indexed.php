<?php
	session_start();
	include "class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>	
</head>
<body>
	<?php

if($_SESSION["name"] && $_SESSION["password1"]) {	
?>
		<div>
			<h1><a href="indexed.php"><button class = "student_loginb">HOME</button></a>Student<a href="logout.php"><button class="logout_button">LOGOUT</button></a></h1>
			
		</a>
		</div>
		
	</header>
	<main style="text-align: center;">
	<?php
	if(isset($_SESSION["student"]))
	{
	?>

	 <?php echo "<h3>Welcome ".$_SESSION["name"]."</h3>"; ?>
			 <?php echo "<h4>Your Class : ".$_SESSION["class"]."</h4>"; ?>

		<form action="view_student_details.php" method = "post">
			<input type="submit" name= "view_student" value="VIEW YOUR DETAILS" class = "index">
		<br/>
		<br/>
		</form>
		<form action="edit.php" method = "post">
			<input type="submit" name= "edit_student" value="EDIT YOUR DETAILS" class = "index">
		</form>
	<br/>
	
	<a href="view_student.php"><button class="index">VIEW YOUR SYLLABUS</button></a>
	<br/>
	<br/>

		<form action="view_marks.php" method = "post">
			<input type="submit" name= "view_student_marks" value="VIEW YOUR MARKS" class = "index">
		<br/>
		<br/>
		</form>

		<form action="delete_student.php" method = "post"><input type="submit" name= "delete_student" value="DELETE YOUR ACCOUNT" class = "index">
		</form>
	<br/>
	<br/>
	<?php
	}	
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