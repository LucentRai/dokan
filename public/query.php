<?php
/********* For changing location of image file in database **********/
/*
require_once("../resources/config.php");

$listingQuery = query("SELECT * FROM listing");
confirm($listingQuery);

while($row = mysqli_fetch_array($listingQuery)){
	$thumb = "assets\/img\/thumbnail\/listing\/" . $row['id'] . ".jpg";
	$img = "assets\/img\/listing\/user_upload\/" . $row['id'] . ".jpg";
	query("UPDATE listing SET thumbnail = '". $thumb . "', img = '" . $img . "' WHERE listing.id = '". $row['id'] . "'");
}
*/
$hari = "asdfqwer";
echo "asdfqwer " . password_hash($hari, PASSWORD_DEFAULT);
?>