<?php 

	// Include config
	include('configDb.php');

	// SQL select query for active users
	$query = "SELECT id, name FROM users WHERE active = 'yes'";

	// Database class select
	$users = $db->select($query);

	// Initialize an array to hold posts
	$posts = array();

	foreach ($users as $user) {
	    // SQL select query for active user posts
	    $query = "SELECT user_id, title, content FROM posts WHERE user_id = {$user['id']}";
	    
	    // Database class select
	    $posts[$user['id']] = $db->select($query);
	}

?>

<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Users Posts</title>
	    <link rel="stylesheet" href="styles/styles.css"> <!-- link to the styles file -->
	</head>
	<body class="font">
	    <div class="container">
	        <?php foreach ($users as $user): ?>
	            <div class="user-posts">
	            	<img src="images/default-avatar.jpg" class="image">
	                <h5><?php echo htmlspecialchars($user['name']); ?></h5>
	                <?php if (!empty($posts[$user['id']])): ?>
	                    <?php foreach ($posts[$user['id']] as $post): ?>
	                        <div class="post">
	                            <h6><?php echo htmlspecialchars($post['title']); ?></h6>
	                            <p><?php echo htmlspecialchars($post['content']); ?></p>
	                        </div>
	                    <?php endforeach; ?>
	                <?php else: ?>
	                    <p>No posts available.</p>
	                <?php endif; ?>
	            </div>
	        <?php endforeach; ?>
	    </div>
	</body>
</html>
