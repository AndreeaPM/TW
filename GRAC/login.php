<?php
require_once "../functions.php";
connect_db();
$sql_3 = "SELECT id, trim(username), trim(pass) FROM users WHERE username = ?";
$statement = $conn->prepare($sql_3);
$statement->bind_param('s', $_POST['username']);
$statement->execute();
$statement->store_result();
$statement->bind_result($id, $username, $passw);
$statement->fetch();
if ($statement->execute()) {
  $pass=password_verify($_POST['pass'],$passw);
  if($pass) {
    $_SESSION['user_id'] = $id;
    $_SESSION['user_username'] = $username;
    redirect_to("../profile.php");
  } else {
    redirect_to("../index.php?login_error=true");
  }
} else {
  echo "Error:" . $conn->error;
}
$conn->close();