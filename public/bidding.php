<?php
	require_once("../resources/config.php");
	include_once(TEMPLATE_FRONT . DS . "header.php");

	if(!isset($_GET['id']) || !isset($_POST['user_bid'])){
		redirect("listings.php");
	}

	$listing_query = query("SELECT * FROM listing WHERE id='" . $_GET['id'] . "'");
	confirm($listing_query);
	$listing = mysqli_fetch_array($listing_query);

	$bid_query = query("SELECT * FROM bid WHERE listing_id='{$_GET['id']}';");
	if(mysqli_num_rows($bid_query) == 0){
		$bid_query = query("INSERT INTO bid (listing_id, highest_price, username) VALUES ('" . $listing['id'] . "', " . $_POST['user_bid'] . ", '" . $_SESSION['user'] . "');");
	}
	else {
		$bid_query = query("UPDATE bid SET highest_price = " . $_POST['user_bid'] . " , username = '" . $_SESSION['user'] . "' WHERE bid.listing_id ='". $listing['id'] . "'");
	}
	echo "<title>Bid " . $listing['name'] . " - Dokan</title>";
?>
</head>
<body>
<?php include_once(TEMPLATE_FRONT . DS . "navigation.php"); ?>
<div class="small-container">
	<span><?php echo $listing['name']; ?></span>
	<h1 style="color:var(--clr-yellow);">You Bid रु <span class="price"><?php echo $_POST['user_bid']; ?> /-</span></h1>
	<div class="row">
		<div class="col-2">
			<img src="assets/img/listing/user_upload/<?php echo $listing['id']; ?>_0.jpg" width="100%" id="ProductImg">
		</div>
		<div class="col-2">
			<span class="listing-info">Seller Offer: <span class="currency">रु</span><span class="price"> <?php echo $listing['offered_price']; ?>/-</span><br>
				Deadline: <span class="deadline"><?php echo $listing['deadline']; ?></span><br>
			<h2>Details</h2>
			<p><?php echo $listing['description']; ?></p>
			<small>Listing ID: </span><code class="listing-id"><?php echo $listing['id']; ?></code>
		</div>
	</div>
</div>
<?php include_once(TEMPLATE_FRONT . DS . "footer.php"); ?>
</body>
</html>