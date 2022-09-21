<?php

$listing_query = query("SELECT * FROM listing WHERE seller_username='{$_SESSION['user']}' AND status=0;");

?>
<h1 class="title">All Listings</h1>

<?php
while($listing = mysqli_fetch_array($listing_query)){
	echo <<<DELIMETER
		<a href="listing-details.php?id={$listing['id']}">
			<div class="container themed-container bg-secondary mb-3">
				<h3>{$listing['name']}</h3>
				<img src="assets/img/listing/user_upload/{$listing['id']}_0.jpg" class="img-thumbnail" alt="{$listing['name']}">
			</div>
		</a>
	DELIMETER;
}

?>