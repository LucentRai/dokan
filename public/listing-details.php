<?php
	require_once("../resources/config.php");
	include_once(TEMPLATE_FRONT . DS . "header.php");

	if(!isset($_GET['id'])){
		redirect("listings.php");
	}

	$listing_query = query("SELECT * FROM listing WHERE id='" . $_GET['id'] . "'");
	confirm($listing_query);
	$listing = mysqli_fetch_array($listing_query);
	
	$listing_query = query("UPDATE listing SET views = {$listing['views']} + 1 WHERE id='{$listing['id']}';");

	echo "<title>" . $listing['name'] . " - Dokan</title>";
?>
	<link rel="stylesheet" href="css/listing-details.css">
</head>
<body>
<?php include_once(TEMPLATE_FRONT . DS . "navigation.php"); ?>
<div class="small-container">
	<span>Categories > Art</span>
	<h1><?php echo $listing['name']; ?></h1>
	<div class="row">
		<div class="col-2">
			<img src="assets/img/listing/user_upload/<?php echo $listing['id']; ?>_0.jpg" width="100%" id="ProductImg">
			<!--
			<div class="small-img-row">
				<div class="small-img-col">
					<img onmouseover="showImg(this)" src="" class="small-img">
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
			<span class="listing-info">Seller Offer: <span class="price">रु <?php echo $listing['offered_price']; ?>/-</span><br>
				<?php
					if($listing['status'] == 0){
						$bid_query = query("SELECT * FROM bid WHERE listing_id='{$listing['id']}';");

						if(mysqli_num_rows($bid_query) == 0){
							echo 'No bid yet<br>';
						}
						else {
							$bid = mysqli_fetch_array($bid_query);
							echo <<<DELIMETER
							Highest Bid: <span class="highest-bid">रु {$bid['highest_price']} /-</span><br>
							DELIMETER;	
						}
					}
				?>
				
				Deadline: <span class="deadline"><?php echo $listing['deadline']; ?></span><br>	
			</span>
			<?php
				if(isset($_SESSION['user'])){
					if($listing['seller_username'] != $_SESSION['user'] && $listing['status'] == 0){
						echo <<<DELIMETER
						<form action="bidding.php?id={$listing['id']}" method="post" class="bid-form">
							<input required class="user-bid" value="{$listing['offered_price']}" type="number" min="'{$listing['offered_price']}'" name="user_bid">
							<input type="submit" name="bid_submit" value="Bid" class="btn">
						</form>
						DELIMETER;
					}
				}
				else {
				echo <<<DELIMETER
					<form action="#">
						<input required class="user-bid" value="{$listing['offered_price']}" type="number" min="'{$listing['offered_price']}'" name="user_bid">
						<button type="button" class="btn" onclick="login_overlay()">Bid</button>
					</form>
					DELIMETER;
				}
			?>
			<h2>Details</h2>
			<p><?php echo $listing['description']; ?></p>
			<small>Listing ID: </span><code class="listing-id"><?php echo $listing['id']; ?></code>
		</div>
	</div>
</div>
<!-- 
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
</div> -->

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