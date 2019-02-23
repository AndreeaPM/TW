<?php
require_once "../functions.php";
connect_db();
$sql_6 = "UPDATE users SET city= ? WHERE id = ?";
$statement = $conn->prepare($sql_6);
$statement->bind_param('si', $_POST['city'],$_SESSION['user_id']);
if (preg_match('/[^A-Za-z]/',$_POST['city'])) {
  redirect_to("../edit.php?edit_city=true");
}
if ($statement->execute()) {
  redirect_to("../edit.php?edit_profile=true");
} else {
  echo "Error: " . $conn->error;
}
