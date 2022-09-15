<?php
require_once("../resources/config.php");
if(isset($_GET['u_name'])){
	$check_username = "SELECT COUNT(username) FROM user WHERE username='{$_GET['u_name']}';";
	$userExist = query($check_username);
	confirm($userExist);
	if($userExist->field_count == 0){	// if no such user exists
		$error_code = 'nonexistent_user';
	}
}
include_once(TEMPLATE_FRONT . DS . "header.php");
if(isset($error_code)){
	include_once(TEMPLATE_FRONT . DS . "error.php");
	echo <<< DELIMETER
		<title></title>
	DELIMETER;
}
?>
</head>
<body>
<?php
	include_once(TEMPLATE_FRONT . DS . "navigation.php");
	
	if(isset($error_code)){
	}
	else{
	}
	?>
<div class="container">
	<aside>
		<span class="greeting">Namaste, <?php echo "username"; ?></span>
		<ul>
			<li>
				<h2>Manage My Posts</h2>
				<ul>
					<li><a href="">Current Listings</a></li>
					<li><a href="">Previous Listings</a></li>
				</ul>
			</li>
			<li>
				<h2>My Bid</h2>
				<ul>
					<li><a href="">Current Bidding</a></li>
					<li><a href="">Bid History</a></li>
				</ul>
			</li>
			<li>
				<h2>My Account</h2>
				<ul>
					<li><a href="">My Profile</a></li>
					<li><a href="">Account Setting</a></li>
				</ul>
			</li>
		</ul>
	</aside>
	<main>
		<h1 class="title">Manage My Posts</h1>
	</main>
</div>
</body>
</html>