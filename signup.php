

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login to Access Secure Area</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/8130a4426f.js" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/8130a4426f.js" crossorigin="anonymous"></script>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/mainlogin.css">
<!--===============================================================================================-->
	<script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>

<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            header("location:login.php");
        } else {
            header("location:signup.php");
        }
    } else {
?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title">
						Signup
					</span>

					<div class="wrap-input100 validate-input">
						<!---------->
						<input type="text" name="username" placeholder="Username" class="input100" id="username" required>
						<!---------->
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="far fa-id-badge" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input">
						<!---------->
						<input type="text" name="email" placeholder="Email Address" class="input100" id="email" required>
						<!---------->
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<!---------->
						<input type="password" name="password" placeholder="Password" class="input100" id="password" required>
						<!---------->
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="g-recaptcha brochure__form__captcha" data-sitekey="6LcAYs4dAAAAAI6oZnN1T6urQpXGeRcnkLUcLXha"></div>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" type="submit" value="Register" name="signup"/>

						<p>Already have an account? <a href="login.php">Login</a></p>
					</div>



					<?php
    }
?>
					

				<br><br><br><br><br><br><br>
					
				</form>


			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/mainlogin.js"></script> 


</body>
</html>