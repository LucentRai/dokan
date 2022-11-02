<?php
require_once("../resources/config.php");
include_once(TEMPLATE_FRONT . DS . "header.php");

if(isset($_GET['cat_id'])){	// show specific category of listings
	$listingQuery = query("SELECT * FROM listing WHERE category={$_GET['cat_id']} AND status = 0;");
	$category = query("SELECT * FROM category WHERE id=". $_GET['cat_id']);
	confirm($category);
	$category = mysqli_fetch_array($category);
	$page_title = "Category - " . $category['name'];
}
else{	// show all listings
	$listingQuery = query("SELECT * FROM listing WHERE status = 0;");
	$page_title = "All Listings - Dokan";
}
confirm($listingQuery);
$total_listing = mysqli_num_rows($listingQuery);

echo "<title>" . $page_title . "</title>";
?>
	<link rel="stylesheet" href="css/listings.css">
</head>
<body>
<?php include_once(TEMPLATE_FRONT . DS . "navigation.php"); ?>
<div class="container">
	<div class="row">
		<h2 class="title"><?php echo $page_title; ?></h2>
		<!-- <select name="" id="">
			<option value="">Sort by Latest</option>
			<option value="">Sort by Price</option>
			<option value="">Sort by Popularity</option>
		</select> -->
	</div>
	<?php
	/************ Print gallery one row at a time ************/
	for($item_in_row = 3, $rows = (int)($total_listing / $item_in_row) + 1; $rows != 0; $rows--){
		echo '<div class="gallery-row">';

		for($i = 0; $i < $item_in_row && $listing = mysqli_fetch_array($listingQuery); $i++){
			echo <<<DELIMETER
			<a class="listing" href="listing-details.php?id={$listing['id']}">
					<div class="info-overlay">
						<h3>{$listing['name']}</h3>
						<p>{$listing['description']}</p>
					</div>
					<img src="assets/img/listing/user_upload/{$listing['id']}_0.jpg" alt="{$listing['name']}">
			</a>
			DELIMETER;
		}
		
		echo '</div>';
	}
	?>
	<!-- <div class="page-num">
		<span class="page-btn" id="page-btn-current" title="This Page">1</span>
		<span class="page-btn">2</span>
		<span class="page-btn">3</span>
		<span class="page-btn">4</span>
		<span class="page-btn" title="Last Page">&#8594;</span>
	</div> -->
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
</body>
</html>