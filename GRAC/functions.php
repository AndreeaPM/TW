<!DOCTYPE html>
<html>
<body>
  <link rel="stylesheet" type="text/css" href="index.css">
  <?php
  session_start();
  function connect_db() {
    $server="localhost";
    $username="root";
    $pass="";
    global $conn;
    $name_db="Grac";
 	// create a connection
    $conn = new mysqli($server, $username, $pass, $name_db);
    // check connection for errors
    if ($conn->connect_error) {
      die('Eroare'. $conn->connect_error);}
    }
    function redirect_to($url) {
      header("Location:" . $url);
      exit();
    }
    function is_registered() {
     if(isset($_GET['registered']))
       {echo "Account created successfully! Please login.";}
   }
   function is_login() {
     if(isset($_GET['login_error']))
       {echo "Login unsuccesfull. Please retry.";}
   }
   function is_auth() {
    $is_on=isset($_SESSION['user_id']);
    if(!$is_on) 
    	redirect_to("index.php?logged=true");
  }
  function not_logged() {
    if(isset($_GET['logged']))
     {echo "You must login for access.";}
 }
 function logged_out() {
 	if(isset($_GET['logged_out'])) {
 		echo "Disconnected successfully."; }
 	}
  
  function delete_message()
  {
   if(isset($_GET['delete_message'])) {
    echo "Successfully deleted!"; } 
  }
  function edit_profile()
  {
   if(isset($_GET['edit_profile'])) {
    echo "Change applied!"; } 
  }
  function cont_create() {
    if(isset($_GET['edit_pass'])) {
      echo "Passwords are different or smaller than 6 characters!"; } 
      if(isset($_GET['edit_fname'])) {
        echo "Name must contain only letters!"; }   
        if(isset($_GET['edit_age'])) {
          echo "Age invalid!"; }
          if(isset($_GET['edit_email'])) {
            echo "Email invalid!"; }
            if(isset($_GET['edit_phone'])) {
              echo "Phone invalid!"; }
              if(isset($_GET['edit_city'])) {
                echo "City names must contain only letters!"; }
                if(isset($_GET['edit_username'])) {
                  echo "Username must contain only letters and digits!<br> Username must be unique!"; }
                }

                function edit_value()
                {
                 if(isset($_GET['edit_value'])) {
                  echo "Value must be in RON!"; } 
                }
                function unselected()
                {
                 if(isset($_GET['unselected'])) {
                  echo "Incorrect selection!"; } 
                }

                function order() {
                  
                  $domeniu=$_GET["dom"];
                  $ordine=$_GET["order"];
                  if($domeniu=="All") {
                   $sel="";
                 }
                 else {
                   $sel="where domain like '$domeniu'";}
                   $newsql="SELECT id_a,id_user,artist,domain,descriere,adaugare,photo,value from autograf $sel order by $ordine";
                   return $newsql;
                 }
                 ?>

               </body>
               </html>