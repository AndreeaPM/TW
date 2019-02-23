<?php
require_once "../functions.php";
connect_db();
$sql_5="delete from users where id=?";
$statement = $conn->prepare($sql_5);
$statement->bind_param('i', $_SESSION['user_id']);
$statement->execute();
if ($statement->execute()) {
  redirect_to("../index.php?delete_message=true");
} else {
  redirect_to("../profile.php?delete_error=true");
}
$conn->close();


