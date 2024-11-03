<?php 
	// connect to DB
	$conn = mysqli_connect('localhost', 'matan', '1234', "inmanage_db");

	// check connection
	if(!$conn) {
		echo "Connection error: ".mysqli_connect_error();
	}
?>