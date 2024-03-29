<?php
require_once("../../resources/config.php");
include_once(TEMPLATE_FRONT . DS . "admin-header.php");

?>
<title>Dokan - Admin Sign in</title>
<style>
	html,
	body {
	height: 100%;
	}

	body {
		display: flex;
		align-items: center;
		padding-top: 40px;
		padding-bottom: 40px;
		background-color: #f5f5f5;
	}

	.form-signin {
		width: 100%;
		max-width: 330px;
		padding: 15px;
		margin: auto;
	}

	.form-signin .checkbox {
		font-weight: 400;
	}

	.form-signin .form-floating:focus-within {
		z-index: 2;
	}

	.form-signin input[type="email"] {
		margin-bottom: -1px;
		border-bottom-right-radius: 0;
		border-bottom-left-radius: 0;
	}

	.form-signin input[type="password"] {
		margin-bottom: 10px;
		border-top-left-radius: 0;
		border-top-right-radius: 0;
	}
	.bd-placeholder-img {
		font-size: 1.125rem;
		text-anchor: middle;
		-webkit-user-select: none;
		-moz-user-select: none;
		user-select: none;
	}

	@media (min-width: 768px) {
		.bd-placeholder-img-lg {
			font-size: 3.5rem;
		}
	}
</style>
</head>
<body>
	<?php
		if(isset($_SESSION['admin'])){
			include_once('dashboard.php');
		}
		else if(isset($_POST['username'])){
			$query = query("SELECT * FROM admin WHERE username='{$_POST['username']}' AND password_hash='{$_POST['password']}'");
			if(mysqli_num_rows($query) == 0){
				echo <<<DELIMETER
					<main class="form-signin">
						<form action="admin/index.php" method="post">
						<img class="mb-4" src="assets/img/logo-black.png" alt="Dokan Logo">
						<h1 class="h3 mb-3 fw-normal">Admin sign in</h1>
						<div class="form-floating">
						<input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username" required>
						<label for="floatingInput">Username</label>
						</div>
						<div class="form-floating">
						<input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
						<label for="floatingPassword">Password</label>
						</div>
					
						<!-- <div class="checkbox mb-3">
						<label>
							<input type="checkbox" value="remember-me"> Remember me
						</label>
						</div> -->
						<button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
						<p class="mt-5 mb-3 text-muted">dokan.com &copy; 2022</p>
						</form>
					</main>
				DELIMETER;
			}
			else{
				$_SESSION['admin'] = $_POST['username'];
				include_once('dashboard.php');
			}
		}
		else{echo <<<DELIMETER
			<main class="form-signin">
				<form action="admin/index.php" method="post">
				<img class="mb-4" src="assets/img/logo-black.png" alt="Dokan Logo">
				<h1 class="h3 mb-3 fw-normal">Admin sign in</h1>
				<div class="form-floating">
				<input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username" required>
				<label for="floatingInput">Username</label>
				</div>
				<div class="form-floating">
				<input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
				<label for="floatingPassword">Password</label>
				</div>
			
				<!-- <div class="checkbox mb-3">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
				</div> -->
				<button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
				<p class="mt-5 mb-3 text-muted">dokan.com &copy; 2022</p>
				</form>
			</main>
		DELIMETER;
		}
	?>
<!-- <script src="js/bootstrap.min.js"></script> -->
</body>
</html>