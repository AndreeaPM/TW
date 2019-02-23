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
		<h1 style="text-align: center; font-style: italic; font-size: 2.5vw">Edit Autograph</h1>
		<h5 style="color: red; font-family: none;  text-align: center;"><?php edit_profile() ?><h5>

			<h5 style="color: red; font-family: none;  text-align: center;"><?php edit_value() ?><h5>

				<form action="PHP/edit_auto_photo.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
					<p style="font-size: 1.5vw; font-style: bold; font-style: italic; margin-bottom: 0.5vw;">Profile Pic</p>
					<input type="file" name="filetoupload" id="filetoupload" style="width:30.5vw; height: 2vw; background: rgb(0,0,0,0.2);"  > 
					<input type="submit" name="registered" value="Change" style="height: 2.2vw; background-color: rgba(0, 0, 0, 0.5); border:none; width: 6vw ; font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size: 1vw;"><br>
				</form ><br>
				<form action="PHP/edit_auto_description.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">

					<p style="font-size: 1vw; font-style: bold; font-style: italic; margin-bottom: 0.5vw;">WHERE, WHEN AND WHY DID IT COME INTO YOUR POSSESION?</p>
					<input type="text" name="descriere" placeholder="..." style="width:30vw; height: 2vw;" >
					<input type="submit" name="registered" value="Change" style="height: 2.2vw; background-color: rgba(0, 0, 0, 0.5); border:none; width: 6vw ; font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size: 1vw;"><br>
				</form><br>
				<form action="PHP/edit_auto_another_description.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
					<p style="font-size: 1vw; font-style: bold; font-style: italic; margin-bottom: 0.5vw;">ANYTHING ELSE TO SHARE ABOUT THIS LITTLE PIECE OF CULTURE?</p>
					<input type="text" name="another" placeholder="..." style="width:30vw; height: 2vw;" >			<input type="submit" name="registered" value="Change" style="height: 2.2vw; background-color: rgba(0, 0, 0, 0.5); border:none; width: 6vw ; font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size: 1vw;"><br>
				</form><br>
				<form action="PHP/edit_auto_value.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
					<p style="font-size: 1vw; font-style: bold; font-style: italic; margin-bottom: 0.5vw;">NOW, HOW MUCH?</p>
					<input type="text" name="value" placeholder="...RON" style="width:30vw; height: 2vw;"  >
					<input type="submit" name="registered" value="Change" style="height: 2.2vw; background-color: rgba(0, 0, 0, 0.5); border:none; width: 6vw ; font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size: 1vw;"><br>
				</form><br>
				
				<p style="font-size: 0.9vw; text-align: center;"><a href="profile.php" style="text-decoration-color: red; color:black">Back to profile.</a></p> 
			</div>


		</body>
		</html>