<!DOCTYPE html>
<html>
	<head>
  		<title>Register to Study Buddy</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  		<script src="https://code.jquery.com/jquery-3.6.0.js"integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        
	</head>	

	<body>
		<div class="container">
			<input type=button value="Sign Up" class="btnreg" onClick="document.location.href='welcome.php'"></input>
			<input type=button value="Log In" class="btnlogin" onClick="document.location.href='login.php'"></input>
	
			<div class="regheader">
				<h2>Join us, buddy!<h2>
			</div>

			<form method="post" action="register_fetch.php">

  				<div class="input-group">
  	  				<label>First Name*</label>
  	  				<input type="text" id="firstname" name="firstname" placeholder="firstname">
  				</div>

    			<div class="input-group">
  	  				<label>Last Name*</label>
                        <input type="text" id="lastname" name="lastname" placeholder="lastname">
  				</div>

  				<div class="input-group">
  	  				<label>Email*</label>
  	  				<input type="email" id="email" name="email" placeholder="email">
  				</div>

  				<div class="input-group">
  	  				<label>Password*</label>
  	  				<input type="password" id="password" name="password_1">
  				</div>

  				<div class="input-group">
  	  				<label>Confirm password</label>
  	 				<input type="password" name="password_2">
  				</div>
				
				<div class="input-subgroup">
					<label>You are a</label>
					<select name="role" id="user">
						<option value="option1">Student</option>
						<option value="option2">Teacher</option>
					</select>
					
				</div>

  				<div class="input-group">
  	  				<button type="submit" id="register_btn" class="btn" name="register_user">GET STARTED</button>
  				</div>
  			</form>
		</div>
	</body>
    <script>
        
        $( "#register_btn" ).click(function(e) {
        e.preventDefault();
        //console.log($("#createForm").serialize());
        $.ajax({
            url: "http://localhost/final_project/register_fetch.php",
            type: "POST",
            data: {
                "first_name": $('#firstname').val(),
                "last_name": $('#lastname').val(), 
                "email": $('#email').val(), 
                "password": $('#password').val(),
                "lms_role": $('#user').val()
            },
            success: function(response){
                //console.log(response);
                if(response.code=='201'){
                    console.log('Created Successfully');
                    location.replace("http://localhost/final_project/login.php");
                }else{
                    console.log('Error');
                }
            }
        });
    });
    </script>
</html>