<?php
	$user_query = query("SELECT * FROM user WHERE username='{$_SESSION['user']}'");
	$user_info = mysqli_fetch_array($user_query);
	confirm($user_query);

?>
<h1 class="title"><?php echo $_SESSION['user'] . ' Profile'; ?></h1>
<div class="grid-cell">
	<table class="table table-dark table-striped">
		<tr>
			<th>Email</th>
			<td><?php echo $user_info['email']; ?></td>
		</tr>
		<tr>
			<th>Phone Number</th>
			<td><?php echo $user_info['phone']; ?></td>
		</tr>
	</table>
	<h2>Change Password</h2>
	
	<form action="change-password.php" method="post" enctype="multipart/form-data">
		<input class="form-control" type="password" id="password" name="password" placeholder="New Password" required>
		<input class="form-control" type="password" id="password2" placeholder="Confirm Password">
		<button type="submit" class="btn" name="change-password">Change Password</button>
	</form>
</div>