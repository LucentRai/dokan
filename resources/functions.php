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

function uuid() {
	$data = openssl_random_pseudo_bytes(16);
	assert(strlen($data) == 16);
	
	$data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
	$data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
	
	return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
?>