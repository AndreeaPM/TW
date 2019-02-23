<?php
require_once "../functions.php";
connect_db();
$sql_6 = "UPDATE users SET email= ? WHERE id = ?";
$statement = $conn->prepare($sql_6);
$statement->bind_param('si', $_POST['email'],$_SESSION['user_id']);
if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
	redirect_to("../edit.php?edit_email=true");
}
if ($statement->execute()) {
	redirect_to("../edit.php?edit_profile=true");
} else {
	echo "Error: " . $conn->error;
}
