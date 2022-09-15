<?php
function redirect($location){
	header("Location: $location");
}

function query($q){
	global $connection;
	return mysqli_query($connection, $q);
}

function confirm($result){
	global $connection;
	if(!$result){
		die("Query Failed: " . mysqli_error($connection));
	}
}

function escape_string($string){
	global $connection;
	return mysqli_real_escape_string($connection, $string);
}

function set_message($msg){
	if (!empty($msg)){
		$_SESSION['message'] = $msg;
	}
	else {
		$msg = "";
	}
}

function display_message(){
	if (isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}
?>