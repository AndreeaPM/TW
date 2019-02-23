<!DOCTYPE html>
<html>
<?php require_once "functions.php"; ?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Grac</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<header class="ontop"> 
		<h1>Autograph center</h1>
		<h4>~Because history matters~</h4>
		<?php
		connect_db();
		?> 
		<div class="search">
			<input type="text" placeholder="Search autograph.."> <i class="fa fa-search"></i>       
		</div></header>
		<nav class="menu">
			<ul>
				<li><a href="index.php"><i class="fa fa-home"></i>  HOME</a></li>
				<li><a href="bazar.php?dom=All&order=data+desc&a=Filter+them"><i class="fa fa-cart-arrow-down"></i>BAZAR</a></li>
				<li><a href="profile.php"><i class="fa fa-id-card-o"></i>PROFILE</a></li>
			</ul>
		</nav> 
		<section class="sectiune1">
			<br><br>
			This is a site about passionate people.<br> Join us and check out a piece of history we present to you. Be a part of our team and help us share wisdom. 
		</section>
		<div class="continut">
			<div class="formBox">
				<form action="PHP/login.php" method="post">
					<h1>LOGIN</h1>
					<h5 style="color: red; font-family: none;  text-align: center;"><?php is_registered() ?><h5>
						<h5 style="color: red; font-family: none;  text-align: center;"><?php is_login() ?><h5>	
							<h5 style="color: red; font-family: none;  text-align: center;"><?php not_logged() ?><h5>	
								<h5 style="color: red; font-family: none;  text-align: center;"><?php logged_out() ?><h5>	
									<h5 style="color: red; font-family: none;  text-align: center;"><?php delete_message() ?><h5>	
										<p>Username</p>
										<input type="text" name="username"  placeholder=" Hommy01..." required="">
										<p> Password</p>
										<input type="password" name="pass" placeholder="  ......... " required="">
										<input type="submit" name="login" value=" Sign in"><br><br>
									</form>
									<a href="cont.php">Create account</a>
								</div>
							</div>

							<footer>
								<p>&copy; This site was made by MM and AP.
									<i class="material-icons" >&#xe815; </i><p>
									</footer>

								</body>
								</html>
