<div class="container">
	<aside>
		<span class="greeting">Namaste, <?php echo $user['username']; ?></span>
		<ul>
			<?php
				for($i = 0, $heading_num = count($user_page_heading); $i < $heading_num; $i++){
					echo <<<DELIMETER
						<li>
							<h2>{$user_page_heading[$i]}</h2>
							<ul>
					DELIMETER;
						foreach($user_page as $link){
							if($link[2] == $i){ // if heading number matches with $i
								if(isset($_GET['page']) && $_GET['page'] == $link[0]){ // if the GET value in url matches with the link change color to dark grey [NEEDS OPTIMIZATION]
									echo '<li><a style="color:var(--clr-dark-grey);" href="user.php?u_name=' . $user['username'] . '&page=' . $link[0] . '">' . $link[1] . '</a></li>';
								}
								else{echo '<li><a href="user.php?u_name=' . $user['username'] . '&page=' . $link[0] . '">' . $link[1] . '</a></li>';
								}
							}
						}
					echo <<<DELIMETER
							</ul>
						</li>
					DELIMETER;
				}
			?>
		</ul>
	</aside>
	<main>
		<?php
			if(isset($_GET['page'])){
				for($i = 0, $num_page = count($user_page); $i < $num_page; $i++){
					if($_GET['page'] == $user_page[$i][0]){
						require_once($user_page[$i][3]);
					}
				}
			}
			else{
				echo '<h1 class="title">Manage My Posts</h1><div class="grid" style="--bs-rows: 2; --bs-columns:2;">';

				/************* CURRENT LISTING *************/
				// selects the most recent post by $user['username'] where status=0 means that deadline is not reached
				$cur_listing_query = "SELECT * FROM bid INNER JOIN listing ON bid.listings_id=listing.id WHERE seller_username='{$user['username']}' AND status=0 ORDER BY deadline desc limit 1;";
				$cur_listing = query($cur_listing_query);
				confirm($cur_listing);
				if(mysqli_num_rows($cur_listing) == 0){ // if user has not posted anything where deadline is not reached
					echo <<<DELIMETER
						<div class="g-col-2">
							<h3>Current Listing</h3>
							<h1 class="title">No Post</h1>
						</div>
					DELIMETER;
				}
				else{
					$cur_listing = mysqli_fetch_array($cur_listing);
					$offered_price = number_format($cur_listing['offered_price'], 0, ".", ",");
					$highest_bid = number_format($cur_listing['highest_price'], 0, ".", ",");

					echo <<<DELIMETER
						<div class="g-col-2">
							<h3>Current Listing</h3>
							<h4>{$cur_listing['name']}</h4>
							<div class="listing-detail">
								<div class="thumb-container">
									<img class="thumb" src="{$cur_listing['thumbnail']}" title="{$cur_listing['name']}" alt="{$cur_listing['name']}">
								</div>
								<p>{$cur_listing['description']}</p>
							</div>
							<ul class="info">
								<li>Offered Price: <span class="price">रू {$offered_price} /-</span></li>
								<li>Highest Bid: <span class="price">रू {$highest_bid} /-</span></li>
							</ul>
						</div>
					DELIMETER;
				}

				/************* PREVIOUS LISTING *************/
				// selects the most recent post by $user['username'] where status=1 means that deadline is reached and bidding is completed
				$pre_listing_query = "SELECT * FROM bid INNER JOIN listing ON bid.listings_id=listing.id WHERE seller_username='{$user['username']}' AND status=1 ORDER BY deadline desc limit 1;";
				$pre_listing = query($pre_listing_query);
				confirm($pre_listing);
				if(mysqli_num_rows($pre_listing) == 0){ // if there is no user post where deadline is reached
					echo <<<DELIMETER
						<div class="g-col-2">
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
					<div class="g-col-2">
						<h3>Previous Listing</h3>
						<h4>{$pre_listing['name']}</h4>
						<div class="listing-detail">
							<div class="thumb-container">
								<img class="thumb" src="{$pre_listing['thumbnail']}" title="{$pre_listing['name']}" alt="{$pre_listing['name']}">
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
				// selects the most recent bid by $user['username'] where status=0 means that deadline is not reached
				$cur_bidding_query = "SELECT * FROM bid INNER JOIN listing ON bid.listings_id=listing.id WHERE bid.username='{$user['username']}' AND listing.status=0 ORDER BY post_date_time desc;";
				$cur_bidding = query($cur_bidding_query);
				confirm($cur_bidding);
				if(mysqli_num_rows($cur_bidding) == 0){ // if user has not bid
					echo <<<DELIMETER
					<div class="g-col-2">
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
					<div class="g-col-2">
						<h3>Currently Bidding</h3> | <a class="edit" href="#">OTHER BIDS</a>
						<h4>{$cur_bidding['name']}</h4>
						<div class="listing-detail">
							<div class="thumb-container">
								<img class="thumb" src="{$cur_bidding['thumbnail']}" title="{$cur_bidding['name']}" alt="{$cur_bidding['name']}">
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
				// selects the most recent win by $user['username'] where status=1 means that deadline is reached and bidding is completed
				$bidding_query = "SELECT * FROM bid INNER JOIN listing ON bid.listings_id=listing.id WHERE bid.username='{$user['username']}' AND listing.status=1 ORDER BY deadline desc;";
				$bidding_won = query($bidding_query);
				confirm($bidding_won);
				if(mysqli_num_rows($bidding_won) == 0){ // if user has not won any bid
					echo <<<DELIMETER
					<div class="g-col-2">
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
						<div class="g-col-2">
							<h3>Bidding Won</h3>
							<h4>{$bidding_won['name']}</h4>
							<div class="listing-detail">
								<div class="thumb-container">
									<img class="thumb" src="{$bidding_won['thumbnail']}" title="{$bidding_won['name']}" alt="{$bidding_won['name']}">
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
			}
		?>
	</main>
</div>	<!-- .container end -->