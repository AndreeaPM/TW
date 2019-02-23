<!DOCTYPE html>
<html>
<head>
	<?php require_once "functions.php"; ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADD</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<div class="continutCont">
		<div class="formCont">
			<form method="post" action="PHP/new_auto.php" enctype="multipart/form-data">
				<h1>ADD New Autograph</h1>
				<h5 style="color: red; font-family: none;  text-align: center;"><?php edit_value() ?><h5>
					<h5 style="color: red; font-family: none;  text-align: center;"><?php cont_create() ?><h5>

						<p>Artist's Name</p>
						<input type="text" name="artist" placeholder="   Hommy's name..."  required="" ><br><br>
						<p>Add some cute pic of this piece of wisdom:</p>
						<input type="file" name="filetoupload" id="filetoupload" required=""> 
						<br><br>
						<p>Domain</p>
						<input type="radio" name="dom" value="Film" checked=""> Film <br><br>
						<input type="radio" name="dom" value="Music"> Music <br><br>
						<input type="radio" name="dom" value="Art"> Art <br><br>
						<p>Where, when and why did it come into your possesion?</p>
						<input type="text" name="descriere" placeholder="   Concert,Diner,'Accidental meeting'..."  required=""><br><br>
						<p>Anything else to share about this little piece of culture?</p>
						<input type="text" name="adaugare" placeholder="    It's an autograph..." required=""><br><br>
						<p>Now, how much?</p>
						<input type="text" name="value" placeholder="   RON..." required="" ><br><br>         
						<input type="Submit" name="post" value="Submit"><br><br>
						<p><a href="profile.php">Back to my profile</a></p> 
					</form>
				</div></div>

			</body>
			</html>