<?php
	session_start();
?>
<?php include("database.php");?>


<!DOCTYPE html>
<html>
	<head>
  		<title>Study Buddy Login Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  		<script src="https://code.jquery.com/jquery-3.6.0.js"integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
	</head>

	<body>
		<div class="container">

			<?php if (isset($_SESSION['success'])) : ?>
      			<div class="error success">
      				<h3>
         				<?php 
          					echo $_SESSION['success']; 
          					unset($_SESSION['success']);
          				?>
      				</h3>
      			</div>
  			<?php endif ?>

			<input type=button value="Sign Up" class="btnreg" onClick="document.location.href='register.php'"></input>
			<input type=button value="Log In" class="btnlogin" onClick="document.location.href='welcome.php'"></input>
	
			<div class="loginheader">
				<h2>Ready to learn again, buddy?<h2>
			</div>

  			<form method="post" action="login_fetch.php">
  				
  				<div class="input-group">
  					<label>Email Address*</label>
  					<input type="text" name="email" id="email">
  				</div>

  				<div class="input-group">
  					<label>Password*</label>
  					<input type="password" name="password" id="password">
  				</div>

  				<div class="input-group">
  					<button type="submit" class="btn" id="login_btn" name="login_user">Login</button>
  				</div>
  			</form>
		</div>
		<?php
                session_unset();
                session_destroy();
            ?>
	</body>
</html>