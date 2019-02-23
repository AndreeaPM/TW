<?php
require_once "../functions.php";
connect_db();
$sql_6 = "UPDATE users SET phone= ? WHERE id = ?";
$statement = $conn->prepare($sql_6);
$statement->bind_param('si', $_POST['phone'],$_SESSION['user_id']);
if(!preg_match("/^0[0-9]{9}$/", $_POST['phone'])) {
 redirect_to("../edit.php?edit_phone=true");
}
if ($statement->execute()) {
  redirect_to("../edit.php?edit_profile=true");
} else {
  echo "Error: " . $conn->error;
}
