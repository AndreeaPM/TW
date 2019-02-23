<!DOCTYPE html>
<html>
   <?php require_once "functions.php"; ?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SEND</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<header class="ontop"> 
		<h1 style="font-size: 2VW;">SEND PROPOSAL</h1>
	</header>
<body>
	<div class="viewAuto" style="padding-left: 20%; margin: 0px; margin-top: 5vw;">
	<?php is_auth(); ?>
	<?php 
 connect_db();
 $sql= "SELECT id_a,id_user,artist,domain,descriere,adaugare,photo,value from autograf where id_a=$_GET[id]";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
  while($post = $result->fetch_assoc()) {
    $GLOBALS['$wanted'] = $post['id_a'];
    ?>
    <table style="background-color: #660000; color: #ffbf80; width: 30vw;">
      <tr>
        <?php $sql_7="SELECT username,phone,email from users where id=?";
        $statement = $conn->prepare($sql_7);
        $statement->bind_param('i', $post['id_user']);
        $statement->execute();
        $statement->store_result();
        $statement->bind_result($uname, $phone, $email);
        $statement->fetch();
        ?>
        <tr>
          <th><img src=" PHP/<?php echo $post['photo']; ?>" style="height: 10vw; width: 13vw; margin-bottom: 0.1vw;" alt="AutoSample"></th>
          <th><h3  style="color: #e68a00;"><?php echo $post['artist']; ?> <br>
            <p style="font-size: 1vw; margin-bottom: 0.1vw;">Value: <?php echo $post['value']; ?> RON<br><br> 
              Domain:  <?php echo $post['domain']; ?></p>
            </h3>
          </th>
        </tr>
      </tr>
      <tr><th  style="color: orange;">Why is it great?</th> </tr>
      <tr>
        <td> <?php echo $post['descriere']; ?></td> 
      </tr>
      <tr>
       <td> <?php echo $post['adaugare']; ?></td> 
     </tr>
  </table>
  <table style="background-color: #660000; color: #ffbf80; width: 30vw; height: 18.5vw;">
      <tr>
        <?php $sql_7="SELECT photo,firstname,lastname,username,phone,email from users where id=?";
        $statement = $conn->prepare($sql_7);
        $statement->bind_param('i', $post['id_user']);
        $statement->execute();
        $statement->store_result();
        $statement->bind_result($photo,$fname,$lname,$uname, $phone, $email);
        $statement->fetch();
        ?>
        <tr>
        	<th><img src=" PHP/<?php echo $photo; ?>" style="height: 10vw; width: 14vw; height: 14vw; margin-bottom: 0.1vw;" alt="AutoSample"></th>
        	<th><h2  style="color: yellow;"><?php echo $uname; ?> <br></h2>
        		<p style=" margin-bottom: 0.1vw; font-size: 1.5vw;"><?php echo  $fname." ".$lname; ?><br>
        			<p style="font-size: 1.5vw; margin-bottom: 0.1vw;"><?php echo $phone; ?><br>
        				<p style="font-size: 1.5vw; margin-bottom: 0.1vw;"><?php echo $email; ?><br>
      </p></p></p></th></tr>
</table>
</div>

<h3 style="text-align: center; color:  #b28a00;  float: left; width: 100%;">
	You can only select between 1 and 3 autographs. The sum of their values must be close enough to the value of the autograph you want.
</h3><br>
<h3 style="color: red; font-family: none;  text-align: center;"><?php unselected() ?><h3>
<div style="margin-left: 10%;">  
	<form action="PHP/send_offer.php?wanted=<?php echo $GLOBALS['$wanted'] ?>" method="post">
 <?php 
 }}
 $sql = "SELECT id_a,artist,value FROM autograf where id_user=".$_SESSION['user_id'];
 $counter=0;
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
  while($post1 = $result->fetch_assoc()) {
  $counter=$counter+1;
    ?> 
    <p style="float: left; width: 20%; font-size: 1.4vw; border-style: solid; border-color: black; margin-right: 2vw; text-align: center; background-color: #ffbf80; color: #660000; font-style: italic; font-family: serif;"> 
      	<input type="checkbox" name="send[]"  value="<?php echo $post1['id_a'] ?>" style="transform: scale(2);">
       <?php echo $post1['artist']; ?> 
       <br>
        	Value:<?php echo $post1['value']; ?> RON
        	<br>
        </p>
      <?php
    }
  } else {
    ?>
    <p class=”text-center”>You have no autographs yet!</p>
    <?php
  }
  $conn->close();
  ?>

  <p style="float: left; width: 100%; ">
  <input type="submit" name="send_offer" value="Send Offer!" style="float: left; width: 30%; font-size: 1.4vw; margin-right: 2vw; text-align: center;  color: #ffbf80; background-color: #660000; font-style: italic; font-family: serif; margin-left: 30%;">
</p>
</form>
</div>
<h3 style="float: left; width: 100%; text-align: center;"><a href="bazar.php?dom=All&order=data+desc&a=Filter+them" style="text-decoration-color: black; color: black;">
	Back to bazar!
</h3>
</body>
	</html>
