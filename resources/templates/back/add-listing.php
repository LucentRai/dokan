<?php
require_once("../../config.php");

if(isset($_POST['title'])){
	$id = uniqid();
	$title = escape_string($_POST['title']);
	$description = escape_string($_POST['description']);
	$offered_price = escape_string($_POST['offered_price']);
	$category = escape_string($_POST['category']);
	$deadline = escape_string($_POST['deadline']);
	$current_date_time = date("Y-m-d H:i:s");
	
	/*********** For image uploading *******/
	$total_img = count($_FILES['file']['name']);	// total number of images
	$upload_dir = "../../../public/assets/img/listing/user_upload/";	// directory where file is placed
	
	for($i = 0; $i < $total_img; $i++){
		$upload_file = $upload_dir . basename($_FILES['file']['name'][$i]);	// path of file to be uploaded
		$upload_ok = true;	// false if file uploading conditions are not ideal
		$img_file_type = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));	// file extension in lower case
		
		if($img_file_type != "jpg" && $img_file_type != "png" && $img_file_type != "jpeg" && $img_file_type != "gif" ) {	// Allow certain file formats
			set_message("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
			$upload_ok = false;
		}
		
		if($_FILES['file']['size'] > 500000){	// Check file size
			set_message("Sorry, your file is too large.");
			$uploadOk = false;
		}

		if($upload_ok) {	// if everything is alright, upload image
			if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $upload_file)) {
				$upload_file = str_ireplace("../", '', $upload_file);

				$insert_query = query( "INSERT INTO listing (id, name, category, status, post_date_time, deadline, seller_username, description, img, offered_price, views) VALUES ('$id', '$title', $category, 0, '$current_date_time', '$deadline', '{$_SESSION['user']}', '{$description}', '{$total_img}', $offered_price, 0);" );
				[\\\ccc]
				// echo "INSERT INTO listing (id, name, category, status, post_date_time, deadline, seller_username, description, thumbnail, img, offered_price, views) VALUES (uuid(), '$title', $category, 0, '$current_date_time', '$deadline', '{$_SESSION['user']}', '{$description}', '', '{$_FILES['file']['name'][$i]}', $offered_price, 0);" ;
				// confirm($insert_query);

				set_message("Listing added");
			}
			else {
				set_message("Sorry, there was an error uploading your file.");
			}
		}
		// redirect("../../../public/user.php?u_name={$_SESSION['user']}&page=add_post");
	}
}
else{
	redirect("index.php");
}
?>