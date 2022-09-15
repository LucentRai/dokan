<?php
require_once("../resources/config.php");
include_once(TEMPLATE_FRONT . DS . "header.php");

if(!isset($_GET['id'])){
	redirect("listings.php");
}

$listingQuery = query("SELECT * FROM listing WHERE id='" . $_GET['id'] . "'");
confirm($listingQuery);
$listing = mysqli_fetch_array($listingQuery);
echo "<title>" . $listing['name'] . " - Dokan</title>";
?>
	<link rel="stylesheet" href="css/listing-details.css">
</head>
<body>
<?php include_once(TEMPLATE_FRONT . DS . "navigation.php"); ?>
<div class="small-container single-product">
	<span>Categories > Art</span>
	<h1><?php echo $listing['name']; ?></h1>
	<div class="row">
		<div class="col-2">
			<img src="<?php echo $listing['img']; ?>" width="100%" id="ProductImg">
			<!--
			<div class="small-img-row">
				<div class="small-img-col">
					<img onmouseover="showImg(this)" src="<?php echo $listing['img']; ?>" class="small-img">
				</div>
				<div class="small-img-col">
					<img onmouseover="showImg(this)" src="assets/img/gallery-2.jpg" class="small-img">
				</div>
				<div class="small-img-col">
					<img onmouseover="showImg(this)" src="assets/img/gallery-3.jpg" class="small-img">
				</div>
				<div class="small-img-col">
					<img onmouseover="showImg(this)" src="assets/img/gallery-4.jpg" class="small-img">
				</div>
			</div>
-->
		</div>
		<div class="col-2">
			<span class="listing-info">Seller Offer: <span class="currency">रु</span><span class="price"> <?php echo $listing['offered_price']; ?>/-</span><br>
				Highest Bid: <span class="currency">रु</span><span class="highest-bid"> 50.00 /-</span><br>
				Deadline: <span class="deadline">Date</span><br>
				Time till deadline: <span class="remaining-days">days</span>			
			</span>
			<form action="" method="post" class="bid-form">
				<input required class="user-bid" placeholder="Enter bid" type="number" min="<?php echo $listing['offered_price']; ?>" name="bid">
				<input type="submit" value="Bid" class="btn">
			</form>
			<h2>Details</h2>
			<p><?php echo $listing['description']; ?></p>
			<small>Listing ID: </span><code class="listing-id"><?php echo $listing['id']; ?></code>
		</div>
	</div>
</div>

<div class="small-container">
	<div class="row row-2">
		<h2>Similar Listings</h2>
	</div>
</div>
<div class="small-container">
	<div class="row">
		<div class="col-4">
			<img src="assets/img/product-9.jpg" alt="">
			<h4>Red Printed T-shirt</h4>
			<p><span class="currency">रु</span>50.00</p>
		</div>

		<div class="col-4">
			<img src="assets/img/product-10.jpg" alt="">
			<h4>Red Printed T-shirt</h4>
			<p><span class="currency">रु</span>50.00</p>
		</div>

		<div class="col-4">
			<img src="assets/img/product-11.jpg" alt="">
			<h4>Red Printed T-shirt</h4>
			<p><span class="currency">रु</span>50.00</p>
		</div>
		<div class="col-4">
			<img src="assets/img/product-12.jpg" alt="">
			<h4>Red Printed T-shirt</h4>
			<p><span class="currency">रु</span>50.00</p>
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

<!-- js for product gallery -->
<script>
	var ProductImg = document.getElementById("ProductImg");
	var smallImg = document.getElementsByClassName("small-img");
	smallImg[0].onClick = function() {
		ProductImg.src = smallImg[0].src;
	};
	smallImg[1].onClick = function() {
		ProductImg.src = smallImg[1].src;
	};
	smallImg[2].onClick = function() {
		ProductImg.src = smallImg[2].src;
	};
	smallImg[3].onClick = function() {
		ProductImg.src = smallImg[3].src;
	};
	function showImg(i) {
		ProductImg.src = i.src;
	}
</script>
</body>
</html>
