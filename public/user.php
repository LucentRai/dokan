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
<link rel="stylesheet" href="css/user.css">
</head>
<body>
<?php
	include_once(TEMPLATE_FRONT . DS . "navigation.php");
	
	if(isset($error_code)){
	}
	else{
		$link_heading = array ("Manage My Posts", "My Bid", "My Account");
		$link = array (
			array("user_add_post", "Add Listings", 0),
			array("user_post", "All Listings", 0),
			array("user_bid", "Current Bidding", 1),
			array("user_profile", "My Profile", 2),
			array("user_account", "Account Setting", 2)
		);
	}
	?>
<div class="container">
	<aside>
		<span class="greeting">Namaste, <?php echo $_SESSION['user']; ?></span>
		<ul>
			<?php
			for($i = 0, $heading_count = count($link_heading); $i < $heading_count; $i++){
				echo '<h2>' . $link_heading[$i] . '</h2>';
				for($j = 0, $link_count = count($link); $j < $link_count; $j++){
					$l = $link[$j];
					if($l[2] == $i){
						echo '<li><a href="user.php?u_name='. $_SESSION['user'] . '&page=' . $l[0] . '" ';
						if(isset($_GET['page']) && $_GET['page'] == $l[0]){
							echo 'style="color:var(--clr-dark-grey);"';
						}
						echo '>' . $l[1] . '</a></li>';
					}
				}
			}
			?>
		</ul>
	</aside>
	<main>
		<?php
		if(isset($_GET['page'])){
			switch($_GET['page']){
				case $link[0][0]:
					include_once(TEMPLATE_FRONT . DS . $link[0][0] . '.php');
					break;
				case $link[1][0]:
					include_once(TEMPLATE_FRONT . DS . $link[1][0] . '.php');
					break;
				case $link[2][0]:
					include_once(TEMPLATE_FRONT . DS . $link[2][0] . '.php');
					break;
				case $link[3][0]:
					include_once(TEMPLATE_FRONT . DS . 'user_my_profile.php');
					break;
				case $link[4][0]:
					include_once(TEMPLATE_FRONT . DS . $link[4][0] . '.php');
					break;
				default:
					redirect('user.php');
					break;
			}
		}
		else {
			include_once(TEMPLATE_FRONT . DS . 'user_my_profile.php');
		} 
		?>
	</main>
</div> <!-- div.container -->
</body>
</html>