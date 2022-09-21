<?php
if (isset($_SESSION['user'])){
	$logged_in = true;
}
else {
	$logged_in = false;
}
if(!$logged_in){
	echo <<<DELIMETER
	<div id="overlay" onClick="login_overlay_off()">
	</div>
	<div id="login">
		<h1>Login</h1>
		<form action="login.php" method="post">
			<div class="form-control">
				<input type="text" id="username" name="username" placeholder="Username" required>
			</div>
			<div class="form-control">
				<input type="password" id="password" name="password" placeholder="Password" required>
			</div>
			<button type="submit" class="btn" name="user-login">Login</button>
		</form>
	</div>
	DELIMETER;
}
?>
<div class="navbar">
	<a href="index.php"><img src="assets/img/logo-white.png" alt="Dokan Logo" title="home" class="logo"/></a>
	<div class="search">
		<input type="text" class="search-input" aria-label="search" placeholder="Search">
		<button class="search-submit" aria-label="submit search"><svg enable-background="new 0 0 32 32" id="Glyph" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M27.414,24.586l-5.077-5.077C23.386,17.928,24,16.035,24,14c0-5.514-4.486-10-10-10S4,8.486,4,14  s4.486,10,10,10c2.035,0,3.928-0.614,5.509-1.663l5.077,5.077c0.78,0.781,2.048,0.781,2.828,0  C28.195,26.633,28.195,25.367,27.414,24.586z M7,14c0-3.86,3.14-7,7-7s7,3.14,7,7s-3.14,7-7,7S7,17.86,7,14z" id="XMLID_223_"/></svg></button>
	</div>
	<nav>
		<ul id="MenuItems">
			<?php
				if ($logged_in){
					echo <<<DELIMETER
						<li><a href="user.php?u_name={$_SESSION['user']}&page=user_add_post" title="Add a Post"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="25px" height="25px" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M17 19.22H5V7h7V5H5c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-7h-2v7.22z"/><path fill="currentColor" d="M19 2h-2v3h-3c.01.01 0 2 0 2h3v2.99c.01.01 2 0 2 0V7h3V5h-3V2zM7 9h8v2H7zm0 3v2h8v-2h-3zm0 3h8v2H7z"/></svg></a></li>
						<li><a href="user.php?u_name={$_SESSION['user']}" >{$_SESSION['user']} Account</a></li>
						<li><a href="listings.php">Listings</a></li>
						<li><a href="../resources/templates/back/logout.php" title="Log out">Log out <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8m4-9l-4-4m4 4l-4 4m4-4H9"/></svg>
					</a></li>
					DELIMETER;
				}
				else {
					echo <<<DELIMETER
						<li><a style="cursor:pointer"  onclick="login_overlay()">Log in</a></li>
						<li><a href="register.php">Register</a></li>
						<li><a href="listings.php">Listings</a></li>
						<li><a href="about.php">About us</a></li>
					DELIMETER;
				}
			?>
		</ul>
	</nav>
	<img src="assets/img/menu.png" alt="" class="menu-icon" onclick="menutoggle()" />
</div>