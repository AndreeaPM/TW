
<?php
require_once "../functions.php";
connect_db();
$sql_6 = "UPDATE users SET pass= ? WHERE id = ?";
if(($_POST['pass']!=$_POST['cpass'])||(strlen($_POST['pass'])<6)||(strlen($_POST['pass'])>20)) {redirect_to("../edit.php?edit_pass=true");}
$statement = $conn->prepare($sql_6);
$statement->bind_param('si', password_hash($_POST['pass'], PASSWORD_DEFAULT),$_SESSION['user_id']);
if ($statement->execute()) {
	redirect_to("../edit.php?edit_profile=true");
} else {
	echo "Error: " . $conn->error;
}
