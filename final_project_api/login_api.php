<?php 
session_start();
  $db = "project_lms"; //database name
  $dbuser = "root"; //database username
  $dbpassword = ""; //database password
  $dbhost = "localhost"; //database host

  $return["error"] = false;
  $return["message"] = "";
  $return["success"] = false;

  $link = mysqli_connect($dbhost, $dbuser, $dbpassword, $db);

  if(isset($_POST["email"]) && isset($_POST["password"])){
       //checking if there is POST data

       $email = $_POST["email"];
       $password = $_POST["password"];
       $_SESSION['email'] = $email;
       $email = mysqli_real_escape_string($link, $email);
       //escape inverted comma query conflict from string

       $sql = "SELECT * FROM lms_users WHERE email = '$email'";
       //building SQL query
       $res = mysqli_query($link, $sql);
       $numrows = mysqli_num_rows($res);
       //check if there is any row
       if($numrows > 0){
           //is there is any data with that email
           $obj = mysqli_fetch_object($res);
           //get row as object
           if(md5($password) == $obj->password){
               $return["success"] = true;
               $return["first_name"] = $obj->email;
               $return["last_name"] = $obj->email;
           }else{
               $return["error"] = true;
               $return["message"] = "Your password is incorrect.";
           }
       }else{
           $return["error"] = true;
           $return["message"] = 'No email found, please Sign Up or try again.';
       }
  }else{
      $return["error"] = true;
      $return["message"] = 'Send all parameters.';
  }

  mysqli_close($link);

  header('Content-Type: application/json');
  // tell browser that its a json data
  echo json_encode($return);
  //converting array to JSON string
?>