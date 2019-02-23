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
} else {
  if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }}
  $sql_6 = "UPDATE autograf SET photo= ? WHERE id_a = ?";
  $statement = $conn->prepare($sql_6);
  $statement->bind_param('si', $target_file,$_GET['id']);
  if ($statement->execute()) {
    redirect_to("../edit_auto.php?edit_profile=true&id=".$_GET[id]);
  } else {
    echo "Error: " . $conn->error;
  }
