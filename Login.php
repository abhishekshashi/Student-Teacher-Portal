<?php
	session_start();
	if(isset($_SESSION["password1"]))
	{
		header("Location:indexed.php");		
	}
	if(isset($_SESSION["sql"]))
	{
	echo $_SESSION['message'];
	$_SESSION['message'] = '';		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1><a href="index.php"><button class = "student_loginb">HOME</button></a>KENDRIYA VIDYALAYA SANGATHAN</h1>
		<h1>Welcome to Student-Teacher Portal</h1>
		
		<main>
			<div class = "container" align="center">
			<div class = "login" align="center">
				<h3>LOGIN AS STUDENT</h3>
				<form action = "login_submit.php" method = "post" name = "myForm" onsubmit="return ValidateEmail() || passwordvalid(this)">
					<br/>
					<input type="text" name="email" placeholder="email" class="email_id">
					<br/>
					<input type="password" name="password1" id = "typepass"placeholder="password" class = "email_id" >
						<br/> 
					<input class="toggle_login" type="checkbox" onclick="
					return Toggle()"><b class="show_password_login" style="color: white">Show Password</b>
					<br/>
					<input class =  "loginbtn" type="submit" name="submit_student" value = "LOGIN">

					<script type="text/javascript" >
						function Toggle()
						{
							var temp = document.getElementById("typepass");
							if(temp.type === "password")
							{
								temp.type = "text";
							}
							else
							{
								temp.type = "password";
							}
						}
						function passwordvalid(form)
						{
							var password1 = document.forms["myForm"]["password1"].value;
							if(password1 ==='')
							{
								alert("Please enter your password");
							}

						}
						
					</script>
					<script type="text/javascript">
						function ValidateEmail() 
						{
							var x = document.forms["myForm"]["email"].value;
  var atpos = x.indexOf("@");
  var dotpos = x.lastIndexOf(".");
  if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
    alert("Not a valid e-mail address");
    return false;
  }
						}
    					
					</script>

					
				</form>
				<h5 style="color: white; font-size: 18px;">No account then ? <a href="Register.php" style="color: cyan">Register</a></h5>
			</div>
		</div>
			
		</main>
		<body></body>
</body>
</html>