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
	.info-wrapper {
		margin: 0 auto 0 0;
		display: flex;
	}
	.dev-img {
		width: 200px;
		border-radius: 50%;
	}
	.dev-info {
		padding: 0;
		margin: 0 0 0 2rem;
		list-style: none;
	}
	.info h2 {
		font-family: AvantGarde, Arial, sans-serif;
	}
	.info a {
		color: var(--clr-sky-blue);
	}
</style>
</head>
<body>
<?php include_once(TEMPLATE_FRONT . DS . "navigation.php"); ?>
<section class="container">
	<h1 class="title">About Us</h1>
	<a href="index.php"><img src="assets/img/logo-white-600.png" alt="Dokan Logo" title="home" id="logo-big"/></a>
	<p>Dokan is an online marketplace for users to buy and sell products. User can register, post the ads and interact with other user for transaction of goods and services. This application helps buyers to bid for the available products which is posted on online auction by the sellers. This way the sellers greatly benefit from competitive pricing. While the application provides a platform for individuals and businesses to market their products, it does not provide a payment option or delivery option so prospective buyers have to manage the payment and retrieval of goods by contacting the seller.</p>
	<div class="info-wrapper">
		<img src="assets/img/thumbnail/lucent.jpg" alt="Lucent Rai Photo" title="Lucent Rai" class="dev-img">
		<ul class="dev-info">
			<li class="info"><h2>Lucent Rai</h2></li>
			<li class="info"><a href="https://lucent.com.np">lucent.com.np</a></li>
			<li class="info"><a href="https://github.com/LucentRai">LucentRai</a></li>
		</ul>
	</div>
</section>
<?php include_once(TEMPLATE_FRONT . DS . "footer.php"); ?>
</body>
</html>