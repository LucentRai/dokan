<?php
	$bidding_query = query("SELECT * FROM bid INNER JOIN listing ON bid.listing_id=listing.id WHERE bid.username='{$_SESSION['user']}' AND listing.status=0");
	confirm($bidding_query);

?>

<h1 class="title">Currently Bidding</h1>
<?php
while($bid = mysqli_fetch_array($bidding_query)){
	echo <<<DELIMETER
		<a href="listing-details.php?id={$bid['listing_id']}">
			<div class="container themed-container bg-secondary mb-3">
				<h3>{$bid['name']}</h3>
				<img src="assets/img/listing/user_upload/{$bid['id']}_0.jpg" class="img-thumbnail" alt="{$bid['name']}">
			</div>
		</a>
	DELIMETER;
}

?>