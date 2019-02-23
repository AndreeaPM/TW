<!DOCTYPE html>
<html>
<head>
	<?php require_once "functions.php"; ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Account</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<div class="continutCont">
		<div class="formCont">
			<form action="PHP/new_profile.php" method="post" enctype="multipart/form-data">
				<h1>Create Account</h1>

				
				<h5 style="color: red; font-family: none;  text-align: center;"><?php cont_create() ?><h5>

					<p>First Name</p>
					<input type="text" name="fname" placeholder="   Your first name hommy..."  required="" ><br><br>
					<p>Last Name</p>
					<input type="text" name="lname" placeholder="   Your last name hommy..." required="" ><br><br>
					<p>Username</p>
					<input type="text" name="username" placeholder="   Hommy01..." required=""><br><br>
					<p>Age</p>
					<input type="text" name="age" placeholder="   Your age hommy... " required="" ><br><br>
					<p>Profile Pic</p>
					<input type="file" name="filetoupload" id="filetoupload" required=""> 			<br><br>
					<p>Email</p>
					<input type="text" name="email" placeholder="   hommy@exemple.com"  required=""><br><br>
					<p>Phone</p>
					<input type="text" name="phone" placeholder="   0710101011"  required="" ><br><br>
					<p>City</p>
					<input type="text" name="city" placeholder="    Narnia" required="" ><br><br>
					<p> Password</p>
					<input type="Password" name="pass" placeholder="   More than 6 characters..." required=""><br><br>
					<p> Confirm Password</p>
					<input type="Password" name="cpass" placeholder="   .............." required=""><br><br>
					<input type="checkbox" name="check"> Accept everything because I can. <br><br>
					<input type="submit" name="registered" value="Submit"><br><br>
					<p><a href="index.php">Back to home</a></p> 
				</form>
			</div></div>


		</body>
		</html>