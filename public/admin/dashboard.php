<?php
require_once("../../resources/config.php");
include_once(TEMPLATE_FRONT . DS . "admin-header.php");

$nav_page = array(
	array("Dashboard", 'active'),
	array("Users", ''),
	array("Listings", ''),
	array("Accounts", '')
);
?>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
	<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="public/"><img class="mb-4" src="assets/img/logo-white.png" alt="Dokan Logo"></a>
	<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
	<div class="navbar-nav">
	<div class="nav-item text-nowrap">
		<a class="nav-link px-3" href="#">Sign out</a>
	</div>
	</div>
</header> 
<div class="container-fluid">
  <div class="row">
	<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
		<div class="position-sticky pt-3">
		<ul class="nav flex-column">
			<li class="nav-item">
			<?php
				if (isset($_Get['nav'])){
					echo <<<DELIMETER
						<a class="nav-link" href="admin/dashboard.php">Dashboard</a>
					</li>
					DELIMETER;
				}
				else {
					echo <<<DELIMETER
					<a class="nav-link active" aria-current="page">
					</li>
					<li class="nav-item">
						<a class="nav-link" href="admin/user.php">Users</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="admin/listing.php">Listings</a>
					</li>
					DELIMETER;
				}
			?>
		  <li class="nav-item">
			<?php
				if(isset($_GET['nav'])){
					echo '<a class="nav-link" href="admin/listing.php">';
				}
				else{
					echo '<a class="nav-link active" aria-current="page">';
				}
				echo "Listings</a>";
			?>
		  </li>
		</ul>

		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
		  <span>Settings</span>
		  <a class="link-secondary" href="#" aria-label="Add a new report">
			<span data-feather="plus-circle"></span>
		  </a>
		</h6>
		<ul class="nav flex-column mb-2">
		  <li class="nav-item">
		 	<?php
				if(isset($_GET['nav'])){
					echo '<a class="nav-link" href="admin/account.php">';
				}
				else{
					echo '<a class="nav-link active" aria-current="page">';
				}
				echo "Accounts</a>";
			?>
		  </li>
		</ul>
	  </div>
	</nav>

	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">Dashboard</h1>
			<div class="btn-toolbar mb-2 mb-md-0">
				<div class="btn-group me-2">
					<button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
					<button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
				</div>
				<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
					<span data-feather="calendar"></span>
					This week
				</button>
			</div>
		</div>

		<h2>Section title</h2>
		<?php
			if(isset($_SESSION['message'])){
				echo "<span>{$_SESSION['messsage']}</span>";
			}

			if(isset($_GET['nav'])){
				switch($_GET['nav']){
					case 'user':
						include_once('user.php');
						break;
					case 'listing':
						include_once('listing.php');
						break;
					case 'account':
						include_once('account.php');
						break;
					default:
						include_once('info.php');
						break;
				}
			}
			else{
				include_once('info.php');
			}
		?>
	</main>
  </div>
</div>