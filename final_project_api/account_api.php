<?php 
  $db = "project_lms"; //database name
  $dbuser = "root"; //database username
  $dbpassword = ""; //database password
  $dbhost = "localhost"; //database host

  $return["error"] = false;
  $return["message"] = "";
  $return["success"] = false;

  $link = mysqli_connect($dbhost, $dbuser, $dbpassword, $db);

  
?>