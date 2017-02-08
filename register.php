<?php
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title> Registration Page </title>
<link rel = "stylesheet" href="css/style.css">
</head>
<body style = "background-color:#2c3e50">

	<div id = "main-wrapper">

		<center> 
			<h2> Registration Form </h2> 
			<img src = "imgs/avatar.png" class = "avatar"/>
		</center>

		<form class = "myform" action = "register.php" method = "post">
			<label><b><br><br><br><br><br><br><br><br> Username: </b> </label><br>
			<input name = "username" type = "text" class = "inputvalues" placeholder = "Enter your username:" required/><br><br>
			<label> <b> Password:</b> </label> <br>
			<input name = "password" type = "password" class = "inputvalues" placeholder = "Enter your password:" required/> <br> <br>
			<label> <b> Confirm password: </b></label><br>
			<input name = "cpassword" type = "password" class = "inputvalues" placeholder = "Confirm password" required/>


			<input name = "submit_btn" type = "submit" id = "signup_btn" value = "Sign Up" /> <br>
			<a href = "index.php"> <input name = "back_btn" type = "button" id = "back_btn" value = "Back" /> <br>
		</form>

		<?php
			if(isset($_POST['submit_btn']))
			{
				// echo '<script type = "text/javascript"> alert("Sign up button clicked") </script>';

				$username = $_POST['username'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];

				if($password==$cpassword)
				{
					$query = "select * from user WHERE username='$username'";

					$query_run = mysqli_query($con, $query);

					if(mysqli_num_rows($query_run)>0)
					{
						// There is already user w/ the same username
						echo '<script type = "text/javascript"> alert("Username already exists. Please try another username") </script>'; 
					}
					else
					{
						$query = "Insert into user values('$username','$password')";
						$query_run = mysqli_query($con, $query);

						if($query_run)
						{
							echo '<script type = "text/javascript"> alert("User registered. Proceed to login page") </script>'; 
						}
						else
						{
							echo '<script type = "text/javascript"> alert("Error!") </script>'; 
						}
					}
				}
				else
				{
					'<script type = "text/javascript"> alert("Passwords do not match. Please enter again.") </script>';
				}
			}
		?>

	</div>
</body>
</html>