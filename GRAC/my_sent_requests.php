<!DOCTYPE html>
<html>
<?php require_once "functions.php"; ?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Requests</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<header style="height: 4vw"> 
  <h2 style="float: left; width: 30%; text-align: left; margin-left: 1%;"><a href="my_requests.php" style="text-decoration-color: red; color: black;">
  Received Requests!</a>
</h2>
  <h1 style="font-size: 3vw; width: 38%; text-align: center; float: left; margin-top: 0.1vw; margin-bottom: 0.2vw; font-family: sans-serif;">Offers</h1>
  <h2 style="float: right; width: 30%; text-align: right; margin-right: 1%;"><a href="my_sent_requests.php" style="text-decoration-color: red; color: black;">
  Sent Requests!
</h2></a>
</header>
<body>
	<?php is_auth(); ?>
	<?php 
 connect_db();
 print_r($_SESSION);
 $sql= "SELECT a.id_a,r.id_user,a.artist,a.value,r.id_auto1,r.id_auto2,r.id_auto3 from autograf a join requests r on a.id_a=r.id_wanted where r.id_user=$_SESSION[user_id]";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 while($post = $result->fetch_assoc()) {
 if($post['id_auto3']==null)
 {$post['id_auto3']=0;}
 if($post['id_auto2']==null)
 {$post['id_auto2']=0;}
 ?>
 <div class="viewAuto" style="padding-left: 3%; margin-left: 0.3%; margin-top: 0.2vw; border-style: solid; border-color: red; width: 96%; height: 15vw; background-color: #660000; margin-bottom: 0px;">
  <?php $sql_2="SELECT u.photo,u.firstname,u.lastname,u.username,u.phone,u.email from users u join autograf a on u.id=a.id_user where a.id_a=?";
  $statement = $conn->prepare($sql_2);
  $statement->bind_param('i', $post['id_a']);
  $statement->execute();
  $statement->store_result();
  $statement->bind_result($photo,$fname,$lname,$uname, $phone, $email);
  $statement->fetch();
  ?>
  <div style="color: #ffbf80; width: 20%; height: 90%; float: left; margin-right: 2vw; margin-top: 0.4vw; border-style: solid; border-color: black;">
    <img src=" PHP/<?php echo $photo; ?>" style="height: 40%; width: 40%; margin: 0vw; float: right; margin-right: 2%; margin-top: 2%;" alt="AutoSample">
    <h4  style="color:  #ffe6b3; margin-left: 10%;"><?php echo $uname; ?> <br></h4>
    <p style=" margin: 0vw; font-size: 1vw; margin-left: 5%;"><?php echo  $fname." ".$lname; ?><br><br>
      <?php echo $phone; ?><br>
      <?php echo $email; ?><br><br>
      The autograph you want from him: <br>
    </p>
    <?php
    $sql_3 = "SELECT artist,value FROM autograf where id_a=".$post['id_a'];
    $result2 = $conn->query($sql_3);
    if ($result2->num_rows > 0) {
    $post2 = $result2->fetch_assoc();
    ?> 
    <p style="float: left; width: 90%; font-size: 0.9vw; border-style: solid; border-color: black; margin-left: 5%; text-align: center; background-color: #ffbf80; color: #660000; font-style: italic; font-family: serif; margin-top: 0px;"> 
     <?php echo $post2['artist']; ?> 
     <br>
     Value:<?php echo $post2['value']; ?> RON
     <br>
   </p>
   <?php
 }
 ?>
</div>
<?php $sql_1="SELECT artist,descriere,photo,adaugare,value,domain from autograf where id_a= $post[id_auto1] or id_a= $post[id_auto2] or id_a= $post[id_auto3] ";
$result1= $conn->query($sql_1);
if ($result1->num_rows > 0) {
while($post1 = $result1->fetch_assoc()) {
?>

<div style="color: black; width: 20%; height: 90%; float: left; margin-right: 2vw; margin-top: 0.4vw; border-style: solid; border-color: black; background-color: #ffe6b3">
  <img src=" PHP/<?php echo $post1['photo']; ?>" style="height: 4vw; width: 30%; padding: 0px; margin-left: 33%; margin-top: 1%;" alt="AutoSample">
  <h3  style=" padding: 0.5%; margin: 0px; text-align: center;"><?php echo $post1['artist']; ?> </h3>
  <p style="font-size: 1vw; margin-bottom: 0vw;">Value: <?php echo $post1['value']; ?> RON<br>
    Domain:  <?php echo $post1['domain']; ?> <br>
    Why is it great:
    <?php echo $post1['descriere']; ?><br> <?php echo $post1['adaugare']; ?>
  </p>
</div>
<?php }} ?>
  <form style="width: 8%; float: right; margin-right: 1%; margin-top: 1%;" method="post">
  <input type="submit" name="send_offer" value="Delete request!" style="float: right; font-size: 1vw; margin-right: 0.2vw; text-align: center;  color: #ffbf80; background-color: #660000; font-style: italic; font-family: serif; width: 100%; margin-bottom: 33%;">
</form>
</div>
<?php
}}
$conn->close();
?>
<h3 style="float: left; width: 100%; text-align: center;"><a href="profile.php" style="text-decoration-color: black; color: black;">
	Back to profile!
</h3>
</body>
</html>
