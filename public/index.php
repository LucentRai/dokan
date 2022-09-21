<?php
require_once("../resources/config.php");
include_once(TEMPLATE_FRONT . DS . "header.php");

$categoryQuery = query("SELECT * FROM category");	
confirm($categoryQuery);

$popular_listing_query = query("SELECT * FROM listing ORDER BY views desc limit 4;");
confirm($popular_listing_query);

?>
	<title>Dokan - Auction Store</title>
	<link rel="stylesheet" href="css/home.css">
</head>
<body>
<?php include_once(TEMPLATE_FRONT . DS . "navigation.php"); ?>
<section class="container hero">
		<div class="hero-div">
			<img alt="" title="" src="assets/img/hero-img.png" class="hero-img">
			<div class="hero-info">
			<h1>The Monk</h1>
			<span>by Ram Narayan</span>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas rerum maiores animimage1i officiis</p>
			<a href="" class="btn">Explore Now &#8594;</a>
			</div>
		</div>
		<div class="popular-listing-catalog">
			<h2 class="title">Popular Listings</h2>
			<div class="listing-gallery">
			<?php
			while($popular_listing = mysqli_fetch_array($popular_listing_query)){
				echo <<<DELIMETER
					<a class="popular-listing-tile" href="listing-details.php?id={$popular_listing['id']}">
						<img src="assets/img/listing/user_upload/{$popular_listing['id']}_0.jpg">
						<div class="tile-overlay">
						</div>
						<div class="listing-info">
							<h3 class="listing-name">Lorem ipsum dolor</h3>
							<span class="listing-description">Vivamus justo ligula, dictum et nulla quis, blandit ornare nulla. Aenean at faucibus sem</span>
						</div>
					</a>
				DELIMETER;
			}
			?>
			</div>
		</div>
</section>
<section class="container categories">
	<h2 class="title">Categories</h2>
	<div class="small-container">
		<div class="row">
			<?php
			while($row = mysqli_fetch_array($categoryQuery)){
				echo <<<DELIMETER
				<a href="listings.php?cat_id={$row['id']}" class="col-3">
					<div class="category">
						<img src="{$row['img']}" alt="{$row['name']}" title="{$row['name']} category">
						<h3>{$row['name']}</h3>
					</div>
				</a>
				DELIMETER;
			}
			?>
		</div>
	</div>
</section>
<section class="container rare-items">
	<h2 class="title">Discover Rare Items</h2>
	<div class="gallery">
		<figure class="gallery__item gallery__item--1">
			<img src="assets/img/listing/1.png" alt="Gallery image 1" class="gallery__img">
		</figure>
		<figure class="gallery__item gallery__item--2">
			<img src="assets/img/listing/antique.jpg" alt="Gallery image 2" class="gallery__img">
		</figure>
		<figure class="gallery__item gallery__item--3">
			<img src="assets/img/listing/cup.jpg" alt="Gallery image 3" class="gallery__img">
		</figure>
		<figure class="gallery__item gallery__item--4">
			<img src="assets/img/listing/painting.jpg" alt="Gallery image 4" class="gallery__img">
		</figure>
		<figure class="gallery__item gallery__item--5">
			<img src="assets/img/listing/piano.jpg" alt="Gallery image 5" class="gallery__img">
		</figure>
		<figure class="gallery__item gallery__item--6">
			<img src="assets/img/listing/table.jpg" alt="Gallery image 6" class="gallery__img">
		</figure>
	</div>
</section>
<?php
if (!$logged_in){
	echo <<<DELIMETER
	<section class="container register">
		<h2 class="title">Register</h2>
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
	DELIMETER;
}

include_once(TEMPLATE_FRONT . DS . "footer.php");
?>

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
<script src="js/register_form_validator.js"></script>
</body>
</html>