<?php


	// Include the Database class
	include('database.php');

	// Include the data
	$data = include('data.php');

	// Connect to DB
	$db = new Database('localhost', 'matan', '1234', 'jsonplaceholder_db');

	// Insert users
	foreach ($data['users'] as $user) {
	    $name = $user['name'];
	    $email = $user['email'];

	    // SQL insert query for users
	    $query = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

	    // Database class insert
	    if ($db->insert($query)) {
	        echo "$name's data has been inserted successfully<br/>";
	    }
	}

	// Insert posts
	foreach ($data['posts'] as $post) {
	    $title = $post['title'];
	    $content = $post['content'];
	    $user_id = $post['user_id'];

	    // SQL insert query for posts
	    $query = "INSERT INTO posts (title, content, user_id) VALUES ('$title', '$content', '$user_id')";

	    // Database class insert
	    if ($db->insert($query)) {
	        echo "Post titled '$title' has been inserted successfully<br/>";
	    }
	}

	// Close the database connection
	$db->close();

?>