<?php 
  $db = "project_lms"; //database name
  $dbuser = "root"; //database username
  $dbpassword = ""; //database password
  $dbhost = "localhost"; //database host

  $return["error"] = false;
  $return["message"] = "";

  $link = mysqli_connect($dbhost, $dbuser, $dbpassword, $db);
  //connecting to database server

  $val = isset($_POST["firstname"]) && isset($_POST["lastname"])
         && isset($_POST["email"]) && isset($_POST["password"]);

  if($val){
       //checking if there is POST data

       $firstname = $_POST["firstname"];
       $lastname = $_POST["lastname"];
       $email = $_POST["email"];
       $password = $_POST["password"];

       //validation name if there is no error before
       if($return["error"] == false && strlen($firstname) < 1){
        $return["error"] = true;
        $return["message"] = "First Name must be at least 1 character.";
       }

       if($return["error"] == false && strlen($lastname) < 1){
        $return["error"] = true;
        $return["message"] = "Last Name must be at least 1 character.";
       }

    //    if($return["error"] == false && !eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
    //     $return["error"] = true;
    //     $return["message"] = "Please enter a valid email address.";
    //    }

       if($return["error"] == false && strlen($password) < 3){
           $return["error"] = true;
           $return["message"] = "Password must be more than 3 characters.";
       }

       //add more validations here

       //if there is no any error then ready for database write
       if($return["error"] == false){
            $first_name = mysqli_real_escape_string($link, $firstname);
            $last_name = mysqli_real_escape_string($link, $lastname);
            $newemail = mysqli_real_escape_string($link, $email);
            $newpassword = mysqli_real_escape_string($link, md5($password));
            $lms_role = "option1";
            //escape inverted comma query conflict from string

            $sql = "INSERT INTO lms_users (first_name, last_name, email, password, lms_role) 
            VALUES('$first_name', '$last_name', '$newemail', '$newpassword', '$lms_role')";
                                
            //student_id is with AUTO_INCREMENT, so its value will increase automatically

            $res = mysqli_query($link, $sql);
            if($res){
                //write success
            }else{
                $return["error"] = true;
                $return["message"] = "Database error";
            }
       }
  }else{
      $return["error"] = true;
      $return["message"] = 'Send all parameters.';
  }

  mysqli_close($link); //close mysqli

  header('Content-Type: application/json');
  // tell browser that its a json data
  echo json_encode($return);
  //converting array to JSON string
?>