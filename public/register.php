<?php
require_once("../resources/config.php");

if (isset($_POST['user-sign-up'])){
	$username = escape_string($_POST['username']);
	
	/* if username already exists show warning */
	$query = query("SELECT * FROM user WHERE username = '{$username}'");
	confirm($query);
	if (mysqli_num_rows($query) != 0){
		set_message("Username already taken<br>Choose another");
		unset($_POST['user-sign-up']);
		redirect("register.php");
	}

	$email = escape_string($_POST['email']);
	$password = escape_string($_POST['password']);
	$pwd_hash = password_hash($password, PASSWORD_DEFAULT);
	$phone = escape_string($_POST['phone']);
	
	$query = query("INSERT INTO user (username, password_hash, email, phone) VALUES ('{$username}', '{$pwd_hash}', '{$email}', '{$phone}')");
	confirm($query);

	$_SESSION['user'] = $username;

	redirect("user.php?u_name={$username}");
}

include_once(TEMPLATE_FRONT . DS . "header.php");
?>
</head>
<body>
<section class="container register">
	<h2 class="title">Register</h2>
	<?php
	if(isset($_SESSION['message'])){
		echo '<small class="warning">';
		display_message();
		echo '</small>';
	}
	?>
	<form id="register-form" action="register.php" method="post">
		<div class="form-control">
			<input type="text" id="username" name="username" placeholder="Username" required>
			<small class="warning">Error message</small>
		</div>
		<div class="form-control">
			<input type="email" id="email" name="email" placeholder="Email">
			<small class="warning">Error message</small>
		</div>
		<div class="form-control">
			<input type="password" id="password" name="password" placeholder="Password" required>
			<small class="warning">Error message</small>
		</div>
		<div class="form-control">
			<input type="password" id="password2" placeholder="Confirm Password">
			<small class="warning">Error message</small>
		</div>
		<div class="form-control">
			<input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
			<small class="warning">Error message</small>
		</div>
		<button type="submit" class="btn" name="user-sign-up">Sign Up</button>
	</form>
</section>

<script src="js/register_form_validator.js"></script>
</body>
</html>