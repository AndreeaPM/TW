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
 <div class="leftFilter">
  <h3>Domain:</h3>
  <form action="" method="get">
   <input type="radio" name="dom" value="All" checked=""> All <br>
   <input type="radio" name="dom" value="Film" > Film <br>
   <input type="radio" name="dom" value="Music" > Music <br>
   <input type="radio" name="dom" value="Art" > Art <br>
   <h3>Order:</h3>
   <input type="radio" name="order" value="data desc" checked=""> Most recent <br>
   <input type="radio" name="order" value="artist asc" > Name-asc <br>
   <input type="radio" name="order" value="artist desc" > Name-desc <br>
   <input type="radio" name="order" value="value asc" > By cotation asc <br>
   <input type="radio" name="order" value="value desc" > By cotation desc <br><br>
   <input type="submit" name="a" value="Filter them" style="color: brown; font-size: 1.3vw; background: none; border-color: orange; float: right; cursor:pointer;"><br>
 </form> 
</div>
<div class="viewAuto">
 <?php 
 connect_db();
 $sql=order();
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
  while($post = $result->fetch_assoc()) {
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
            <p style="font-size: 1vw; margin-bottom: 0.1vw;">Value: <?php echo $post['value']; ?> RON<br>
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
     <tr><th  style="color: orange;">Owner:</th> </tr>
     <tr>
      <td>Username: <?php echo $uname; ?></td> 
      <td>Phone: <?php echo $phone; ?></td> 
      <td >Email: <?php echo $email; ?></td> 
    </tr>
    <tr>
      <td style="float: right; border: 0.2vw; border-style: solid; border-color: orange; ">
        <a href="send_proposal.php?id=<?php echo $post['id_a']; ?>" style="text-decoration: none; font-size: 1vw;"> Send Proposal</a></td>
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
  <p>&copy; This site was made by MM and AP.
    <i class="material-icons">&#xe815; </i></p>
  </footer>

</body>
</html>