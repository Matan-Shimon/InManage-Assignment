<?php


	// Include config
	include('configDb.php');

	// Include the data
	$data = include('data.php');

	// Insert users
	foreach ($data['users'] as $user) {
	    $name = $user['name'];
	    $email = $user['email'];
	    $active = $user['active'];

	    // SQL insert query for users
	    $query = "INSERT INTO users (name, email, active) VALUES ('$name', '$email', '$active')";

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