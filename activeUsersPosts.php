<?php 

	// Include config
	include('configDb.php');

	// SQL select query for active users posts
	$query = "
	    SELECT users.name, posts.title, posts.content 
	    FROM users 
	    LEFT JOIN posts ON users.id = posts.user_id 
	    WHERE users.active = 'yes'
	";

	// Database class select
	$results = $db->select($query);

	// Initialize an array to save posts grouped by user
	$groupedPosts = array();

	// Group posts by user
	foreach ($results as $result) {
	    $groupedPosts[$result['name']][] = $result;
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
        <?php foreach ($groupedPosts as $userName => $posts): ?>
            <div class="user-posts">
                <img src="images/default-avatar.jpg" class="image">
                <h5><?php echo htmlspecialchars($userName); ?></h5>
                
                <?php if (!empty($posts)): ?>
                    <?php foreach ($posts as $post): ?>
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
