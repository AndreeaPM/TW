<?php
require_once "../functions.php";
connect_db();
$sql_6 = "UPDATE users SET age= ? WHERE id = ?";
$statement = $conn->prepare($sql_6);
$statement->bind_param('si', $_POST['age'],$_SESSION['user_id']);
if ((preg_match('/[^0-9]/',$_POST['age']))||($_POST['age']<13)||($_POST['age']>150)) {
  redirect_to("../edit.php?edit_age=true");
}
if ($statement->execute()) {
  redirect_to("../edit.php?edit_profile=true");
} else {
  echo "Error: " . $conn->error;
}