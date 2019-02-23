<?php
require_once "../functions.php";
connect_db();
$target_dir="user_img/";
$target_file = $target_dir . basename($_FILES["filetoupload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }}

  $sql_1 = "INSERT INTO users(firstname,lastname,username,age,phone,email,city,photo,pass) VALUES (?,?,?,?,?,?,?,?,?)";
  $statement = $conn->prepare($sql_1);
  if (preg_match('/[^A-Za-z]/',$_POST['fname'])) {
    redirect_to("../cont.php?edit_fname=true");
  }
  if (preg_match('/[^A-Za-z]/',$_POST['lname'])) {
    redirect_to("../cont.php?edit_fname=true");
  }
  if ((preg_match('/[^0-9]/',$_POST['age']))||($_POST['age']<13)||($_POST['age']>150)) {
    redirect_to("../cont.php?edit_age=true");
  }
  if(!preg_match("/^0[0-9]{9}$/", $_POST['phone'])) {
   redirect_to("../cont.php?edit_phone=true");
 }
 if (preg_match('/[^A-Za-z]/',$_POST['city'])) {
  redirect_to("../cont.php?edit_city=true");
}
if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
  redirect_to("../cont.php?edit_email=true");
}
$sql="SELECT username FROM users where username like'$_POST[username]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $user_taken=true;
}
else
{
  $user_taken=false;
}

if(!ctype_alnum( $_POST['username'] )||($user_taken==true))
{
  redirect_to("../cont.php?edit_username=true");
}


if(($_POST['pass']!=$_POST['cpass'])||(strlen($_POST['pass'])<6)||(strlen($_POST['pass'])>20)) {redirect_to("../cont.php?edit_pass=true");}
if(!isset($_POST['check'])) { echo "You must accept us."; redirect_to("../cont.php");} 
$statement->bind_param('sssisssss', $_POST['fname'],$_POST['lname'],$_POST['username'],$_POST['age'],$_POST['phone'],$_POST['email'],$_POST['city'],$target_file,password_hash($_POST['pass'], PASSWORD_DEFAULT));
if ($statement->execute()) {
  echo "Please login";
  redirect_to("../index.php?registered=true");
} else {
  echo "Error" . $conn->error;
}
$conn->close();