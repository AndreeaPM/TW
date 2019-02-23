<?php
require_once "../functions.php";
connect_db();
$sql_6 = "UPDATE autograf SET value= ? WHERE id_a = ?";
$statement = $conn->prepare($sql_6);
$statement->bind_param('si', $_POST['value'],$_GET['id']);
if ((preg_match('/[^0-9]/',$_POST['value']))||($_POST['value']<1)) {
  redirect_to("../edit_auto.php?edit_value=true&id=".$_GET[id]);
}
if ($statement->execute()) {
  redirect_to("../edit_auto.php?edit_profile=true&id=".$_GET[id]);
} else {
  echo "Error: " . $conn->error;
}