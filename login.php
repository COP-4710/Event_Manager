<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

		<title>UCF Events</title>

	</head>

	<body style="background: #a0a0a0;">
		<div class="container-fluid w-25 mt-5" style="border:1px solid #000000; border-radius:10px; background: #ffffff">
			<ul class="nav nav-tabs nav-justified mr-1 mt-4 ml-1">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#loginForm">Log In</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#signupForm">Sign Up</a>
				</li>
			</ul>

			<div class="tab-content mt-3 mb-4">
				<div id="loginForm" class="tab-pane container active">
					<form action ="loginstuff.php" method="POST">
						<div class="form-group">
							<label for="loginEmail">Your Email</label>
							<span id="loginError" class="invalid-feedback ml-4">Invalid email or password</span>
							<input type="email" class="form-control" id="loginEmail" name="loginEmail" placeholder="Email" required>
						</div>
						<div class="form-group">
							<label for="loginPW">Your Password</label>
							<input type="password" class="form-control" id="loginPW" name="loginPW"  placeholder="Password" required>
						</div>
						<button id="loginSubmit" type="submit" class="btn btn-dark w-25">Log In</button>
						<div class="form-check form-check-inline ml-4">
							<input class="form-check-input" type="checkbox" id="remember">
							<label class="form-check-label" for="inlineCheckbox1">Remember me</label>
						</div>
					</form>
				</div>

				<div id="signupForm" class="tab-pane container fade">
					<form action ="signup.php" method="POST">
						<div class="form-group">
							<label for="signupEmail">Your Email</label>
							<input type="email" class="form-control" id="signupEmail" name="signupEmail" placeholder="Email" required>
						</div>
						<div class="form-group">
							<label for="username">username</label>
							<input type="username" class="form-control" id="username" name="username" placeholder="username" required>
						</div>
						<div class="form-group">
							<label for="firstName">First Name</label>
							<input type="firstName" class="form-control" id="firstName" name="firstName" placeholder="firstName" required>
						</div>
												
						<div class="form-group">
							<label for="lastName">Last Name</label>
							<input type="lastName" class="form-control" id="lastName" name="lastName" placeholder="lastName" required>
						</div>
						<div class="form-group">
							<label for="university">University</label>
							<input type="university" class="form-control" id="university" name="university"  placeholder="university" required>
						</div>
						<div class="form-group">
							<label for="signupPW">Enter a Password</label>
							<input type="password" class="form-control" id="signupPW" name="signupPW" placeholder="Password" required>
						</div>
						<div class="form-group">
							<label for="confirmPW">Confirm Password</label>
							<input type="password" class="form-control" id="confirmPW" name="confirmPW" placeholder="Confirm Password" required>
						</div>
						<button id="registerSubmit" type="submit" class="btn btn-dark w-25">Sign Up</button>
						<span id="signupError" class="text-danger ml-4">Enter your email and password</span>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
