<?php
require_once "../functions.php";
  session_destroy();
  redirect_to("../index.php?logged_out=true");


