<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>All Products - Red store</title>
		<link rel="stylesheet" href="css/style.css" />
		<link
			href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
			rel="stylesheet"
		/>
		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
		/>
	</head>
	<body>
		<div class="container">
				<?php include_once 'navigation.php' ?>
		</div>

		<!-- Cart Items Details -->
		<div class="small-container cart-page">
			<table>
				<tr>
					<th>Product</th>
					<th>Quantity</th>
					<th>Subtotal</th>
				</tr>
				<tr>
					<td>
						<div class="cart-info">
							<img src="assets/img/buy-1.jpg" alt="" />
							<div>
								<p>Red Printed T-shirt</p>
								<small>Price: <span class="currency">रु</span>50.00</small>
								<br />
								<a href="">Remove</a>
							</div>
						</div>
					</td>
					<td><input type="nunber" value="1" /></td>
					<td><span class="currency">रु</span>50.00</td>
				</tr>

				<tr>
					<td>
						<div class="cart-info">
							<img src="assets/img/buy-2.jpg" alt="" />
							<div>
								<p>Red Printed T-shirt</p>
								<small>Price: <span class="currency">रु</span>50.00</small>
								<br />
								<a href="">Remove</a>
							</div>
						</div>
					</td>
					<td><input type="nunber" value="1" /></td>
					<td><span class="currency">रु</span>50.00</td>
				</tr>

				<tr>
					<td>
						<div class="cart-info">
							<img src="assets/img/buy-3.jpg" alt="" />
							<div>
								<p>Red Printed T-shirt</p>
								<small>Price: <span class="currency">रु</span>50.00</small>
								<br />
								<a href="">Remove</a>
							</div>
						</div>
					</td>
					<td><input type="nunber" value="1" /></td>
					<td><span class="currency">रु</span>50.00</td>
				</tr>
			</table>

			<div class="total-price">
				<table>
					<tr>
						<td>Subtotal</td>
						<td><span class="currency">रु</span>200.00</td>
					</tr>
					<tr>
						<td>Tax</td>
						<td><span class="currency">रु</span>30.00</td>
					</tr>
					<tr>
						<td>Total</td>
						<td><span class="currency">रु</span>230.00</td>
					</tr>
				</table>
			</div>
		</div>
		<!-- Footer -->
		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="footer-col-1">
						<img src="assets/img/logo.png" alt="" />
						<p>
							Lorem, ipsum dolor sit amet consectetur <br />adipisicing elit.
							Porro, eum?
						</p>
					</div>
					<div class="footer-col-2">
						<h3>Useful Links</h3>
						<ul>
							<li>Coupons</li>
							<li>Blog Post</li>
							<li>Return Policy</li>
							<li>Join Affiliate</li>
						</ul>
					</div>

					<div class="footer-col-3">
						<h3>Follow us</h3>
						<ul>
							<li>Facebook</li>
							<li>Twitter</li>
							<li>Instagram</li>
							<li>YouTube</li>
						</ul>
					</div>
				</div>
				<hr />
				<p class="copyright">Copyright © 2022 - Dokan</p>
			</div>
		</div>
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
	</body>
</html>
