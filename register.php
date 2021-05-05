<?php  
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>


<html>
<head>
	<title>Welcome to Swirlfeed!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
	integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<script src="assets/js/register.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" 
	ntegrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" crossorigin="anonymous">
</head>
<body class="abody">

	<?php  

	if(isset($_POST['register_button'])) {
		echo '
		<script>

		$(document).ready(function() {
			$("#first").hide();
			$("#second").show();
		});

		</script>

		';
	}


	?>

	<div class="wrapper">
		<div class="login_box">
			<div class="login_header"> 
				<h1>
				Welcome to Swirlfeed
				</h1> 
				<p>
				Share your memories, connect with others, make new friends
				</p> 
			</div>
			<br>
			<div class="row">
				<div class="col-md-6 col-lg-7">
					<img style="width: 100%;max-height: 500px;" src="./assets/images/backgrounds/drawkit-nature-man-colour.svg">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="card card-register">
						<div id="first" class="register-panel">
							<div class="p-header">
								<h4 style="position: relative;font-size: 4em;font-weight: 900;color: red;text-transform: lowercase;margin-left: -5px;">Login</h4>
							</div>
							<div class="p-body">
								<form action="register.php" method="POST" class="js_ajax-forms">
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-prepend" style="margin-top:5px">
												<span class="input-group-text">
													<i class="fas fa-user fa-fw" aria-hidden="true"></i>
												</span>
											</div>
											
											<input type="email" name="log_email" placeholder="Email Address" class="form-control" value="<?php 
												if(isset($_SESSION['log_email'])) {
												echo $_SESSION['log_email'];
												} 
											?>" required>
										</div>
									</div>
									
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-prepend" style="margin-top:5px">
												<span class="input-group-text">
													<i class="fas fa-key fa-fw" aria-hidden="true"></i>
												</span>
											</div>
											<input type="password" name="log_password" placeholder="Password" class="form-control" <?php if(in_array("Email or password was incorrect<br>", $error_array)) echo  "Email or password was incorrect<br>"; ?>>
											<br>
											
										</div>
									</div>
									
									<div class="form-group">
										<input type="submit" name="login_button" class="btn btn-block btn-primary bg-gradient-blue border-0 rounded-pill" style="font: 400 2rem Arial;"
										value="Login">
									</div>
									
									<br>
									<a href="#" id="signup" class="signup">Need and account? Register here!</a>
								</form>
							</div>
							

						</div>
						<div id="second"  class="register-panel">

						<form action="register.php" method="POST" class="js_ajax-forms">
							<div class="form-group">
										<div class="input-group">
											<div class="input-group-prepend" style="margin-top:5px">
												<span class="input-group-text">
													<i class="fas fa-user fa-fw" aria-hidden="true"></i>
												</span>
											</div>
											
											<input type="text" name="reg_fname" placeholder="First Name" value="<?php 
											if(isset($_SESSION['reg_fname'])) {
											echo $_SESSION['reg_fname'];
											} 
											?>" required><br>
											<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-prepend" style="margin-top:5px">
												<span class="input-group-text">
													<i class="fas fa-key fa-fw" aria-hidden="true"></i>
												</span>
											</div>
											<input type="text" name="reg_lname" placeholder="Last Name" value="<?php 
						if(isset($_SESSION['reg_lname'])) {
							echo $_SESSION['reg_lname'];
						} 
						?>" required>
						<br>
						<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>
											<br>
											
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-prepend" style="margin-top:5px">
												<span class="input-group-text">
													<i class="fas fa-key fa-fw" aria-hidden="true"></i>
												</span>
											</div>
											<input type="email" name="reg_email" placeholder="Email" value="<?php 
						if(isset($_SESSION['reg_email'])) {
							echo $_SESSION['reg_email'];
						} 
						?>" required>											
						<br>
											
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-prepend" style="margin-top:5px">
												<span class="input-group-text">
													<i class="fas fa-key fa-fw" aria-hidden="true"></i>
												</span>
											</div>
											<input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
						if(isset($_SESSION['reg_email2'])) {
							echo $_SESSION['reg_email2'];
						} 
						?>" required>											
						<br>
											
										</div>
									</div>
							<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>"; 
						else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>";
						else if(in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>"; ?>
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-prepend" style="margin-top:5px">
												<span class="input-group-text">
													<i class="fas fa-user fa-fw" aria-hidden="true"></i>
												</span>
											</div>
											
											<input type="password" name="reg_password" placeholder="Password" required>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-prepend" style="margin-top:5px">
												<span class="input-group-text">
													<i class="fas fa-user fa-fw" aria-hidden="true"></i>
												</span>
											</div>
											
											<input type="password" name="reg_password2" placeholder="Confirm Password" required>
										</div>
									</div>

						<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>"; 
						else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
						else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "Your password must be betwen 5 and 30 characters<br>"; ?>

						<div class="form-group">
										<input type="submit" name="register_button" class="btn btn-block btn-primary bg-gradient-blue border-0 rounded-pill" style="font: 400 2rem Arial;"
										value="Register">
									</div>

						<?php if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>", $error_array)) echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>"; ?>
						<!-- Chưa có đường dẫn -->
						<a href="#" id="signin" class="signin">Already have an account? Sign in here!</a>
						</form>
						</div>
					</div>
				</div>
				
			</div>

		</div>
	</div>

</body>
</html>