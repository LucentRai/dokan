<?php

?>
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
			echo '<h1 class="title">Add Post</h1>';
		?>
	</main>
</div>