<!DOCTYPE html>
<html>
<head>
	<title>STUDENT-TEACHER</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	//connection
	class DB_School
	{
		public $servername = "localhost";
		public $username = "root";
		public $password = "";
		public $dbname = "class";
		public $run;
		public function __construct()
		{
			$this->run = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
			if(!$this->run)
			{
				echo "ERROR";
			}
		}

		public function create_User()
		{	//Student Registration ;
			if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['class']) && isset($_POST['age']) && isset($_POST['mobile']) && isset($_POST['password1']) && isset($_POST['password2']))
			{					
				$Name = $_POST['name'];
				$Email = $_POST['email'];
				$Class = $_POST['class'];
				$Age = $_POST['age'];
				$Mobile = $_POST['mobile'];
				$Password1 = $_POST['password1'];
				$Password2 = $_POST['password2'];
				if($Name != "" or $Email != "" or $Class != "" or $Age != "" or $Mobile != "" or $Password1 != "" or $Password2 != "")
				{
					$sql = "INSERT INTO 
					student (Name,Email,Class,Age,Mobile,Password1,Password2)
					VALUES('$Name','$Email','$Class','$Age','$Mobile','$Password1','$Password2')";
					$result = mysqli_query($this->run,$sql);
				
					if(!$result)
					{
						echo "strg";
					}
					else
					{
						echo "You have registered succesfully AS Student";
						echo "<br/>";
						echo "You will be redirected to login page within 4 seconds";
						header("refresh:4;url=login.php");

					}
				}
				else
				{
					echo "Fill all the details";
				}
			}
			// Teacher Registration
			if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['age']) && isset($_POST['phone_no']) && isset($_POST['password1']) && isset($_POST['password2']))
			{
				
				$Name = $_POST['name'];
				$Email = $_POST['email'];
				$Subject = $_POST['subject'];
				$Age = $_POST['age'];
				$Phone_no = $_POST['phone_no'];
				$Password1 = $_POST['password1'];
				$Password2 = $_POST['password2'];
				if($Name != "" or $Email != "" or $Subject != "" or $Age != "" or $Phone_no != "" or $Password1 != "" or $Password2 != "")
				{
					$sql = "INSERT INTO 
					teacher (Name,Email,Subject,Age,Mobile,Password1,Password2)
					VALUES('$Name','$Email','$Subject','$Age','$Phone_no','$Password1','$Password2')";
					$result = mysqli_query($this->run,$sql);
					if(!$result)
					{
						echo "strg";
					}
					else
					{
						echo "You have registered succesfully AS Teacher";
						echo "<br/>";
						echo "You will be redirected to login page within 4 seconds";
						header("refresh:4;url=teacher_log.php");
					}
				}
				else
				{
					echo "Fill all the details";
				}
			}
		}
		//LOGIN		
		public function login_User($Student,$Teacher)
		{	$_SESSION['Email'] = mysqli_real_escape_string($this->run,$_POST['email']);
			$Email = $_SESSION['Email'];
			$Password1 = mysqli_real_escape_string($this->run,$_POST['password1']);	
			$_SESSION["student"] = $Student;
			$_SESSION["teacher"] = $Teacher;
			
			//Login Student
			if($Student)
			{	
				$sql = "SELECT * FROM student WHERE Email = '$Email' && Password1 = '$Password1'";
				$_SESSION["sql"] = $sql;
				$result = mysqli_query($this->run,$sql);
				if(mysqli_num_rows($result)==0)
				//if(!$result)
				{
					$_SESSION["message"] =  "Incorrect Email Or Password";
					header("location:Login.php");
				}
				else
				{
					$row = mysqli_fetch_array($result);
					if(is_array($row))
					{
						$_SESSION["password1"]  = $row["Password1"];
						$_SESSION["name"] = $row["Name"];
						$_SESSION["class"] = $row["Class"];
						
					}
					else
					{
						$message = "Invalid Email Or Password";
					}
				
					if(isset($_SESSION["password1"]))
					{		
						header("Location:indexed.php");
					}
				}
			}
			//Teacher Login
			if($Teacher)
			{	
				$sql = "SELECT * FROM teacher WHERE Email = '$Email' && Password1 = '$Password1'";
				$_SESSION["sql"] = $sql;
				$result = mysqli_query($this->run,$sql);
				if(mysqli_num_rows($result)==0)
				//if(!$result)
				{
					$_SESSION["message"] =  "Incorrect Email Or Password";
					header("location:teacher_log.php");
				}
				else
				{
					$row = mysqli_fetch_array($result);
					if(is_array($row))
					{
						$_SESSION["password1"]  = $row["Password1"];
						$_SESSION['name'] = $row["Name"];
						$_SESSION["Subject"] = $row["Subject"];
					}
					else
					{
						$message = "Invalid Email Or Password";
					}
				
					if(isset($_SESSION["password1"]))
					{		
						echo "LOGGEDIN";
						//$_SESSION["password1"] = $row["Password1"];
						//$_SESSION["name"] = $row["Name"];
						header("Location:index_teacher.php");
					}
				}
			}
		}
		//Logout
		public function logout_user()
		{
				if(!isset($_SESSION['password1']))
				{
					header("Location:index.php");
				}
		}
		// Adding Syllabus
		public function Add_Syllabus()
		{
			?>
			<h1><a href="index_teacher.php"><button class = "student_loginb">HOME</button></a>Teacher
							<a href="logout.php">
							<button class = "logout_button">
							LOGOUT
							</button>
						</a></h1>
			
						<br/>
						<br/>
			<?php
			if(isset($_POST["class_teacher"]) && isset($_POST["syllabus"]))
				{
					$CLASS = $_POST["class_teacher"];
					$SUBJECT = $_SESSION["Subject"];
					$SYLLABUS = $_POST["syllabus"];
					$sql = "INSERT INTO syllabus(Class,Subject,Syllabus)
							values('$CLASS','$SUBJECT','$SYLLABUS')";
					$result = mysqli_query($this->run,$sql);
					if((!$result) && ($CLASS = "") && ($SYLLABUS = ""))
					{
						echo "Syllabus Updation failed";
					}
					else
					{
						echo "<br/>";
						echo "Syllabus Addded Succesfully";
						echo "<br/>";
						echo "<br/>";
						?>
							
							<a href="added.php"><button class = "index">ADD MORE SYLLABUS</button></a>
							<br/>

						<?php
					}
				}	
		}
		public function view()
		{	
			//view_teacher_detail--
			if(isset($_POST["view_teacher_detail"]))
			{	
				?>
					<div>
					<h1><a href="index_teacher.php"><button class="student_loginb">HOME</button></a>Teacher
					<a href="logout.php"><button class="logout_button">LOGOUT</button></a></h1>
					<br/>
					<h3>Your Details</h3>
					</div>
						
					<div>
					<table border="8">
					<thead>
					<tr>
					<th id="th1" width="20%">Name</th>
					<th id="th2" width="20%">Email</th>
					<th id="th3" width="20%">Subject</th>
					<th id="th4" width="20%">Age</th>
					<th id="th5" width="20%">Mobile</th>
					</tr>
					</thead>
					<tbody>
						<?php
				$Password1 = $_SESSION['password1'];
				$Name = $_SESSION['name'];
				
				$sql = "SELECT * FROM teacher WHERE Password1 = '$Password1' && Name = '$Name'";
				$result=mysqli_query($this->run,$sql);
				while ($row = mysqli_fetch_array($result))
				{	echo "<tr>";      
        			echo "<td headers = 'th1'>".$row["Name"]."</td>";
	          		echo "<td headers = 'th2'>".$row["Email"]."</td>";
	           		echo "<td headers = 'th3'>".$row["Subject"]."</td>";
	           		echo "<td headers = 'th4'>".$row["Age"]."</td>";
	         		echo "<td headers = 'th5'>".$row["Mobile"]."</td>";
	         		echo "</tr>";
	        	}
	        	?>
	        	
				</tbody>
				</table>
				</div>
	        	<?php
			}
			//view_student--
			if(isset($_POST["view_student"]))
			{
				?>
					<div>
					<h1><a href="indexed.php"><button class="student_loginb">HOME</button></a>Student
					<a href="logout.php"><button class="logout_button">LOGOUT</button></a></h1>
					
					<br/>
					<h3>Your Details</h3>

					</div>
				<table border="8px">
				<tbody>
				<tr>
				<th id="th1" width="20%">Name</th>
				<th id="th2" width="20%">Email</th>
				<th id="th3" width="20%">Class</th>
				<th id="th4" width="20%">Age</th>
				<th id="th5" width="20%">Mobile</th>
				</tr>

                <tr>
				<?php
				$Password1 = $_SESSION['password1'];
				$Name = $_SESSION['name'];
		
				$sql = "SELECT * FROM student WHERE Password1 = '$Password1' && Name = '$Name'";
				$result=mysqli_query($this->run,$sql);
				while ($row = mysqli_fetch_array($result))
				{	       
        			echo "<td header = th1>".$row["Name"]."</td>";
	          		echo "<td header = th2>".$row["Email"]."</td>";
	           		echo "<td header = th3>".$row["Class"]."</td>";
	           		echo "<td header = th4>".$row["Age"]."</td>";
	         		echo "<td header = th5>".$row["Mobile"]."</td>";
	           	}
				?>
				</tr>
				</tbody>
				</table>
				<?php
			}
				if(isset($_POST['search']) && isset($_POST['search_submit']))
			{	
				$SUBJECT = $_SESSION["Subject"];
				$_SESSION['class_search'] = $_POST['search'];
				$class_search = $_SESSION['class_search'];
				$sql = "SELECT Syllabus FROM syllabus WHERE Class = '$class_search' && Subject = '$SUBJECT'";
				$result = mysqli_query($this->run,$sql);
				$num = mysqli_num_rows($result);

				?>
					<div>
					<h1>
					<a href="index_teacher.php"><button class="student_loginb">HOME</button></a>Teacher
					<a href="logout.php"><button class="logout_button">LOGOUT</button></a>
					</h1>
					
					<br/>
					<br/>
					</div>
					<div>
					<table class = "table_view" border="6px;" >
					<tbody>
					<tr>
					<th>TOPIC</th>
					</tr>
					
					<?php
				
				if(!$result)
				{
					echo "syllabus not available";
				}
				else
				{
					if(mysqli_num_rows($result)==0)
					{
						echo "No Syllabus";
					}
					else
					{	echo "<h4>".$_SESSION["Subject"]."'s Syllabus of class - ".$class_search."</h4>";
						while($row = mysqli_fetch_array($result))
						{
							echo "<tr><td>".$row["Syllabus"]."</td></tr>";
						}
						?>
				
				</tbody>
				</table>
			</div>
				<?php
					}
				}
			}
			if(isset($_POST['search_student']) && isset($_POST['search_student_submit']))
			{
					?>
							<div >
							<h1><a href="indexed.php"><button class="student_loginb">HOME</button></a>Student
							<a href="logout.php"><button class="logout_button">LOGOUT</button></a></h1>
							
								<br/>
								<br/>
							</div>
					
					
					<table  class = "table_view" border="8px;" >
					<tbody>
					<tr>
					<th>Topic</th>
					</tr>
					<?php
				$_SESSION['$SUBJECT'] = $_POST['search_student'];
				$SU = $_SESSION['$SUBJECT'];
				$CLASS = $_SESSION['class'];

				$data = "SELECT Syllabus FROM syllabus WHERE Class = '$CLASS' && Subject = '$SU'";
				$result = mysqli_query($this->run,$data);

				if(!$result)
				{
					echo "syllabus not available";
				}
				else
				{
					if(mysqli_num_rows($result)==0)
					{
						echo "No Syllabus";
					}
					else
					{	echo "<h2>".$SU."'s Syllabus of class - ".$CLASS."</h2>";
						while($row = mysqli_fetch_array($result))
						{
							echo "<tr><td>".$row["Syllabus"]."</td></tr>";
						}
						?>
				</tbody>
				</table>
			
				<?php
					}
				}	
			}
			if(isset($_POST['view_class_marks']) && isset($_POST['view_class_marks_button']))
				{	
					$View_Class_Marks = $_POST['view_class_marks'];
					$Subject = $_SESSION['Subject'];
					
					$sql = "SELECT Name,Class,Subject ,Marks from marksheet WHERE Class = '$View_Class_Marks' and Subject = '$Subject'";
					$result = mysqli_query($this->run,$sql);

					if(mysqli_num_rows($result)===0)
					{
						echo "NO DATA PRESENT";
					}
					else
					{
						?>
						<div>
					<h1>Teacher</h1>
					<a href="index_teacher.php" ><button class="student_loginb">HOME</button></a>
					<a href="logout.php"><button class="logout_button">LOGOUT</button></a>
					<br/>
					<h3>MARKSHEET of <?php echo $_SESSION["Subject"]; ?></h3>
					</div>
						
					<div>
					<table border="8px">
					
					<tr>
					<th width="25%">Name</th>
					<th width="25%">Class</th>
					<th width="25%">Subject</th>
					<th width="25%">Marks</th>
					</tr>
					<tbody>
					
						<?php
						while ($row = mysqli_fetch_array($result))
				{	
					echo "<tr>";       
        			echo "<td>".$row["Name"]."</td>";
	          		echo "<td>".$row["Class"]."</td>";
	           		echo "<td>".$row["Subject"]."</td>";
	           		echo "<td>".$row["Marks"]."</td>";
	           		echo "</tr>";
				}
				?>
				
				</tbody>
				</table>
				</div>
				<?php

					}

				}
			if(isset($_POST['view_student_marks']))
			{
				$View_Student_Marks = $_POST['view_student_marks'];
					$Subject = $_SESSION['Subject'];
					$Class = $_SESSION['class'];
					$Email = $_SESSION['Email'];
					$sql = "SELECT Name,Class,Subject ,Marks from marksheet WHERE  Email = '$Email' " ;
					$result = mysqli_query($this->run,$sql);

					if(mysqli_num_rows($result)===0)
					{
						echo "NO DATA PRESENT";
					}
					else
					{
						?>
						<div>
					<h1><a href="indexed.php"><button class="student_loginb">HOME</button></a>Student
					<a href="logout.php"><button class="logout_button">LOGOUT</button></a></h1>
					<br/>
					<h3>MARKSHEET </h3>
					</div>
						
					<div>
					<table border="8px">
					
					<tr>
					<th width="25%">Name</th>
					<th width="25%">Class</th>
					<th width="25%">Subject</th>
					<th width="25%">Marks</th>
					</tr>
					<tbody>
					
						<?php
						while ($row = mysqli_fetch_array($result))
				{	
					echo "<tr>";       
        			echo "<td>".$row["Name"]."</td>";
	          		echo "<td>".$row["Class"]."</td>";
	           		echo "<td>".$row["Subject"]."</td>";
	           		echo "<td>".$row["Marks"]."</td>";
	           		echo "</tr>";
				}
				?>
				
				</tbody>
				</table>
				</div>
				<?php

					}
			}
		}
		public function delete()
		{
			if(isset($_POST['delete_submit']) )
			{	
				?>
				<div>
					<h1><a href="index_teacher.php"><button class="student_loginb">HOME</button></a>Teacher
					<a href="logout.php"><button class="logout_button">LOGOUT</button></a></h1>
					<br/>
					<br/>
				</div>
				<?php
				
				$delete_class = $_SESSION['delete_class'];
				
				$delete_sylabus = $_SESSION['delete_sylabus'];
				$SU = $_SESSION['Subject'];
				$sql = "DELETE FROM syllabus where Class = '$delete_class' && Subject = '$SU' && Syllabus = '$delete_sylabus'";
				$result = mysqli_query($this->run,$sql);
				if(!$result)
				{
					echo "Deletion Faiked";
				}
				else
				{
					echo "Deleted Succesfully" ;
				}
			}
			if(isset($_POST['delete_teacher_details']))
			{
				?>	<h1><a href="index.php"><button class="logout_button">HOME PAGE</button></a>Teacher</h1>
					
					<br/>
					
					<?php
				$Name = $_SESSION['name'];
				$Password1 = $_SESSION['password1'];
				$sql = "DELETE FROM teacher WHERE Name = '$Name' && Password1 = '$Password1'";
				$result = mysqli_query($this->run,$sql);
				if(!$result)
				{
					echo "Deletion failed";
				}
				else
				{	
					unset($_SESSION["name"]);
					unset($_SESSION["password1"]);
					echo "deleted succesfully";
					echo "<br/>";
				}

			}
			if(isset($_POST['delete_student']))
			{	
				?>	<h1><a href="index.php"><button class = "student_loginb">HOME PAGE</button></a>Student</h1>		<br/>
					<?php
				$Name = $_SESSION['name'];
				$Password1 = $_SESSION['password1'];
				$sql = "DELETE FROM student WHERE Name = '$Name' && Password1 = '$Password1'";
				$result = mysqli_query($this->run,$sql);
				if(!$result)
				{
					echo "Deletion failed";
				}
				else
				{	
					unset($_SESSION["name"]);
					unset($_SESSION["password1"]);
					echo "<br/>";
					echo "deleted succesfully";
					echo "<br/>";
					echo "You wil be redirected to Home page within 4 seconds";
					//header("refresh:4;url=register.php");
				}
			}
		}
		public function edit()
		{
			if(isset($_POST['edit_student']))
			{
				$Password1 = $_SESSION['password1'];
				$sql = "SELECT * FROM student WHERE Password1 = '$Password1'";
							?>
							<div>
							<h1><a href="indexed.php"><button class = "student_loginb">HOME</button></a>Student
							<a href="logout.php"><button class="logout_button">LOGOUT</button>
							</a></h1>
							<br/>
							<br/>
							</div>

							<table border="4px">
								<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Class</th>
								<th>Age</th>
								<th>Mobile</th>
							
								</tr>
								<tr>
								<?php
							$result = mysqli_query($this->run,$sql);
							if(!$result)
							{
								echo "edit failed";
							}
							else
							{
								while ($row = mysqli_fetch_array($result)) 
								{
									echo "<tr><form action = update.php method=post>";

									echo "<td><input type = text name = lname 
									value = '".$row['Name']."'></td>";

									echo "<td><input type = text name = lemail value = '".$row['Email']."'></td>";

									echo "<td><input type = text name = lclass
									value = '".$row['Class']."'></td>";

									echo "<td><input type = text name = lage
									value = '".$row['Age']."'</td>";

									echo "<td><input type = text name = lmobile value = '".$row['Mobile']."'></td>";

									echo "<input type = hidden name = l_id value = '".$row['ID']."'>";

									echo "<td><input type = submit value = UPDATE></td>";

									echo "</form></tr>";
								}
							}
						?>
						</tr>
					</table>
				<?php
			}
			if(isset($_POST['edit_teacher']))
			{
				$Password1 = $_SESSION['password1'];
				$sql = "SELECT * FROM teacher WHERE Password1 = '$Password1'";
				?>
				<div>
				<h1><a href="index_teacher.php"><button class="student_loginb">HOME</button></a>
					Teacher<a href="logout.php">
				<button class="logout_button">
				LOGOUT
				</button></h1>
				</a>
				<br/>
				<br/>
				</div>

				<table border = "4px;">
				<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Subject</th>
				<th>Age</th>
				<th>Mobile</th>
				<th></th>
			
				</tr>
				<tr>
				<?php
			$result = mysqli_query($this->run,$sql);
			if(!$result)
			{
				echo "edit failed";
			}
			else
			{
			while ($row = mysqli_fetch_array($result)) 
			{
				echo "<tr><form action = update_teacher.php method=post>";

				echo "<td><input type = text name = lname 
				value = '".$row['Name']."'></td>";

				echo "<td><input type = text name = lemail value = '".$row['Email']."'></td>";

				echo "<td><input type = text name = lsubject
				value = '".$row['Subject']."'></td>";

				echo "<td><input type = text name = lage
				value = '".$row['Age']."'</td>";

				echo "<td><input type = text name = lmobile value = '".$row['Mobile']."'></td>";

				echo "<input type = hidden name = l_id value = '".$row['T_ID']."'>";

				echo "<td><input type = submit value = UPDATE></td>";

				echo "</form></tr>";

			}
		}
		?>
		</tr>
	</table>
<?php

			}
		}

		public function add_marks()
		{	

			?>
			<div>
				<h1 >Teacher</h1>
				<a href="index_teacher.php"><button class="student_loginb">HOME</button></a>
					<a href="logout.php">
				<button class="logout_button">
				LOGOUT
				</button>

				</a>
				<br/>
				<br/>
				</div>
			<?php
			$Student_Name = $_POST['student_name'];
			$Student_Email = $_POST['student_email'];
			$Student_Class = $_POST['student_class'];
			$Student_Subject = $_POST['student_subject'];
			$Student_Marks = $_POST['student_marks'];
			$Subject = $_SESSION['Subject'];

			if($Student_Subject == $Subject)
			{
				$sql = "INSERT INTO marksheet(	Name,Email,Class,Subject,Marks)
					VALUES('$Student_Name',
						'$Student_Email',
						'$Student_Class',
						'$Student_Subject',
						'$Student_Marks')";
				$result = mysqli_query($this->run,$sql);

				if(!$result)
				{
					echo "Faiked";
				}
				else
				{
					echo "Marks Added succesfully";
				}

			}
			else
			{
				echo "Incorrect Subject";
			}
		}
	}
	$obj = new DB_School;
?>
</body>
</html>