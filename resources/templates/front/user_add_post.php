<?php

$category_query = query("SELECT * FROM category");	
confirm($category_query);

?>
<h1 class="title">Add Listing</h1>
<form action="../resources/templates/back/add-listing.php" method="post" enctype="multipart/form-data">
	<?php
		if(isset($_SESSION['message'])){
			echo '<span class="info">' . display_message() . '</span>';
		}
	?>
	<div class="mb-3">
		<input class="form-control mb-2" type="text" name="title" placeholder="Title" required>
		<textarea class="form-control" rows="5" name="description" placeholder="Description" required></textarea>
	</div>
	<div class="row mb-3">
		<div class="col">
			<label for="offered-price" class="form-label">Offered Price</label>
			<input type="number" class="form-control" id="offered-price" name="offered_price" placeholder="1000" required>
		</div>
		<div class="col">
			<label for="category" class="form-label">Category</label>
			<select class="form-select" name="category">
				<?php
					while($category = mysqli_fetch_array($category_query)){
						echo <<<DELIMETER
							<option value="{$category['id']}">{$category['name']}</option>
						DELIMETER;
					}
				?>
			</select>
		</div>
		<div class="col">
			<label for="deadline" class="form-label">Deadline</label>
			<input class="form-control" name="deadline" id="deadline" type="datetime-local" required>
		</div>
	</div>
	<input class="form-control" type="file" name="file[]" multiple required>
	<input type="submit" class="btn" value="Post">
</form>