<?php
	include 'class.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION</title>
	
</head>
<body>
	<h1><a href="index.php"><button class="student_loginb">HOME</button></a>KENDRIYA VIDYALAYA SANGATHAN</h1>
		<h1>Welcome to Student-Teacher Portal</h1>	
		<main>
			
			<div class = "container_register"align="center">
			<div class = "register">
				<h3>REGISTER HERE AS TEACHER</h2>
				<form action = "reg_submit_teacher.php" method = "post" name = "myForm" class="form" onsubmit="return match(this) || ValidateEmail()">
						<br/>
					<input class="email_id" type="text" name="name"
					placeholder="Full-Name">
					<br/>
					<input class="email_id" type="text" name="email" placeholder="Email">
					<br/>
					<input class="email_id" type="text" name="subject" placeholder="Subject taught by you">
						<br/> 
					<input class="email_id" type="text" name="age" placeholder="Age">
					<br/>
					<input class="email_id" type="text" name="phone_no" placeholder="phone no.">
					<br/>
					<input class="email_id" type="password" name="password1" id = "typepass"placeholder="password" >
						<br/> 
					<input class="toggle" type="checkbox" onclick="
					Toggle()"><b class="show_password" style=" font-weight: bolder; color: white">Show Password</b>
					<br/>

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
					</script>
					<input class="email_id" type="password" name="password2" placeholder="confirm password" id = "repassword">
						<br/>
					<br/>
					<script type="text/javascript">
						function match(form)
						{	
							name = form.name.value;
							email = form.email.value;
							password1 = form.password1.value;
							password2 = form.password2.value;
							mobile = form.mobile.value;

							if(name ==='')
								alert("enter your name");
							else if(email ==='')
								alert("enter your email id");
							else if(password1 === '')
								alert("please enter password");
							else if(password2 === '')
								alert("please confirm password");
							else if (password1 != password2) {
								alert("password did not match");
								return false;
							}
							else if (mobile === '')
							{
								alert("Enter your Mobile no");
							}
							else if (mobile.length !=10) 
							{
								alert("enter valid mobile no.");
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

					

					<input type="submit" name="register" value = "REGISTER" class="loginbtn">
				</form>
				<h3>Already have a account ? <b> <a href="teacher_log.php">Login</a> </b> </h3>
			</div>
			</div>
		</main>
		
</body>
</html>