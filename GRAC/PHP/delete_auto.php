<?php
require_once "../functions.php";
connect_db();
$sql_5="delete from autograf where id_a=?";
$statement = $conn->prepare($sql_5);
$statement->bind_param('i', $_GET['id']);
$statement->execute();
if ($statement->execute()) {
	redirect_to("../profile.php?delete_message=true");
} 
$conn->close();


