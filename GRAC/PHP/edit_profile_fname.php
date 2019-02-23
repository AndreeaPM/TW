<?php
require_once "../functions.php";
connect_db();
$sql_6 = "UPDATE users SET firstname= ? WHERE id = ?";
$statement = $conn->prepare($sql_6);
$statement->bind_param('si', $_POST['fname'],$_SESSION['user_id']);
if (preg_match('/[^A-Za-z]/',$_POST['fname'])) {
  redirect_to("../edit.php?edit_fname=true");
}
if ($statement->execute()) {
  redirect_to("../edit.php?edit_profile=true");
} else {
  echo "Error: " . $conn->error;
}