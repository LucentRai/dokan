<?php
	switch($error_code){
		case 'nonexistent_user':
			break;
		case 404:
			break;
		default:
			echo <<<DELIMETER
				<h1>Undefined error code</h1>
			DELIMETER;
	}
?>