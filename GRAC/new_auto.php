<?php
require_once "../functions.php";
connect_db();
$target_dir="auto_img/";
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
  if ((preg_match('/[^0-9]/',$_POST['value']))||($_POST['value']<1)) {
    redirect_to("../addauto.php?edit_value=true");
  }
  if (preg_match('/[^A-Za-z\t]',$_POST['artist'])) {
    redirect_to("../addauto.php?edit_fname=true");
  }

  $sql_2 = "INSERT INTO autograf(id_user,artist,photo,domain,descriere,adaugare,value) VALUES (?, ?,?,?,?,?,?)";
  $statement = $conn->prepare($sql_2);
  $statement->bind_param('isssssi',$_SESSION['user_id'], $_POST['artist'],$target_file,$_POST['dom'],$_POST['descriere'],$_POST['adaugare'],$_POST['value']);
  if ($statement->execute()) {
   redirect_to("../profile.php");
 } else {
  echo "Error" . $conn->error;
}
$conn->close();