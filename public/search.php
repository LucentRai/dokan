<?php
	require_once("../resources/config.php");
	include_once(TEMPLATE_FRONT . DS . "header.php");

	if(!isset($_GET['search_query'])){
		redirect("listings.php");
	}

	$search_result_query = query("SELECT * FROM listing WHERE (name LIKE '%" . $_GET['search_query'] . "%')");
?>
<style>
div.search-result {
	background: var(--clr-dark-grey);
	padding: 0.5rem;
	margin: 0.5rem;
	border-radius: 6px;
}
div.search-result img{
	width: 100px;
	height: 100px;
}
</style>
</head>
<body>
<?php include_once(TEMPLATE_FRONT . DS . "navigation.php"); ?>
<div class="small-container">
	<h1 class="title"><?php echo $_GET['search_query']; ?> Search Result</h1>
	<?php
		while($search_result = mysqli_fetch_array($search_result_query)){
			echo <<<DELIMETER
			<a href="listing-details.php?id={$search_result['id']}">
				<div class="search-result">
					<img src="assets/img/listing/user_upload/{$search_result['id']}_0.jpg">
					<p>{$search_result['name']}</p>
				</div>
			</a>
			DELIMETER;
		}
	?>
</div>
</body>
</html>