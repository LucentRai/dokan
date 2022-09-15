<?php
require_once("../resources/config.php");

if (isset($_POST['user-login'])){
	$username = escape_string($_POST['username']);
	$user_password = escape_string($_POST['password']);
	$query = query("SELECT * FROM user WHERE username = '{$username}'");
	confirm($query);

	if (mysqli_num_rows($query) == 0){	// username does not match any records
		set_message("Username or password is incorrect.");
		unset($_POST['user-login']);
		redirect("login.php");
	}
	
	$row = mysqli_fetch_array($query);
	if (password_verify($user_password, $row['password_hash'])){
		$_SESSION['user'] = $row['username'];
		redirect("index.php");
	}
}

include_once(TEMPLATE_FRONT . DS . "header.php");
?>
<style>
#login {
	display: block;
	text-align: center;
}
form a {
	color: var(--clr-orange);
}
form a:hover {
	color: var(--clr-mild-red);
}
</style>
</head>
<body>
<div id="login">
	<img src="assets/img/logo-black.png" alt="Dokan Logo" title="home" class="logo"/>
	<h1>Login</h1>
	<span class="warning"><?php display_message(); ?></span>
	
	<form action="login.php" method="post">
		<div class="form-control">
			<input type="text" id="username" name="username" placeholder="Username" required>
		</div>
		<div class="form-control">
			<input type="password" id="password" name="password" placeholder="Password" required>
		</div>
		<button type="submit" class="btn" name="user-login">Login</button>
		<a href="">Forgot Password?</a>
	</form>
</div>
</body>
</html>