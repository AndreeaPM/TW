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
	<?php is_auth(); ?>
	<div class="continutCont">
		<h1 style="text-align: center; font-style: italic; font-size: 2.5vw">Edit Account</h1>
		<h5 style="color: red; font-family: none;  text-align: center;"><?php edit_profile() ?><h5>
			<h5 style="color: red; font-family: none;  text-align: center;"><?php cont_create() ?><h5>
				<form action="PHP/edit_profile_fname.php" method="post" enctype="multipart/form-data">
					<p style="font-size: 1.8vw; font-style: bold; font-style: italic; margin-bottom: 0.5vw;">First Name</p>
					<input type="text" name="fname" placeholder=" Wanna change your first name hommy?..." style="width:30vw; height: 2vw;"  >
					<input type="submit" name="registered" value="Change"  style="height: 2.2vw; background-color: rgba(0, 0, 0, 0.5); border:none; width: 6vw ; font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size: 1vw;">
				</form>
				<form action="PHP/edit_profile_lname.php" method="post" enctype="multipart/form-data">
					<p style="font-size: 1.8vw; font-style: bold; font-style: italic; margin-bottom: 0.5vw;">Last Name</p>
					<input type="text" name="lname" placeholder="Wanna change your last name hommy?..." style="width:30vw; height: 2vw;"  >
					<input type="submit" name="registered" value="Change" style="height: 2.2vw; background-color: rgba(0, 0, 0, 0.5); border:none; width: 6vw ; font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size: 1vw;"><br>
				</form>
				<form action="PHP/edit_profile_age.php" method="post" enctype="multipart/form-data">
					<p style="font-size: 1.8vw; font-style: bold; font-style: italic; margin-bottom: 0.5vw;">Age</p>
					<input type="text" name="age" placeholder="Wanna change your age hommy?... " style="width:30vw; height: 2vw;"  >
					<input type="submit" name="registered" value="Change" style="height: 2.2vw; background-color: rgba(0, 0, 0, 0.5); border:none; width: 6vw ; font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size: 1vw;"><br>
				</form >
				<form action="PHP/edit_profile_photo.php" method="post" enctype="multipart/form-data">
					<p style="font-size: 1.8vw; font-style: bold; font-style: italic; margin-bottom: 0.5vw;">Profile Pic</p>
					<input type="file" name="filetoupload" id="filetoupload" style="width:30.5vw; height: 2vw; background: rgb(0,0,0,0.2);"  > 
					<input type="submit" name="registered" value="Change" style="height: 2.2vw; background-color: rgba(0, 0, 0, 0.5); border:none; width: 6vw ; font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size: 1vw;"><br>
				</form >
				<form action="PHP/edit_profile_email.php" method="post" enctype="multipart/form-data">

					<p style="font-size: 1.8vw; font-style: bold; font-style: italic; margin-bottom: 0.5vw;">Email</p>
					<input type="text" name="email" placeholder="   hommy@exemple.com" style="width:30vw; height: 2vw;" >
					<input type="submit" name="registered" value="Change" style="height: 2.2vw; background-color: rgba(0, 0, 0, 0.5); border:none; width: 6vw ; font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size: 1vw;"><br>
				</form>
				<form action="PHP/edit_profile_phone.php" method="post" enctype="multipart/form-data">
					<p style="font-size: 1.8vw; font-style: bold; font-style: italic; margin-bottom: 0.5vw;">Phone</p>
					<input type="text" name="phone" placeholder="   +401101010110" style="width:30vw; height: 2vw;" >			<input type="submit" name="registered" value="Change" style="height: 2.2vw; background-color: rgba(0, 0, 0, 0.5); border:none; width: 6vw ; font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size: 1vw;"><br>
				</form>
				<form action="PHP/edit_profile_city.php" method="post" enctype="multipart/form-data">
					<p style="font-size: 1.8vw; font-style: bold; font-style: italic; margin-bottom: 0.5vw;">City</p>
					<input type="text" name="city" placeholder="    Narnia" style="width:30vw; height: 2vw;"  >
					<input type="submit" name="registered" value="Change" style="height: 2.2vw; background-color: rgba(0, 0, 0, 0.5); border:none; width: 6vw ; font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size: 1vw;"><br>
				</form>
				<form action="PHP/edit_profile_pass.php" method="post" enctype="multipart/form-data" >
					<p style="font-size: 1.8vw; font-style: bold; font-style: italic; margin-bottom: 0.5vw;">New Password</p>
					<input type="Password" name="pass" placeholder="   .............">
					<p style="font-size: 1.8vw; font-style: bold; font-style: italic; margin-bottom: 0.5vw;"> Confirm New Password</p>
					<input type="Password" name="cpass" placeholder="   .............."><br><br>
					<input type="submit" name="registered" value="Change" style="height: 2.2vw; background-color: rgba(0, 0, 0, 0.5); border:none; width: 6vw ; font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size: 1vw;"><br><br>
				</form>
				<p style="font-size: 1.4vw; text-align: center;"><a href="profile.php" style="text-decoration-color: red; color:black">Back to profile.</a></p> 
			</div>


		</body>
		</html>