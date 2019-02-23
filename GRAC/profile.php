<!DOCTYPE html>
<html>
<head>
  <?php require_once "functions.php"; ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grac</title>
  <link rel="stylesheet" type="text/css" href="index.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <?php is_auth(); ?>
  <?php
  connect_db();
  $sql_4 = "SELECT id,firstname,lastname,username, age,phone,email,city,photo FROM users WHERE username = ?";
  $statement = $conn->prepare($sql_4);
  $statement->bind_param('s', $_SESSION['user_username']);
  $statement->execute();
  $statement->store_result();
  $statement->bind_result($id,$fname, $lname, $uname, $age, $phone, $email, $city,$photo);
  $statement->fetch();
  ?>
  <header class="ontop"> 
    <h1>Autograph center</h1>
    <h4>~Because history matters~</h4>
    <div class="search">
      <input type="text" placeholder="Search autograph.."> <i class="fa fa-search"></i>       
    </div> </header>
    <nav class="menu">
      <ul>
       <li><a href="index.php"><i class="fa fa-home"></i>  HOME</a></li>
       <li><a href="bazar.php?dom=All&order=data+desc&a=Filter+them"><i class="fa fa-cart-arrow-down"></i>BAZAR</a></li>
       <li><a href="profile.php"><i class="fa fa-id-card-o"></i>PROFILE</a></li>
     </ul>
   </nav>



   <div class="manPhoto">
     <article>
      <img style="width: 18vw; height: 23vw;" src="PHP/<?php echo $photo; ?>" alt="myphoto">
    </article>  
  </div>

  <div class="options">
    <aticle>
      <h5 style="color: red; font-family: none;  text-align: center;"><?php delete_message() ?><h5>
        <p>This is me. I am <?php echo $fname." ".$lname ?>. <br> My phone is: <?php echo $phone; ?></p>
        <p>I live in <?php echo $city; ?>.<br> I am <?php echo $age; ?> years old.<br> My email: <?php echo $email; ?>.</a> </p>
      </article>
      <article>
        <p style="text-decoration: underline;"><a href="addauto.php">&#9755; Add Knowledge/New Autograph</a></p>
        <p style="text-decoration: underline;"><a href="edit.php">&#9755; Edit profile</a></p>
         <p style="text-decoration: underline;"><a href="my_requests.php">&#9755; Requests</a></p>
      </article>
    </div>

<div class="autogList">  
 <?php 
 
 $sql = "SELECT id_a,artist,domain,value,photo,descriere,adaugare FROM autograf where id_user=$id";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
  while($post = $result->fetch_assoc()) {
    ?>  
    <table style="width: 25%;">
      <tr>
        <td><img src="PHP/<?php echo $post['photo']; ?>" style="height: 5vw; width: 5vw;" alt="AutoSample"></td>
        <td style="font-size: 1.3vw; font-family:cursive;"><br><?php echo $post['artist']; ?></td>
        <tr>
          <th>Domain:</th> 
          <td> <?php echo $post['domain']; ?></td> 
        </tr>
        <tr>
          <th>Value:</th> 
          <td> <?php echo $post['value']; ?> RON</td> 
        </tr>
      </tr>
      <tr><th>Why is it great?</th> </tr>
      <tr>
        <td> <?php echo $post['descriere']; ?></td> 
      </tr>
      <tr>
       <td> <?php echo $post['adaugare']; ?></td> 
     </tr>
     <tr>
      <th><button type="button" style="font-size: 0.7vw; color: black; "><a href="edit_auto.php?id=<?php echo $post['id_a'];?>" style="text-decoration: none">Edit autograph</button></th>
        <th><button type="button" style="font-size: 0.7vw; color: black;"><a href="PHP/delete_auto.php?id=<?php echo $post['id_a'];?>"  style="text-decoration: none">Delete Autograph &#9773;</button></th>  
        </tr>
      </table>
      <?php
    }
  } else {
    ?>
    <p class=”text-center”>No autographs yet!</p>
    <?php
  }
  $conn->close();
  ?>
</div>


<footer>
  <article>
    <button type="button" style="font-size: 20px"><a href="PHP/delete_account.php"  style="text-decoration: none">Delete account</button>
      <button type="button" style="font-size: 20px"><a href="PHP/logout.php" style="text-decoration: none">Disconnect</a></button>
    </article>
    <p>&copy; This site was made by MM and AP.
      <i class="material-icons">&#xe815; </i><p>
      </footer>

    </body>
    </html>