<?php
require_once("../resources/config.php");
include_once(TEMPLATE_FRONT . DS . "header.php");
?>
</head>
<body>
<header>
	<div class="container">
		<?php include_once(TEMPLATE_FRONT . DS . "navigation.php"); ?>
	</div>
</header>
		<!-- Account Page -->
		<div class="account-page">
			<div class="container">
				<div class="row">
					<div class="col-2">
						<div class="form-container">
							<div class="form-btn">
								<span onclick="login()">Login</span>
								<span onclick="register()">Register</span>
								<hr id="indicator" />
							</div>
							<form action="login.php" id="LoginForm">
								<input type="text" placeholder="Username" />
								<input type="password" placeholder="Password" />

								<button type="submit" class="btn">Login</button>
								<a href="">Forgot Password</a>
							</form>
							<form action="register.php" id="RegForm">
								<input type="text" placeholder="Username" />
								<input type="email" placeholder="Email" />
								<input type="password" placeholder="Password" />
								<input type="password" placeholder="Confirm Password" />

								<button type="submit" class="btn">Register</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include_once(TEMPLATE_FRONT . DS . "footer.php"); ?>
		
		<!-- JS for Toggle menu -->
		<script>
			var MenuItems = document.getElementById("MenuItems");

			MenuItems.style.maxHeight = "0px";

			function menutoggle() {
				if (MenuItems.style.maxHeight == "0px") {
					MenuItems.style.maxHeight = "200px";
				} else {
					MenuItems.style.maxHeight = "0px";
				}
			}
		</script>
		<!-- 
js for toggle form -->
		<script>
			var LoginForm = document.getElementById("LoginForm");
			var RegForm = document.getElementById("RegForm");
			var indicator = document.getElementById("indicator");

			function register() {
				RegForm.style.transform = "translateX(0px)";
				LoginForm.style.transform = "translateX(0px)";
				indicator.style.transform = "translateX(100px)";
			}

			function login() {
				RegForm.style.transform = "translateX(300px)";
				LoginForm.style.transform = "translateX(300px)";
				indicator.style.transform = "translateX(0px)";
			}
		</script>
	</body>
</html>