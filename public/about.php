<?php
require_once("../resources/config.php");
include_once(TEMPLATE_FRONT . DS . "header.php");
?>
<style>
	section.container {
		display: flex;
		flex-direction: column;
		align-items: center;
	}
	#logo-big {
		width: 600px;
		margin: 2rem;
	}
	.team-container {
		display: flex;
		flex-direction: row;
	}
	.team-member {
		display: flex;
		flex-direction: column;
		align-items: center;
		margin: 1rem;
	}
	.team-member img {
		width: 200px;
		height: 200px;
		border-radius: 50%;
		object-fit: cover;
		margin-bottom: 1rem;
	}
	.team-name {
		color: var(--clr-off-white);
	}
</style>
</head>
<body>
<?php include_once(TEMPLATE_FRONT . DS . "navigation.php"); ?>
<section class="container">
	<h1 class="title">About Us</h1>
	<a href="index.php"><img src="assets/img/logo-white-600.png" alt="Dokan Logo" title="home" id="logo-big"/></a>
	<p>Dokan is an online marketplace for users to buy and sell products. User can register, post the ads and interact with other user for transaction of goods and services. This application helps buyers to bid for the available products which is posted on online auction by the sellers. This way the sellers greatly benefit from competitive pricing. While the application provides a platform for individuals and businesses to market their products, it does not provide a payment option or delivery option so prospective buyers have to manage the payment and retrieval of goods by contacting the seller.</p>
	<h2 class="title">Our Team</h2>
	<ul class="team-container">
		<li class="team-member"><img src="assets/img/thumbnail/ishwor.jpg" alt="Ishwor Bhandari" title="Ishwor Bhandari"><span class="team-name">Ishwor Bhandari</span></li>
		<li class="team-member"><img src="assets/img/thumbnail/lucent.jpg" alt="Lucent Rai" title="Lucent Rai"><span class="team-name">Lucent Rai</span></li>
		<li class="team-member"><img src="assets/img/thumbnail/manas.jpg" alt="Manas Shrestha" title="Manas Shrestha"><span class="team-name">Manas Shrestha</span></li>
		<li class="team-member"><img src="assets/img/thumbnail/manis.jpg" alt="Manis Shrestha" title="Manis Shrestha"><span class="team-name">Manis Shrestha</span></li>
	</ul>
</section>
<?php include_once(TEMPLATE_FRONT . DS . "footer.php"); ?>
</body>
</html>