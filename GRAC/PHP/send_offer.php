 <?php
  require_once "../functions.php";
 connect_db();
  $selected = $_POST['send'];
  if(empty($selected))
  {
    redirect_to("../send_proposal.php?unselected=true&id=".$_GET[wanted]);
  }
  else
  {  $sum=0;
    $i = count($selected);
    if($i>3)
       {
    redirect_to("../send_proposal.php?unselected=true&id=".$_GET[wanted]);
  }
    for($j = 0; $j < $i; $j++)
    { 
      $sql_3 = "SELECT value FROM autograf WHERE id_a = ?";
$statement = $conn->prepare($sql_3);
$statement->bind_param('s', $selected[$j]);
$statement->execute();
$statement->store_result();
$statement->bind_result($value);
$statement->fetch();
      $sum=$sum+$value;
  }}
   $sql_4 = "SELECT value FROM autograf WHERE id_a = ?";
$statement = $conn->prepare($sql_4);
$statement->bind_param('s', $_GET['wanted']);
$statement->execute();
$statement->store_result();
$statement->bind_result($value);
$statement->fetch();

if(($sum<$value-1000)||($sum>$value+1000))

   {
    redirect_to("../send_proposal.php?unselected=true&id=".$_GET[wanted]);
  }

  $sql_2 = "INSERT INTO requests(id_auto1,id_auto2,id_auto3,id_wanted,id_user) VALUES (?,?,?,?,?)";
  $statement = $conn->prepare($sql_2);
  $statement->bind_param('iiiii',$selected[0],$selected[1],$selected[2],$_GET['wanted'],$_SESSION['user_id']);
  if ($statement->execute()) {
   redirect_to("../bazar.php?dom=All&order=data+desc&a=Filter+them");
 } else {
  echo "Error" . $conn->error;
}

  $conn->close();
