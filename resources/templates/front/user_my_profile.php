<?php
	echo '<h1 class="title">Manage My Posts</h1><div class="grid">';

	/************* CURRENT LISTING *************/
	// selects the most recent post by user where status=0 means that deadline is not reached
	$cur_listing_query = "SELECT * FROM listing WHERE seller_username='{$_SESSION['user']}' ORDER BY post_date_time desc limit 1;";
	$cur_listing = query($cur_listing_query);
	confirm($cur_listing);
	if(mysqli_num_rows($cur_listing) == 0){ // if user has not posted anything where deadline is not reached
		echo <<<DELIMETER
			<div class="grid-cell">
				<h3>Current Listing</h3>
				<h1 class="title">No Post</h1>
			</div>
		DELIMETER;
	}
	else{
		$cur_listing = mysqli_fetch_array($cur_listing);
		$offered_price = number_format($cur_listing['offered_price'], 0, ".", ",");

		echo <<<DELIMETER
			<div class="grid-cell">
				<h3>Current Listing</h3>
				<h4>{$cur_listing['name']}</h4>
				<div class="listing-detail">
					<div class="thumb-container">
						<img class="thumb" src="assets/img/listing/user_upload/{$cur_listing['id']}_0.jpg" title="{$cur_listing['name']}" alt="{$cur_listing['name']}">
					</div>
					<p>{$cur_listing['description']}</p>
				</div>
				<ul class="info">
					<li>Offered Price: <span class="price">रू {$offered_price} /-</span></li>
				</ul>
			</div>
		DELIMETER;
	}

	/************* PREVIOUS LISTING *************/
	// selects the most recent post by $_SESSION['user'] where status=1 means that deadline is reached and bidding is completed
	$pre_listing_query = "SELECT * FROM bid INNER JOIN listing ON bid.listing_id=listing.id WHERE seller_username='{$_SESSION['user']}' AND status=1 ORDER BY deadline desc limit 1;";
	$pre_listing = query($pre_listing_query);
	confirm($pre_listing);
	if(mysqli_num_rows($pre_listing) == 0){ // if there is no user post where deadline is reached
		echo <<<DELIMETER
			<div class="grid-cell">
				<h3>Previous Listing</h3>
				<h1 class="title">No Posts</h1>
			</div>
		DELIMETER;
	}
	else{
		$pre_listing = mysqli_fetch_array($pre_listing);
		$offered_price = number_format($pre_listing['offered_price'], 0, ".", ",");
		$highest_bid = number_format($pre_listing['highest_price'], 0, ".", ",");
		echo <<<DELIMETER
		<div class="grid-cell">
			<h3>Previous Listing</h3>
			<h4>{$pre_listing['name']}</h4>
			<div class="listing-detail">
				<div class="thumb-container">
					<img class="thumb" src="assets/img/listing/user_upload{$pre_listing['id']}_0.jpg" title="{$pre_listing['name']}" alt="{$pre_listing['name']}">
				</div>
				<p>{$pre_listing['description']}</p>
			</div>
			<ul class="info">
				<li>Offered Price: <span class="price">रू {$offered_price} /-</span></li>
				<li>Highest Bid: <span class="price">रू {$highest_bid} /-</span></li>
				<li>Awarded to <a class="edit" href="user.php?u_name={$pre_listing['username']}">{$pre_listing['username']}</a></li>
			</ul>
		</div>
		DELIMETER;
	}

	/************* CURRENTLY BIDDING *************/
	// selects the most recent bid by $_SESSION['user'] where status=0 means that deadline is not reached
	$cur_bidding_query = "SELECT * FROM bid INNER JOIN listing ON bid.listing_id=listing.id WHERE bid.username='{$_SESSION['user']}' AND listing.status=0 ORDER BY post_date_time desc;";
	$cur_bidding = query($cur_bidding_query);
	confirm($cur_bidding);
	if(mysqli_num_rows($cur_bidding) == 0){ // if user has not bid
		echo <<<DELIMETER
		<div class="grid-cell">
			<h3>Currently Bidding</h3>
			<h1 class="title">No Bid</h1>
		</div>
		DELIMETER;
	}
	else{
		$cur_bidding = mysqli_fetch_array($cur_bidding);
		$offered_price = number_format($cur_bidding['offered_price'], 0, ".", ",");
		$user_bid = number_format($cur_bidding['highest_price'], 0, ".", ",");
		echo <<<DELIMETER
		<div class="grid-cell">
			<h3>Currently Bidding</h3> | <a class="edit" href="#">OTHER BIDS</a>
			<h4>{$cur_bidding['name']}</h4>
			<div class="listing-detail">
				<div class="thumb-container">
					<img class="thumb" src="assets/img/listing/user_upload/{$cur_bidding['id']}_0.jpg" title="{$cur_bidding['name']}" alt="{$cur_bidding['name']}">
				</div>
				<p>{$cur_bidding['description']}</p>
			</div>
			<ul class="info">
				<li>Offered Price: <span class="price">रू {$offered_price} /-</span></li>
				<li>Your Bid: <span class="price">रू {$user_bid} /-</span></li>
			</ul>
		</div>
		DELIMETER;
	}
	
	/************* BIDDING WON *************/
	// selects the most recent win by $_SESSION['user'] where status=1 means that deadline is reached and bidding is completed
	$bidding_query = "SELECT * FROM bid INNER JOIN listing ON bid.listing_id=listing.id WHERE bid.username='{$_SESSION['user']}' AND listing.status=1 ORDER BY deadline desc;";
	$bidding_won = query($bidding_query);
	confirm($bidding_won);
	if(mysqli_num_rows($bidding_won) == 0){ // if user has not won any bid
		echo <<<DELIMETER
		<div class="grid-cell">
			<h3>Bidding Won</h3>
			<h1 class="title">No bid won</h1>
		</div>
		DELIMETER;
	}
	else{
		$bidding_won = mysqli_fetch_array($bidding_won);
		$offered_price = number_format($bidding_won['offered_price'], 0, ".", ",");
		$user_bid = number_format($bidding_won['highest_price'], 0, ".", ",");
		echo <<<DELIMETER
			<div class="grid-cell">
				<h3>Bidding Won</h3>
				<h4>{$bidding_won['name']}</h4>
				<div class="listing-detail">
					<div class="thumb-container">
						<img class="thumb" src="assets/img/listing/user_upload/{$bidding_won['id']}_0.jpg" title="{$bidding_won['name']}" alt="{$bidding_won['name']}">
					</div>
					<p>{$bidding_won['description']}</p>
				</div>
				<ul class="info">
					<li>Offered Price: <span class="price">रू {$offered_price} /-</span></li>
					<li>Highest Bid: <span class="price">रू {$user_bid} /-</span></li>
					<li>Seller: <a class="edit" href="user.php?u_name={$bidding_won['seller_username']}">{$bidding_won['seller_username']}</a></li>
				</ul>
			</div>
		DELIMETER;
	}
	echo '</div>';
?>