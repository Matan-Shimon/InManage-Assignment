<?php 

	include('configDb.php');

	// SQL select query for the last post of users who has birthday this month
	$query = "
		SELECT users.name, posts.title, posts.content
	    FROM users
	    LEFT JOIN (
	        SELECT user_id, title, content
	        FROM posts
	        WHERE created_at = (
	            SELECT MAX(created_at)
	            FROM posts AS p
	            WHERE p.user_id = posts.user_id
	        )
	    ) AS posts ON users.id = posts.user_id
	    WHERE MONTH(users.birthday) = MONTH(CURDATE())
	";


	// Database class select
	$results = $db->select($query);

?>


<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Users Birthday Last Post</title>
	    <link rel="stylesheet" href="styles/styles.css"> <!-- link to the styles file -->
	</head>
	<body class="font">
	    <div class="container">
	        <?php foreach ($results as $result): ?>
	            <div class="user-posts">
	                <img src="images/default-avatar.jpg" class="image">
	                <h5><?php echo htmlspecialchars($result['name']); ?></h5>
	                
	                <?php if (!empty($result['title'])): ?>
	                        <div class="post">
	                            <h6><?php echo htmlspecialchars($result['title']); ?></h6>
	                            <p><?php echo htmlspecialchars($result['content']); ?></p>
	                        </div>
	                <?php else: ?>
	                    <p>No posts available.</p>
	                <?php endif; ?>
	            </div>
	        <?php endforeach; ?>
	    </div>
	</body>
</html>