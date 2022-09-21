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
</div>